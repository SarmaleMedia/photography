<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class PhotosController extends Controller
{
    public function categories()
    {
        return Category::all();
    }
}
