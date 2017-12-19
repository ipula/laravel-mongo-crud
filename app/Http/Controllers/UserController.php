<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        $user=User::all();
        return response()->json(["msg"=>$user],200);
    }
    public function createUser(Request $request)
    {
        $data=$request->all();
        $user=new User();
        $user->username=$data['username'];
        $user->email=$data['email'];
        $user->tel_no=$data['tel_no'];
        $user->role=$data['role'];
//        $user->save();
        if( $user->save())
        {
            return response()->json(["msg"=>"User Create"],200);
        }
        else
        {
            return response()->json(["msg"=>"User Create Failed"],500);
        }
    }
    public function editUser($id=null,Request $request)
    {
        $data=$request->all();
        $user=User::find($id);
        $user->username=$data['username'];
        $user->email=$data['email'];
        $user->tel_no=$data['tel_no'];
        $user->role=$data['role'];

        if( $user->save())
        {
            return response()->json(["msg"=>"User Update"],200);
        }
        else
        {
            return response()->json(["msg"=>"User Update Failed"],500);
        }
    }
}
