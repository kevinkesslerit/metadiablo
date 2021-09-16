<?php

namespace App\Http\Controllers;

use App\forum_category;
use App\forum_thread;
use App\forum_post;
use App\stats;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class postsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($categorySlug, $threadSlug)
    {
        $threadTitle = DB::table('forum_threads')->where('slug', $threadSlug)->value('title');
        return view('layouts.forum.posts.create', compact('categorySlug', 'threadSlug', 'threadTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $categorySlug, $threadSlug)
    {
        $this->validate(request(), [
            'body' => 'required|string',
        ]);
        
        $request->request->add(['user_id' => $request->user()->id]);


        $postCreate = new forum_post([
            'thread_slug' => $threadSlug,
            'user_id' => $request->user_id,
            'category_slug' => $categorySlug,
            'body' => $request->body,
        ]);
        $postCreate->save();

        forum_category::where('slug', $categorySlug)
        ->update(['last_post_id' => $postCreate->id]);
        forum_category::where('slug', $categorySlug)
        ->increment('total_posts');


        forum_thread::where('slug', $threadSlug)
        ->update(['last_post_id' => $postCreate->id]);
        forum_thread::where('slug', $threadSlug)
        ->increment('total_posts');
        
        stats::whereId(1)->increment('total_posts');

        $totalThreadPosts = forum_post::where('thread_slug', $threadSlug)->count();
        forum_post::where('id', $postCreate->id)->update(['post_order' =>  (int)$totalThreadPosts - 1]);

        DB::table('users')->whereId($request->user()->id)->increment('post_count');

        //return to post
        return redirect()->route('forumPosts', ['categorySlug' => $categorySlug, 'threadSlug' => $threadSlug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     * * php artisan make:migration create_forum_posts_table --table=forum_posts
     */
    public function show($categorySlug, $threadSlug)
    {
        $thread=DB::table('forum_threads')->where('slug', $threadSlug)->first();
        //Id($threadID)->first();
        //ᕦ(ò_óˇ)ᕤ This method took some time.
        $posts = DB::table('forum_posts as p1')
        ->Join('users as u1', 'u1.id', '=', 'p1.user_id')         // associate users id to post id
        ->Join('forum_threads as t1', 't1.slug', '=' , 'p1.thread_slug')   // associate threads to post threadid
        ->Join('forum_categories as c1', 'c1.slug', '=', 't1.category_slug')  // associate Category to post category id
        ->select('c1.title as category_name',
            'c1.id as category_id',
            'p1.created_at as created_at',
            'p1.id as post_id',
            'p1.rating as post_rating',
            'p1.post_order as post_order',
            'p1.body as post_body',
            't1.id as thread_id',
            't1.title as thread_title',
            't1.slug as thread_slug',
            't1.created_at as thread_created_at',
            't1.views as thread_views',
            't1.total_posts as thread_posts',
            'u1.avatar as user_avatar',
            'u1.created_at as user_join_date',
            'u1.title as user_title',
            'u1.name as user_name',
            'u1.id as user_id')
        ->where('p1.thread_slug', $threadSlug)
        ->orderBy('post_order', 'asc')
        ->paginate(25);
        
        //increase view counts for both threads and categories
        //DB::table('forum_threads')->whereId($threadID)->increment('views');
        //DB::table('forum_categories')->whereId($categoryID)->increment('views');
        forum_thread::where('slug', $threadSlug)->increment('views');
        //dd($posts);
        $categoryTitle = DB::table('forum_categories')->where('slug', $categorySlug)->value('title');
        $threadTitle = forum_thread::where('slug', $threadSlug)->value('title');
        if (!isset($threadTitle) || !isset($categoryTitle)){
            abort(404);
        }else{
            return view('layouts.forum.posts.view', compact('categorySlug', 'threadSlug', 'posts', 'thread', 'categoryTitle','threadTitle'));
        }
    }
}
