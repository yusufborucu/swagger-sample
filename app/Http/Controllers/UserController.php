<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /** @SWG\Post(
     *     path="/api/login",
     *     tags={"Login"},
     *     summary="Login işlemi",
     *     description="Login işlemi",
     *     @SWG\Parameter(
     *          name="email",
     *          description="User e-mail address",
     *          required=true,
     *          type="string",
     *          in="query"
     *     ),
     *     @SWG\Parameter(
     *          name="password",
     *          description="User password",
     *          required=true,
     *          type="string",
     *          in="query"
     *     ),
     *     @SWG\Response(
     *          response=200,
     *          description="login is successful",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="token",
     *                  type="string"
     *             )
     *          )
     *     ),
     *     @SWG\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
    */
    public function login()
    {
        $email = request()->email;
        $password = request()->password;
        if ($email == "test@test.com" && $password == "123123") {
            $user = (object)array(
                        'token' => str_random(10)
                    );
            return response()->json($user, 200);
        } else {
            return response()->json('Unauthorized', 401);
        }
    }

    /** @SWG\Get(
     *     path="/api/profile",
     *     tags={"Profil"},
     *     summary="Profil bilgisi",
     *     description="Profil bilgisi",
     *     @SWG\Parameter(
     *          name="token",
     *          description="User token",
     *          required=true,
     *          type="string",
     *          in="header"
     *     ),
     *     @SWG\Response(
     *          response=200,
     *          description="profile data",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="user_id",
     *                  type="integer"),
     *              @SWG\Property(
     *                  property="name_surname",
     *                  type="string"),
     *              @SWG\Property(
     *                  property="age",
     *                  type="integer"
     *             )
     *         )
     *     ),
     *     @SWG\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */
    public function profile()
    {
        $token = request()->header('token');
        if ($token == "HyJSZqNPxB") {
            $user = (object)array(
                'user_id' => 1,
                'name_surname' => 'Test Kullanıcısı',
                'age' => 25
            );
            return response()->json($user, 200);
        } else {
            return response()->json('Unauthorized', 401);
        }
    }
}
