<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function get_all_users()
    {
        return User::all();
    }


    public function register(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function updatename(Request $request)
    {

        $page = (User::where('id', '=', $request->get('id')));
        if(($page->value('name') == $request->get('name'))&&($page->value('email') == $request->get('email'))){
            $pagenew = User::find($request->get('id'));
            $pagenew->name=$request->get('new_name');
            $pagenew->save();
            return 'success';
        }
        return 'not success';

    }

    public function updatepassword(Request $request)
    {

        $page = (User::where('id', '=', $request->get('id')));
        if(($page->value('name') == $request->get('name'))&&($page->value('password') == $request->get('password'))){
            $pagenew = User::find($request->get('id'));
            $pagenew->password=$request->get('new_password');
            $pagenew->save();
            return 'success';
        }
        return 'not success';

    }

    public function delete(Request $request)
    {
        User::find($request->get('id'))->delete();

        return response()->json(null, 204);

    }
    public function login(Request $request)
    {

        $password = (User::where('email', '=', $request->get('email')))->value('password');
        if($password == $request->get('password')){
            return 'valid';
        }
        else{
            return 'not valid';
        }
    }

    public function oneuser(Request $request)
    {
        return User::find($request->get('id'));

    }
}
