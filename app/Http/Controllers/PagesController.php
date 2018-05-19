<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Requests;
use Baum\MoveNotPossibleException;

class PagesController extends Controller
{
    protected $pages;

    public function __construct(Page $pages)
    {
        $this->pages = $pages;

        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $pages = $this->pages->all();
        
        return view('manage.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    { 
        $templates = $this->getPageTemplates();

        $orderPages = $this->pages->where('hidden', false)->orderBy('lft', 'asc')->get();
       
        return view('manage.pages.form', compact('page', 'templates', 'orderPages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePageRequest $request)
    { 
        $page = $this->pages->create($request->only('title', 'uri', 'name', 'content', 'template', 'hidden'));

        $this->updatePageOrder($page, $request);

        return redirect(route('pages.index'))->with('status', 'La page a été crée.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $page = $this->pages->findOrFail($id);

        $templates = $this->getPageTemplates();

        $orderPages = $this->pages->where('hidden', false)->orderBy('lft', 'asc')->get();

        return view('manage.pages.form', compact('page', 'templates', 'orderPages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePageRequest $request, $id)
    {
      
        $page = $this->pages->findOrFail($id);
     
       /* if ($response = $this->updatePageOrder($page, $request)) {
           
            return $response;
        }*/
       
        $page->fill($request->only('title', 'uri', 'name', 'content', 'template', 'hidden'))->save();
        
        return redirect(route('pages.index', $page->id))->with('status', 'La page a été modifiée.');
    }

    public function confirm($id)
    { 
        $page = $this->pages->findOrFail($id);

        return view('manage.pages.confirm', compact('page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $page = $this->pages->findOrFail($id);

        foreach ($page->children as $child) {
            $child->makeRoot();
        }

        $page->delete();

        return redirect(route('pages.index'))->with('status', 'La page a été supprimée.');
    }

    protected function getPageTemplates()
    {  
        $templates = config('cms.templates');

        return ['' => ''] + array_combine(array_keys($templates), array_keys($templates));
    }

    protected function updatePageOrder(Page $page, Request $request)
    {
       
        if ($request->has('order', 'orderPage')) {
            try {
              
                $page->updateOrder($request->input('order'), $request->input('orderPage'));
            } catch (MoveNotPossibleException $e) {
                return redirect(route('manage.pages.form', $page->id))->withInput()->withErrors([
                    'error' => 'Cannot make a page a child of itself.'
                ]);
            }
        }
    }
}
