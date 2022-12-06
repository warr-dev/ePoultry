<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    
    public $url, $method, $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url,$id,$method='get')
    {
        $this->url = $url;
        $this->method = $method;
        $this->id = $id;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
        <form action="{{$url}}" id="{{$id}}" @if($method=='get') method="get" @else method="post" @endif > @csrf @if($method!=='get') @method($method) @endif </form>
blade;
    }
}
