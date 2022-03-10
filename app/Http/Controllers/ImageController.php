<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function index()
    {
        //
        return view('backend.module', ['header' => '校園映象圖片管理', 'module' => 'Image']);
    }
    
}

