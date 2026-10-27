<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // ←これが必要です！

class HomeController extends Controller
{
    public function index()
    {
        // データベースからお知らせを取得して変数に代入する
        $newsList = News::orderBy('created_at', 'desc')->get();

        // compact('newsList') でビューに変数として渡す
        return view('home', compact('newsList'));
    }
}