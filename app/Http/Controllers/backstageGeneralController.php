<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\backstageGeneral;
use Illuminate\Http\Request;
use App\User;

class backstageGeneralController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\backstageGeneral  $backstageGeneral
     * @return \Illuminate\Http\Response
     */
    public function show(backstageGeneral $backstageGeneral, User $user)
    {
        if (Gate::allows('isAdmin', $user)) {
            return view('layouts.backstage.general.view');
        } else {
            abort(403);
        }
    }
}
