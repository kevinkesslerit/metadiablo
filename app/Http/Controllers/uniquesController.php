<?php

namespace App\Http\Controllers;

use App\unique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class uniquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uniques = DB::table('uniques as t1')->select('t1.name as name',
            't1.itemType as itemType',
            't1.itemCategory as itemCategory',
            't1.itemStats as itemStats',
            't1.image as image',
            't1.ladderOnly as ladderOnly',
            't1.patchIntroduced as patchIntroduced')
            ->orderBy('name', 'asc')
            ->get();
        return response()->json(compact('uniques'));
    }
}
