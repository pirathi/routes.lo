<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use App\Models\District;
use App\Models\Listing;
use App\Models\Area;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getarea(Request $request){
        $dis_id = $request->dis_id;


        $areas = Area::where('district_id', '=', $dis_id)
                  ->orderBy('area_name', 'asc')
                  ->get();

        return \Response::json($areas);
    }

    public function categoryfilter($id){
        // return $id;
        
        $posts = Listing::where('category',$id)->paginate(20);
        $categories = Category::all();

        return view('admin.post.post', compact('posts','categories'));
    }
    public function index()
    {

        $districts = District::all();
        $posts = Listing::paginate(20);
        
        $categories = Category::all();
        //Category::pluck('category_name', 'id');

        return view('admin.post.post', compact('districts','posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dis_id = Input::get('dis_id');

        $areas = Area::where('district_id', '=', $dis_id)
                  ->orderBy('area_name', 'asc')
                  ->get();
                  

        $districts = District::pluck('districts_name', 'id');
        // $areas = Area::pluck('area_name', 'id');
        $categories = Category::pluck('category_name', 'id');
        return view('admin.post.create', compact('districts', 'categories', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Listing();
        $post->category = $request->category;
        $post->district = $request->district;
        $post->area = $request->area;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->website = $request->website;
        // $post->lon = $request->lon;
        // $post->lat = $request->lat;
        $post->tags = $request->tags;

        $slug = str_replace(' ', '-', $request->name).'-'.strtolower($request->area);
        $post->slug = $slug;
        $post->save();
        return redirect('/post');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Listing::find($id);
        $categories = Category::pluck('category_name', 'id');
        $districts = District::pluck('districts_name', 'id');
        $areas = Area::pluck('area_name', 'id');
        return view('admin.post.edit', compact('post','categories','districts','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->page;
        $post = Listing::find($id);
        $input = $request->all();
        $post->fill($input)->save();
        return redirect('/post');
        // return redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Listing::find($id);
        $post->delete();
        return redirect('/post');
    }
}
