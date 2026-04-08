<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController1 extends Controller
{
    public function create()
    {

        $genre = DB::table('genre')->get();
        $title = "Thêm phim mới";
        
        return view('movie.create', compact('genre', 'title'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'movie_name'    => 'required',
            'movie_name_vn' => 'required',
            'release_date'  => 'required|date_format:Y-m-d',
            'overview'      => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required'    => ':attribute không được để trống.',
            'image'       => 'Tệp tải lên phải là định dạng hình ảnh.',
            'mimes'       => 'Ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'date_format' => 'Ngày phát hành phải nhập đúng định dạng yyyy-mm-dd.',
            'max'         => 'Ảnh không được vượt quá 2MB.',
        ], [
            'movie_name'    => 'Tên tiếng Anh',
            'movie_name_vn' => 'Tên tiếng Việt',
            'release_date'  => 'Ngày phát hành',
            'overview'      => 'Mô tả',
            'image'         => 'Ảnh đại diện',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $imageName);
        }
        DB::table('movie')->insert([
            'movie_name'    => $request->movie_name,
            'original_name' => $request->movie_name,
            'movie_name_vn' => $request->movie_name_vn,
            'release_date'  => $request->release_date,
            'overview'      => $request->overview,
            'image'         => $imageName,
        ]);

        return redirect('/movie_manager')->with('msg', 'Thêm phim mới thành công!');
    }
}