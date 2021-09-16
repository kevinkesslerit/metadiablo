<?php

namespace App\Http\Controllers;

use App\stats;
use App\forum_thread;
use App\forum_post;
use App\forum_category;
use App\User;
use Illuminate\Http\Request;

class statsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statistics=stats::where('id', 1)->first();

        $topThreads=forum_thread::take(4)->get()->sortByDesc('views');

        foreach ($topThreads as $thread){
            $categoryInfo = forum_category::where('slug', $thread->category_slug)->first();
            $postInfo = forum_post::where([
                ['thread_slug', $thread->slug],
                ['post_order', '=', '0'],
            ])->first();
            $thread->post_snippit = $postInfo->body;
            $thread->post_created_at = $postInfo->created_at;
            $thread->post_author = User::where('id', $postInfo->user_id);
            $thread->post_category = $categoryInfo->title;
            $thread->post_category_slug = $categoryInfo->slug;
        }

        return view('welcome',compact('statistics', 'topThreads'));
    }
}
