<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $res = [];
        $res['success'] = FALSE;
        $res['status'] = 400;

        $rules = [
            'email' =>'required',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'Email can not be empty.',
            'password.required' => 'Password can not be empty.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            $res['message'] = $validator->errors()->first();
            return response($res, $res['status']);
        }

        $user = User::where('email', $request->email)->first();
        if(!$user){
            $res['message'] = 'Entered wrong email';
            return response($res, $res['status']);
        }

        if(Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
        {
            $user->token = $user->createToken($user->id.'user token')->accessToken;
            $res['user'] = $user;
            $res['status'] = 200;
            $res['success'] = TRUE;
            $res['message'] = 'Login successfully';
        }else{
            $res['message'] = 'Entered wrong Password';
        }
        return response($res, $res['status']);
    }

    public function userDetail(Request $reques)
    {
        $res = [];
        $res['success'] = FALSE;
        $res['status'] = 400;

        try{
            $id = Auth::user()->id ?? 0;
            $user = User::first($id);
            if($user){
                $res['user'] = $user;
                $res['status'] = 200;
                $res['success'] = TRUE;
                $res['message'] = 'User detail fatched suucessfully';
            }else{
                $res['message'] = 'User not found';
            }
        } catch(Exception $e){
            $res['message'] = $e->getMessage().' '.$e->getLine().' '.$e->getFile();
        }
        return response($res, $res['status']);
    }
}
