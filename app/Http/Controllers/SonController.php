<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Son;
use App\Http\Requests;
use Baum\MoveNotPossibleException;

class SonController extends Controller
{
    //
    protected $sons;

    public function __construct(Son $sons)
    {
        $this->sons = $sons;
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sons = $this->sons->all();
          
      return view('manage.sons.index', compact('sons'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Son $son)
    {
      return view('manage.sons.form', compact('son'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreSonRequest $request)
    {
      $sons = $this->sons->create($request->only('image'));
  
    
  
      return redirect(route('sons.index'))->with('status', 'La page a été crée.');
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
        $son = $this->sons->findOrFail($id);
  
        return view('manage.sons.confirm', compact('son'));
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $son = $this->sons->findOrFail($id);
  
        $son->delete();
  
        return redirect(route('sons.index'))->with('status', 'L\'article a été supprimé.');
    }
}
