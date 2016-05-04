<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;


use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$categorys= Task::paginate(15);
    	
    	return view('admin/category/index')->with('categorys', $categorys);
    }

    public function add(Request $request){

    	 $file = $request->file('image');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
    }
}
