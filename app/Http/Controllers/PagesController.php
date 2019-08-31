<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    public function personalInfo(){
        return view('admin.pages.Info.create');
    }
}
