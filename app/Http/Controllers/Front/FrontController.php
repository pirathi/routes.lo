<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\District;
use App\Models\Category;
use App\Models\Listing;

class FrontController extends Controller
{
    public function __construct() { 
        $districts_drop = District::pluck('districts_name', 'id');
    }

    public function index()
    {
        
        $districts = District::all();
        $districts_drop = District::pluck('districts_name', 'id');
        return view('front.home',compact('districts', 'districts_drop'));
    }

    public function category($district)
    {
        $dist = District::where('districts_name', '=', $district)->first();
        $districts_drop = District::pluck('districts_name', 'id');
 
        if($dist) {
            $categories = Category::all();
            return view('front.category', compact('categories','districts_drop'));
        }
        else {
            echo 'sdfs';
        }
        // 
        
    }

    public function getListing($district, $category)
    {
        // return $district.$category;
        $lists =DB::table('listings')
            ->orderby('id', 'asc')
            ->where('district', $district)
            ->where('category', $category)
            ->where('reviewed', 1)
            ->paginate(15);
        return view('front.listing', compact('lists'));
    }
    
    public function listDescription()
    {
        return 'sfsdfsd';
    }
    public function getdata()
    {
        return view('front.data');
    }
    public function savedata(Request $requests)
    { 
        // return \Response::json($requests->all());
        $post = new Listing();
        foreach($requests as $request) {
           return \Response::json($request);
        $post->category = 'atm';
        $post->district = 'jaffna';
        $post->area = $request->areas;
        $post->name = $request->names;
        }
        
        // $post->description = '';
        // $post->address = $request->address;
        // $post->phone = $request->phones;
        // $post->email = $request->emails;
        // $post->website = $request->webs;
        // $post->reviewed = 1;
        // // $post->lon = $request->lon;
        // // $post->lat = $request->lat;
        // $post->tags = $request->tags;

        $slug = str_replace(' ', '-', $request->names).'-'.strtolower($request->areas);
        $post->slug = $slug;
        $post->save();
        // return view('front.data');
    }
}
