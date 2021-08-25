<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\Login;

class AuthController extends Controller
{

    /**
     * 登录
     * @param Request $loginRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $loginRequest)
    {
        try {
            $credentials = self::credentials($loginRequest);
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->fail(100, '账号或者用户名错误!', null);
            }

            return self::respondWithToken($token, '登陆成功!');
        } catch (\Exception $e) {
            echo $e->getMessage();
            return response()->fail(500, '登陆失败!', null, 500);
        }
    }

    /**
     * 注销登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            auth('api')->logout();
        } catch (\Exception $e) {

        }
        return auth('api')->check() ?
            json_fail('注销登陆失败!',null, 100 ) :
            json_success('注销登陆成功!',null,  200);
    }

    /**
     * 刷新token
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        try {
            $newToken = auth('api')->refresh();
        } catch (\Exception $e) {
        }
        return $newToken != null ?
            self::respondWithToken($newToken, '刷新成功!') :
            json_fail(100, null,'刷新token失败!');
    }

    protected function credentials($request)
    {
        //用户登录信息
        return ['user_name' => $request['user_name'], 'user_pwd' => $request['user_pwd']];
    }

    protected function respondWithToken($token, $msg)
    {
        return json_success( $msg, array(
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ),200);
    }

    public function test(Request $request){
        $user  = auth('api')->user();
        echo $user->work_id;
    }

    /**
     * 注册
     * @param Request $registeredRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function registered(AuthRequest $registeredRequest)
    {
        return Login::createUser(self::userHandle($registeredRequest)) ?
            json_success('注册成功!',null,200  ) :
            json_success('注册失败!',null,100  ) ;

    }
    protected function userHandle($request)
    {
        $registeredInfo = $request->except('password_confirmation');
        $registeredInfo['user_pwd'] = bcrypt($registeredInfo['user_pwd']);
        return $registeredInfo;
    }
}
