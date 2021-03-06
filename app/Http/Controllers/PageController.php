<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function show(Page $page)
    {
        $this->prepareTemplate($page);

        return view('page', compact('page'));
    }

    protected function prepareTemplate(Page $page)
    {    
        $templates = config('cms.templates');

        if ( !$page->template || ! isset($templates[$page->template])) {
          
            return;
        }
        
        $template = app($templates[$page->template]);

        $view = sprintf('templates.%s', $template->getView());
       

        if (! view()->exists($view)) {
           
            return;
        }
  

        $template->prepare($view = view($view));
    
        $page->view = $view;
    }
}
