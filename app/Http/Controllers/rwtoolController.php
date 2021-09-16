<?php

namespace App\Http\Controllers;

use App\rwtool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rwtoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runewords = DB::table('runewords as t1')->select('t1.name as runewordName',
            't1.runeOrder as runewordRuneOrder',
            't1.completeStats as runewordCompleteStats',
            't1.ladderOnly as runewordLadderOnly',
            't1.patchIntroduced as runewordPatchIntroduced',
            't1.allowedItems as runewordAllowedItems')
            ->orderBy('name', 'asc')
            ->paginate(5);

        return view('rwtool',compact('runewords'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $runewords = DB::table('runewords as t1')->select('t1.name as runewordName',
            't1.runeOrder as runewordRuneOrder',
            't1.completeStats as runewordCompleteStats',
            't1.ladderOnly as runewordLadderOnly',
            't1.patchIntroduced as runewordPatchIntroduced',
            't1.allowedItems as runewordAllowedItems')
            ->orderBy('name', 'asc')
            ->get();

        //only gather rune requests.
        $input = $request->only(['Hel', 'Eld', 'El', 'Nef', 'Tir', 'Ith', 'Eth', 'Tal', 'Ral', 'Ort',
            'Thul', 'Amn', 'Sol', 'Shael', 'Dol', 'Io', 'Lum', 'Ko', 'Fal', 'Lem', 'Pul', 'Um',
            'Mal', 'Ist', 'Gul', 'Vex', 'Ohm', 'Lo', 'Sur', 'Ber', 'Jah', 'Cham', 'Zod']);
//preg_match("/\b".$input[$x]."\b/i", $values[0]->runewordRuneOrder

        //merge dictionary into collection
        $merged = collect($input)->transform(function ($values) use ($input) {
            return [
                'status' => $values,
            ];
        });

        $keys = $merged->filter()->keys();


        $runes = $keys->all();
        $matches = [];
        foreach ($runes as $rune){
            //search runewords for each rune
            foreach ($runewords as $runeword){
                if (preg_match("/\b".$rune."\b/i", $runeword->runewordRuneOrder)){
                    //echo '<b>'.$runeword->runewordName.'</b> - <small><i>'.$runeword->runewordRuneOrder.'</i></small><br>';
                    //array_push($matches, $runeword->runewordName);
                    if (!array_key_exists($runeword->runewordName, $matches)) {
                        $matches[$runeword->runewordName]['first_match'] = strtolower($rune);
                        $matches[$runeword->runewordName]['rune_word_name'] = $runeword->runewordName;
                        $matches[$runeword->runewordName]['rune_order'] = $runeword->runewordRuneOrder;
                        $matches[$runeword->runewordName]['rune_word_stats'] = $runeword->runewordCompleteStats;
                        $matches[$runeword->runewordName]['ladder_only'] = $runeword->runewordLadderOnly;
                        $matches[$runeword->runewordName]['patch_introduced'] = $runeword->runewordPatchIntroduced;
                        $matches[$runeword->runewordName]['allowed_items'] = $runeword->runewordAllowedItems;
                    }
                }
            }
        }
        return view('layouts.runewordtool.view', [ 'matches' => $matches]);
    }
}
