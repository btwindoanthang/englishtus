<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use Validator, Input, Redirect; 
use Illuminate\View\Middleware\ErrorBinder;




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

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        //dd($validator->errors()->all());exit;
        if ($validator->fails()) {
            //dd($validator->errors()->all());exit;
           return redirect()->back()
                  ->withInput($request->all())
                  ->withErrors($validator->errors());
        }
        $imagepath='source/category/image';
        $videopath='source/category/video';

        $name =$request->get('name');
        $image = $request->file('image');
        $video = $request->file('video'); 
        
        $nameimage='image_'.date("YmdHis").'.'.$image->getClientOriginalExtension();
        $namevideo='video_'.date("YmdHis").'.'.$video->getClientOriginalExtension();
        

        $category = new Task(array(
        'name'   => $name,
        'image'  => $nameimage,
        'video'  => $namevideo,
        'done_flg' =>'0'
        ));
        $category->save();
        $image->move($imagepath,$nameimage);
        $video->move($videopath,$namevideo);

        return redirect('admin/category');
    } 
}
