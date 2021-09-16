<?php

namespace App\Http\Controllers;

use App\forum_category;
use App\forum_thread;
use App\forum_post;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.forum.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(forum_category $forum_category)
    {
            $categories = forum_category::get()->sortBy('order');
            //what happens if last ID is locked or hidden?
            $post = null;
                foreach ($categories as $category){
                    if ($category->last_post_id > 0) {
                        $lastPost = forum_post::where('id', $category->last_post_id)->value('id');
                            $post = DB::table('forum_posts as p1')
                            ->Join('users as u1', 'u1.id', '=', 'p1.user_id')         // associate users id to post id
                            ->Join('forum_threads as t1', 't1.slug', '=' , 'p1.thread_slug')   // associate threads to post threadid
                            ->Join('forum_categories as c1', 'c1.slug', '=', 't1.category_slug')  // associate subCategory to post category id ???????????
                            ->select('c1.title as category_name',
                                'c1.id as category_id',
                                'p1.created_at as created_at',
                                'p1.id as post_id',
                                'p1.body as post_body',
                                't1.id as thread_id',
                                't1.title as thread_title',
                                't1.slug as thread_slug',
                                'u1.title as user_title',
                                'u1.name as user_name',
                                'u1.id as user_id')
                            ->where('p1.id', $lastPost)
                            ->first();

                            $category->last_post_time = $post->created_at;
                            $category->last_post_author = $post->user_name;
                            $category->last_thread_title = $post->thread_title;
                            $category->thread_slug = $post->thread_slug;
                            $category->user_name = $post->user_name;
                            $category->user_id = $post->user_id;
                    }else{
                            $category->last_post_time = null;
                            $category->last_post_author = null;
                            $category->last_thread_title = null;
                            $category->thread_slug = null;
                            $category->user_name = null;
                            $category->user_id = null;
                    }
                }
            return view('layouts.forum.view', compact('categories'));
    }
}
