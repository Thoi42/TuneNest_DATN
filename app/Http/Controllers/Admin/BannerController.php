<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
class BannerController extends Controller
{
    public function index(){
        $dsbanner = Banner::all();
        return view('admin.banner.index', compact('dsbanner'));
    }
}
