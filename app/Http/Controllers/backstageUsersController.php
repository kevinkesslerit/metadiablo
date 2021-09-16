<?php

namespace App\Http\Controllers;

use App\backstageUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use Illuminate\Support\Facades\DB;

class backstageUsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\backstageUsers  $backstageUsers
     * @return \Illuminate\Http\Response
     */
    public function show(backstageUsers $backstageUsers, User $user)
    {
        if (Gate::allows('isAdmin', $user)) {
            //huge userList! lets chunk?
            $userList = DB::table('users')->paginate(18);
            return view('layouts.backstage.users.view', compact('userList'));
        } else {
            abort(403);
        }
    }
}