<?php

namespace App\Http\Controllers\Front;
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
    public function getcategory(Request $request){
        $dis_id = $request->dis_id;

        $areas = Area::where('district_id', '=', $dis_id)
                  ->orderBy('area_name', 'asc')
                  ->get();

        return \Response::json($areas);
    }
    public function index()
    {
        return view('front.home');
//         $districts = District::all();
//         $posts = Listing::orderBy('id', 'DESC')->get();
// return 'dfsd';
        // return view('front.post', compact('districts','posts'));
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
        return view('front.post', compact('districts', 'categories', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::find($request->category);
        $district = District::find($request->district);
        $area = Area::find($request->area);
        $post = new Listing();
        $post->category = $category->category_name;
        $post->district = $district->districts_name;
        $post->area = $area->area_name;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->website = $request->website;
        $post->reviewed = 0;
        // $post->lon = $request->lon;
        // $post->lat = $request->lat;
        $post->tags = $request->tags;

        $slug = str_replace(' ', '-', $request->name).'-'.strtolower($request->area);
        // $slug_ex = Listing::where('slug', $slug)->get();
        // $i=0;
        // if(Listing::where('slug', $slug)->exists()) {
        // while (Listing::where('slug', $slug)->exists()){
        //         $post->slug = $slug.'-'.$i++;
        //     }
        // }
        //     else {
        //         $post->slug = $slug;
        //     }
        $post->slug = $slug;
        $post->save();
        return redirect('/');

    }

    public function incrementSlug($slug) {

        $original = $slug;
    
        $count = 2;
    
        while (static::whereSlug($slug)->exists()) {
    
            $slug = "{$original}-" . $count++;
        }
    
        return $slug;
    
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
        $post = Listing::find($id);
        $input = $request->all();
        $post->fill($input)->save();
        return redirect('/post');
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
