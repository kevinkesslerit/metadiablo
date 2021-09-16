<?php

namespace App\Http\Controllers;

use App\cubeRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cubeRecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cubeRecipes = DB::table('cubeRecipes as t1')->select('t1.ingredients as ingredients',
            't1.result as result')
            ->orderBy('id', 'asc')
            ->get();
        return response()->json(compact('cubeRecipes'));
    }
}