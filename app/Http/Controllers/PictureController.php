<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\Http\Requests;
use Baum\MoveNotPossibleException;

class PictureController extends Controller
{
    //
    protected $pictures;

  public function __construct(Picture $pictures)
  {
    
      $this->pictures = $pictures;
      
     
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pictures = $this->pictures->all();
  
    return view('manage.pictures.index', compact('pictures'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Picture $picture)
  {
    return view('manage.pictures.form', compact('picture'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Requests\StorePictureRequest $request)
  {
    
    $pictures = $this->pictures->create($request->only('image'));
   

    return redirect(route('pictures.index'))->with('status', 'La page a été crée.');
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
      $picture = $this->pictures->findOrFail($id);

      return view('manage.pictures.confirm', compact('picture'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $picture = $this->pictures->findOrFail($id);

      $picture->delete();

      return redirect(route('pictures.index'))->with('status', 'L\'article a été supprimé.');
  }
}
