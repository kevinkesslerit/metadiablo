<?php

namespace App\Http\Controllers;

use App\rune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class runesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runes = DB::table('runes as t1')->select('t1.name as name',
            't1.statWeapon as statsWeapon',
            't1.statArmor as statsArmor',
            't1.image as image',
            't1.level as level')
            ->orderBy('level', 'asc')
            ->get();
        return response()->json(compact('runes'));
    }
}
