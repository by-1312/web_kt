<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class MovieLayout extends Component
{
    public $genre;
    public $title; // 1. Thêm biến title vào đây

    /**
     * Create a new component instance.
     */
    // 2. Thêm tham số $title vào hàm __construct
    public function __construct($title = "Trang chủ") 
    {
        $this->genre = DB::table("genre")->get();
        $this->title = $title; // 3. Gán giá trị được truyền từ View vào biến class
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.movie-layout');
    }
}