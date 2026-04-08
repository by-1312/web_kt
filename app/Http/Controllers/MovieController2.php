<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class MovieController2 extends Controller
{
    public function index()
    {
        $movies = DB::table('movie')->where('status', 1)->get();
        
        return view('movie.movie_manager', [
            'movies' => $movies,
            'title'  => 'Trang Quản Lý Phim' 
        ]);
    }

    public function show($id)
    {
        $movie = DB::table('movie')->where('id', $id)->first();
        
        if (!$movie) abort(404);

        return view('movie.detail', compact('movie'));
    }

    // Xóa mềm:
    public function destroy($id)
    {
        DB::table('movie')->where('id', $id)->update(['status' => 0]);
        
        return redirect()->back()->with('msg', 'Đã xóa thành công!');
    }
}