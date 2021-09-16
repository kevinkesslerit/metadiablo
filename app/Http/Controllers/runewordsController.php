<?php

namespace App\Http\Controllers;

use App\runeword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class runewordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runewords = DB::table('runewords as t1')->select('t1.name as name',
            't1.runeOrder as runeOrder',
            't1.completeStats as completeStats',
            't1.ladderOnly as ladderOnly',
            't1.patchIntroduced as patchIntroduced',
            't1.allowedItems as allowedItems')
            ->orderBy('name', 'asc')
            ->get();
        return response()->json(compact('runewords'));
    }
}
