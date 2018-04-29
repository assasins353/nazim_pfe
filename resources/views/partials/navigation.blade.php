<?php 
use App\Page;

$pag = App\Page::all();
?>
@foreach($pag as $pages)

    <li class="{{ Request::is($pages->uri_wildcard) ? 'active' : '' }} {{ count($pages->children) ? ($pages->isChild() ? 'dropdown-submenu' : 'dropdown') : '' }}">
        <a href="{{ url($pages->uri) }}">
            {{ $pages->title}}

            @if(count($pages->children))
                <span class="caret {{ $pages->isChild() ? 'right' : '' }}"></span>
            @endif
        </a>

        @if(count($pages->children))
            <ul class="dropdown-menu">
                @include('partials.bis', ['pag' => $pages->children])
            </ul>
        @endif
    </li>
@endforeach
