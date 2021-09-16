<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\forum_thread;
use App\forum_post;
use App\forum_category;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\stats;
class ThreadsController extends Controller


{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($categorySlug)
    {
        $categoryTitle = DB::table('forum_categories')->where('slug', $categorySlug)->value('title');
        return view('layouts.forum.threads.create', compact('categorySlug', 'categoryTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $categorySlug)
    {
        //dd($request);
        $this->validate(request(), [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        
        $request->request->add(['user_id' => $request->user()->id]);
        $request->request->add(['category_slug' => $categorySlug]);
        //create safe title slug
        $threadCreateSlug = Str::slug($request->title, '-');
        $request->request->add(['slug' => $threadCreateSlug]);


        $threadCreate = new forum_thread([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'category_slug' => $request->category_slug,
            'last_post_id' => 0,
        ]);

        $threadCreate->save();

        $lastThreadSlug = $threadCreate->slug;
        //$threadCreate=forum_thread::create(request(['title', 'user_id', 'category_slug', 'slug', 'last_post_id']));
        //$request->request->add(['thread_slug' => '']);
        $postCreate = new forum_post([
            'thread_slug' => $lastThreadSlug,
            'user_id' => $request->user_id,
            'category_slug' => $request->category_slug,
            'body' => $request->body,
        ]);
        $postCreate->save();

        forum_category::where('slug', $request->category_slug)
        ->update(['last_post_id' => $postCreate->id]);
        forum_category::where('slug', $request->category_slug)
        ->increment('total_threads');
        DB::table('users')->whereId($request->user()->id)->increment('post_count');
        stats::whereId(1)->increment('total_posts');
        //return to post
        return redirect()->route('forumPosts', ['categorySlug' => $categorySlug, 'threadSlug' => $lastThreadSlug]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categorySlug)
    {
        $threads = DB::table('forum_threads as t1')
        ->join ('users as u1', 'u1.id', '=' , 't1.user_id') //associate user to thread
        ->join ('forum_categories as c1', 'c1.slug', '=' , 't1.category_slug') //associate category to thread
        ->select('u1.title as user_title',
                'u1.name as user_name',
                'u1.id as user_id',
                't1.id as thread_id',
                't1.category_slug as thread_parent_slug',
                't1.user_id as thread_author_id',
                't1.title as thread_title',
                't1.slug as thread_slug',
                't1.created_at as thread_created_at',
                't1.last_post_id as thread_last_post_id',
                't1.views as thread_views',
                't1.total_posts as thread_posts',
                'c1.title as category_name',
                'c1.id as category_id')
        ->where('c1.slug', $categorySlug)
        ->orderBy('thread_id', 'desc')
        ->paginate(25);

        forum_category::where('slug', $categorySlug)->increment('views');
        $categoryTitle = forum_category::where('slug', $categorySlug)->value('title');
        

        foreach ($threads as $thread) {
            if ($thread->thread_last_post_id > 0) {
                $thread->lastPostAuthor = User::where('id', $thread->user_id)->value('name');
                $thread->lastPostAuthorId = User::whereId($thread->user_id)->value('id');
                $thread->lastPostCreatedAt = forum_post::where('id', $thread->thread_last_post_id)->value('created_at');
            }else{
                $thread->lastPostAuthor = null;
                $thread->lastPostAuthorId = null;
                $thread->lastPostCreatedAt = null;
            }
        }



        return view('layouts.forum.threads.view', compact('threads', 'categorySlug', 'categoryTitle'));
    }
}
