<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdatePictureRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::all();
        return view('posts.list', compact('posts'));
    }
    public function detail($id){
        $post = Post::find($id);
        return view('posts.post', compact('post'));
    }
    public function add(){
        return view('posts.add');
    }
    public function insertPost(PostStoreRequest $request){
        $params = $request->validated();
        $file = Storage::put('public', $params['picture']);
        $params['picture']  = str_replace("public/", "", $file);
        Post::create($params);
        return redirect('/posts');
    }
    public function removePost($id){
        $post = Post::find($id);
        if (Storage::exists("public/$post->picture")) {
            Storage::delete("public/$post->picture");
        }
        $post->delete();
        return redirect()->route('postList');
    }
    public function update($id){
        $post = Post::find($id);
        return view('posts.update', compact('post'));
    }
    public function updatePost($id, PostUpdateRequest $request){
        $params = $request->validated();
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'extrait' => $request->extrait, 
            'description' => $request->description
        ]);
        return back();
        //return redirect()->route('postList');
    }
    public function updatePicturePost(PostUpdatePictureRequest $request, $id){
        $params = $request->validated();
        $post = Post::find($id);
        if (Storage::exists("public/$post->picture")) {
            Storage::delete("public/$post->picture");
        }
        $file = Storage::put('public', $params['picture']);
        $params['picture']  = str_replace("public/", "", $file);
        $post->update(['picture' => $params['picture']]);
        return back();
    }
}
