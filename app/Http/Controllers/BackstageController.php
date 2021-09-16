<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\User;
use App\backstage;
use Illuminate\Http\Request;
use App\UserAuth;
class BackstageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\backstage  $backstage
     * @param  \App\backstage  $user
     * @return \Illuminate\Http\Response
     */
    public function show(backstage $backstage, User $user)
    {
        if (Gate::allows('isAdmin', $user)) {
            return view('layouts.backstage.view');
        } else {
            abort(403);
        }
    }
}
