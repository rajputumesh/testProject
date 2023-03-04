<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role','user')->orderBy('id','desc')->get();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = [];
        $res['success'] = FALSE;
        $res['status'] = 400;

        $rules = [
            'name' => ['required'],
            'email' => ['required', 'unique:users', 'max:255'],
            'password' => ['required'],
        ];
        $messages = [
            'name.required' => 'Name is not empty.',
            'password.required' => 'Password is not empty.',
            'email.required' => 'Email is not empty.',
            'email.unique' => 'Email is already exists.',
            'email.max' => 'Email is maximun 255 characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            $res['message'] = $validator->errors()->first();
            return response($res, $res['status']);
        }
        try{
            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = $request->password;
            $users->save();
            $res['status'] = 200;
            $res['message'] = 'User saved successfully';
        } catch(Exception $e){
            $res['message'] = $e->getMessage().' '.$e->getLine().' '.$e->getFile();
        }
        return response($res, $res['status']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $res = [];
        $res['success'] = FALSE;
        $res['status'] = 400;

        $rules = [
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,'.$id.',id', 'max:255']
        ];
        $messages = [
            'name.required' => 'Name is not empty.',
            'email.required' => 'Email is not empty.',
            'email.unique' => 'Email is already exists.',
            'email.max' => 'Email is maximun 255 characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            $res['message'] = $validator->errors()->first();
            return response($res, $res['status']);
        }
        try{
            $users = User::find($id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->save();
            $res['status'] = 200;
            $res['message'] = 'User updated successfully';
        } catch(Exception $e){
            $res['message'] = $e->getMessage().' '.$e->getLine().' '.$e->getFile();
        }
        return response($res, $res['status']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = [];
        $res['status'] = 400;
        try{
            User::find($id)->delete();
            $res['status'] = 200;
            $res['message'] = 'User deleted successfully';
        } catch(Exception $e){
            $res['message'] = $e->getMessage().' '.$e->getLine().' '.$e->getFile();
        }
        return response($res, $res['status']);
    }
}
