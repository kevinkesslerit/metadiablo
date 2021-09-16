<?php

namespace App\Http\Controllers;

use App\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use Purifier;

class profileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id, $name)
    {
        //check if id and name are valid first
        $userIDChecksOut=User::where('id', $id)->first();
        if ($userIDChecksOut != null){
            $userInfo = DB::table('users as u1')
                ->select('u1.id as userId',
                    'u1.name as userName',
                    'u1.avatar as userAvatar',
                    'u1.guild_id as userGuildId',
                    'u1.title as userTitle',
                    'u1.notes as userNotes',
                    'u1.email_verified_at as userVerified',
                    'u1.guild_rank as userGuildRank',
                    'u1.created_at as userCreatedDate')
                ->where('u1.id', '=', $id)
                ->first();
            if ($name != $userInfo->userName){
                return redirect()->route('profileView', ['id' => $userInfo->userId, 'name' => $userInfo->userName]);
            }else{
                return view('layouts.profile.view',compact('userInfo'));
            }

        }else{
            abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile)
    {
        //lets grab the users info to populate the form
        $userInfo=User::whereId($request->user()->id)->first();
        //remember were dumping _EVERYTHING_ including passwords, not sure how I feel about this :l

        $avatars = Storage::disk('public')->allFiles('avatars');
        //avatars/Bnet-avatar-war2.gif

        return view('layouts.profile.update', compact('userInfo', 'avatars'));
    }

    public function postUpdate(Request $request, profile $profile)
    {
        $validatedData = $request->validate([
            'nameChange' => 'sometimes|nullable|string|between:1,35',
            'notesChange' => 'sometimes|nullable|string|between:1,65534'
            /*'avatar' => 'sometimes|nullable|string'*/
        ]);

        if ($request->filled('nameChange') && $request->filled('notesChange')){
            $cleanNotes=Purifier::clean($request->notesChange);
            $request->merge([ 'notesChange' => $cleanNotes ]);

            User::where('id', $request->user()->id )
                ->update(['name' => request('nameChange'),
                    'notes' => request('notesChange'),
                    'updated_at' => now()]);
        }elseif($request->filled('nameChange')){
            User::where('id', $request->user()->id )
                ->update(['name' => request('nameChange'),
                    'updated_at' => now()]);
        }elseif($request->filled('notesChange')){
            $cleanNotes=Purifier::clean($request->notesChange);
            $request->merge([ 'notesChange' => $cleanNotes ]);

            User::where('id', $request->user()->id )
                ->update(['notes' => request('notesChange'),
                    'updated_at' => now()]);
        }
        //lets grab the users info to populate the form
        $userInfo=User::whereId($request->user()->id)->first();
        //remember were dumping _EVERYTHING_ including passwords, not sure how I feel about this :l
        $avatars = Storage::disk('public')->allFiles('avatars');
        return view('layouts.profile.update', compact('avatars', 'userInfo'));
    }
}
