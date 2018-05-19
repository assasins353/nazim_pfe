<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Http\Requests;
use Baum\MoveNotPossibleException;

class VideoController extends Controller
{
    //
    protected $videos;

    public function __construct(Video $videos)
    {
        $this->videos = $videos;
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
      $videos = $this->videos->all();
          
      return view('manage.videos.index', compact('videos'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Video $video)
    {
      return view('manage.videos.form', compact('video'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreVideoRequest $request)
    {
      $videos = $this->videos->create($request->only('videos'));
  
    
  
      return redirect(route('videos.index'))->with('status', 'La page a été crée.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
    
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
        
      
    }
  
    public function confirm($id)
    {
        $video = $this->videos->findOrFail($id);
  
        return view('manage.videos.confirm', compact('video'));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = $this->videos->findOrFail($id);
  
        $video->delete();
  
        return redirect(route('videos.index'))->with('status', 'L\'article a été supprimé.');
    }
}
