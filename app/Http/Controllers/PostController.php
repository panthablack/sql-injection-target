<?php

namespace App\Http\Controllers;

use App\Actions\Custom\NoNoDB;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Posts', ['posts' => Post::latest()->get()]);
        // return view('posts.index', ['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CreatePost');
        // return view('posts.create', ['posts' => Post::all()]);
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $title = $request['title'];
        $body = $request['body'];
        $query = "INSERT INTO sql_injection_test.posts (title,body)
          VALUES(\"$title\",\"$body\");";
        $db = new NoNoDB();
        $res = $db->noNoQuery($query);
        $info = [
            '$request' => $request,
            '$title' => $title,
            '$body' => $body,
            '$query' => $query,
            '$db' => $db,
            '$res' => $res,
        ];
        // dd($info);
        // WHERE 1 = 1; select * from users; --

        // SAFE v1 *********************************************************************************
        // $title = $request['title'];
        // $body = $request['body'];
        // $post = Post::create([
        //     'title' => $title,
        //     'body' => $body,
        // ]);
        // $post->save();
        // *****************************************************************************************


        // DB::query(
        //     'INSERT INTO sql_injection_test.posts (title,body)
        //     VALUES("' . $title . '","' . $body . '");'
        // );
        return redirect('/posts');
    }

    // INSERT INTO posts (title,body) VALUES("I love cake","I am the greatest, yo!");

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = $_GET['id'] ?? 1;
        $query = "SELECT * FROM sql_injection_test.posts WHERE id = $id;";
        $db = new NoNoDB();
        $res = $db->noNoQuery($query) ?? [];
        $post = $res[0] ?? [];
        $safe = Post::find($id) ?? [];
        $info = [
            'query' => $query,
            'nono' => $post,
            'safe' => $safe,
        ];
        // dd($info);
        return Inertia::render('Post', ['post' => $post]);
    }
    // SAFE // *************************************************************************************
    // public function show()
    // {
    //     $id = $_GET['id'] ?? 1;
    //     $post = Post::find($id) ?? [];
    //     return Inertia::render('Post', ['post' => $post]);
    // }
    // SAFE // *************************************************************************************

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
