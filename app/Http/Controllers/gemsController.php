<?php

namespace App\Http\Controllers;

use App\gem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gems = DB::table('gems as t1')->select('t1.name as name',
            't1.level as level',
            't1.statsWeapon as statsWeapon',
            't1.statsShield as statsShield',
            't1.statsArmor as statsArmor')
            ->orderBy('id', 'asc')
            ->get();
        return response()->json(compact('gems'));
    }
}
