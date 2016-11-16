<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class FilesController extends Controller
{
    public function index(){
        return view('admin.files');
    }
}
