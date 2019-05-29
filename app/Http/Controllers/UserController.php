<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_users()
    {
        $users = User::get(["id","name", "email","cheikh","created_at"]);        

        return view('auth.register', ["users"=>$users]);
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect("/manage_users");
    }
}
