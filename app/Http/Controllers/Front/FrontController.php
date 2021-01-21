<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\District;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Area;


class FrontController extends Controller
{
    public function __construct() { 
        $districts_drop = District::pluck('districts_name', 'id');
    }
    public function getdata()
    {
        return view('front.data');
    }
    public function savedata(Request $request)
    { 
        // return $request->areas;
        foreach ($request->names as $key => $name) {
            $listing = new Listing;
            $areaid= Area::where('area_name', $request->areas[$key])->first();
            $listing->district = 1;
            $listing->category = 44;
            $listing->phone = $request->phones[$key] ;
            $listing->website = $request->websites[$key] ;
            $listing->address = $request->address[$key] ;
            $listing->email = $request->emails[$key] ;
            $listing->area = $areaid->id;
            $listing->name = $request->names[$key] ;
            $slug = str_replace(' ', '-', strtolower($request->names[$key])).'-'.str_replace(' ', '-', strtolower($request->areas[$key]));
            $listing->slug = $slug;
            $listing->description = 'null';
            $listing->tags = str_replace(' ', '_', strtolower($request->names[$key])).'_'.strtolower($request->areas[$key]).', '.str_replace(' ', '_', strtolower($request->names[$key])).', '.strtolower($request->areas[$key]).' contact number, address, location, phone number, mobile number';

            $listing->save();
        }
        return 'saved';
        // $table->string('category');
        // $table->string('district');
        // $table->string('phone');
        // $table->string('website');
        // $table->string('address');
        // $table->string('email');
        // $table->string('area');
        // $table->string('name');
        
        
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
            echo 'No results found...';
        }
        // 
        
    }

    public function getListing($district, $category)
    {
       
        $districtid = District::where('districts_name', $district)->first();
        
        $category_id = Category::where('category_name', $category)->first();

        
        
        $lists =Listing::where('district', $districtid->id)
            ->where('category', $category_id->id)
            ->where('reviewed', 1)
            ->orderby('id', 'asc')
            ->paginate(15);
            //  return $lists;
        return view('front.listing', compact('lists'));
    }
    
    public function listDescription($district, $category, $id)
    {
        $details = Listing::whereId($id)->first();
        // return $details->slug;
        $slug = str_replace(" ", "-",$details->slug);
        // return $slug;

        return redirect()->route('details',[$district,$category, $slug]);
    }

    public function details($district, $category, $slug)
    {
       return $slug;

    }
    
}
