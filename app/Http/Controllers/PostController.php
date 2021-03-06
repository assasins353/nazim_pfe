<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use Baum\MoveNotPossibleException;

class PostController extends Controller
{
  protected $posts;

  public function __construct(Post $posts)
  {
      $this->posts = $posts;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $posts = $this->posts->with('author')->orderBy('published_at', 'desc')->paginate(10);

      return view('manage.posts.index', compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Post $post)
  {
      return view('manage.posts.form', compact('post'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Requests\StorePostRequest $request)
  {
    
      $this->posts->create(
          ['author_id' => auth()->user()->id] + $request->only('title','key_word','cat', 'slug', 'published_at', 'body', 'excerpt')
      );

      return redirect(route('posts.index'))->with('status', 'L\'article a été crée.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::where('id', $id)->first();
    
    return view("manage.posts.show")->withPost($post);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  { 
      $post = $this->posts->findOrFail($id);
     
      return view('manage.posts.form', compact('post'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Requests\UpdatePostRequest $request, $id)
  {
      
      $post = $this->posts->findOrFail($id);

      $post->fill($request->only('title', 'slug', 'published_at', 'body', 'excerpt','key_word'))->save();

      return redirect(route('posts.index', $post->id))->with('status', 'L\'article a été modifié.');
  }

  public function confirm($id)
  {
      $post = $this->posts->findOrFail($id);

      return view('manage.posts.confirm', compact('post'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $post = $this->posts->findOrFail($id);

      $post->delete();

      return redirect(route('posts.index'))->with('status', 'L\'article a été supprimé.');
  }
}
