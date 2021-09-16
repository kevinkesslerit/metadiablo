<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class areaLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($test);
        return view('layouts.area_levels.view');
    }

    public function search(Request $request)
    {
        
        if ($request->minlvl === null){
            $request->merge(['minlvl' => 1]);
        }
        if ($request->maxlvl === null){
            $request->merge(['maxlvl' => 110]);
        }

        if ($request->minlvl > $request->maxlvl){
            $maxlvl = $request->maxlvl;
            $request->merge(['maxlvl' => $request->minlvl]);
            $request->merge(['minlvl' => $maxlvl]);
        }
        if ($request->minlvl === $request->maxlvl){
            $request->merge(['mminlvl' => $request->minlvl - 1]);
        }

        $orderBy = $request->version."_level";

        $areas = DB::table('area_levels as al')
        ->join('area_names as arean', 'arean.id', '=' , 'al.area_name_id')
        ->join('act_names as actn', 'actn.id', '=' , 'al.act_name_id')
        ->join('difficulty_names as diffn', 'diffn.id', '=' , 'al.difficulty_name_id')
        ->join('patch_names as patchn', 'patchn.id', '=' , 'al.patch_name_id')
        ->where('actn.name', 'like', $request->act . '%')
        ->where('diffn.name', '=', $request->difficulty)
        ->whereBetween('level_'.$request->version, [$request->minlvl, $request->maxlvl])
        ->select('arean.name as area_name',
        'actn.name as act_name',
        'actn.chapter_name as act_chapter_name',
        'diffn.name as difficulty_name',
        'patchn.version as patch_version',
        'patchn.sub_version as patch_sub_version',
        'patchn.date_introduced as patch_date_introduced',
        'al.level_classic as classic_level',
        'al.level_expansion as expansion_level')
        ->orderBy($orderBy, 'asc')
        ->get();

        $minlvl = $request->minlvl;
        $maxlvl = $request->maxlvl;
        if ($request->act === 'Act 5' && $request->version === 'Classic'){
            $areas = null;
            return view('layouts.area_levels.postview', compact('minlvl', 'maxlvl'));
        }

        return view('layouts.area_levels.postview', compact('areas', 'minlvl', 'maxlvl'));
    }
}