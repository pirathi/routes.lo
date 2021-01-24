<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Listing;
use App\Models\District;
use App\Models\Category;
use App\Models\Area;

class SearchController extends Controller
{
    public function homesearchres($district, $area, $key)
    {
        return 'home      '.$district.$area.$key;
        $districtid = District::where('districts_name', $district)->first();
        // $areaid = Area::where('area_name', $area)->first();
        $category_id = Category::where('category_name', $key)->first();

        $c = Category::select('category_name')
                ->where('category_name', $key)
                ->exists();
        $q = Listing::query();

        if ($c) {
            if (!empty($district)) {
                $q->where('district', $districtid->id)
                ->where('category', $category_id->id);
            }
            
        }
        else {
            if (!empty($district) && !empty($key)) {
                $q->where('district', $districtid->id)
                ->where('name', 'like', "%$key%");
            }
        }
        $listings = $q->orderby('id', 'asc')->paginate(15);
        // return $distrct.$kkk;
        return view('front.search', compact('listings'));
    }

    public function catsearchres($district, $area, $ke)
    {
        return $area;
        $districtid = District::where('districts_name', $district)->first();
        $areaid = Area::where('area_name', $area)->first();
        
        $category_id = Category::where('category_name', $ke)->first();
        $q = Listing::query();
        $check = Category::select('category_name')
                ->where('category_name', $ke)
                ->exists();
        if ($check) {
            $q->where('district', $districtid->id)
                ->where('area', $areaid->id)
                ->where('category',  $category_id->id);
        }
        else {
            $q->where('district', $districtid->id)
                ->where('area', $areaid->id)
                ->where('name', 'like', "%$ke%");
        }
               
        $listings = $q->where('reviewed', 1)->orderby('id', 'asc')->paginate(15);
        return view('front.search', compact('listings'));
    }

    public function homesearch(Request $request)
    {
        $district = District::whereId($request->h_district)->first();
        if ($request->has('h_district') || $request->has('h_search_word')) {
            return $district->districts_name;
            return redirect()->route('homesearchres',[$district->districts_name, $request->h_search_word,]);
        }

        if ($request->has('c_city') || $request->has('c_search_word')) {
            // return $request->c_city;
            // return redirect()->route('catsearchres',[$request->districthid,$request->c_city, $request->c_search_word]);
            return redirect()->route('homesearchres',[$request->districthid,$request->c_city, $request->c_search_word]);
        }

        if ($request->has('l_category') || $request->has('l_city') || $request->has('l_search')) {
            // return redirect()->route('catsearchres',[$request->districthid,$request->l_city, $request->l_search]);
            return redirect()->route('homesearchres',[$request->districthid,$request->l_city, $request->l_search]);
        }

        if ($request->has('s_city') || $request->has('s_searchkey')) {
            // return $request->s_city;
            // return redirect()->route('catsearchres',[$request->districthid,$request->s_city, $request->s_searchkey]);
            return redirect()->route('homesearchres',[$request->districthid,$request->s_city, $request->s_searchkey]);
        }
            // return redirect()->route('catsearchres',[$request->districthid,$request->l_city, $request->l_search]);
        // return $key;
        
    }

    public function index(Request $request)
    {
        $q = Listing::query();
        
        $wrd = $request->h_search_word;
        $dis_id = $request->h_district;
        $area = $request->city;
        $dist = $request->districthid;
        $cate = $request->category;

        $dis_name = DB::table('districts')
                    ->where('id',$dis_id)
                    ->pluck('districts_name');
        // return $dis_name;
        // if (!empty($wrd)) {
        //     $q->where('name', 'like', "%$wrd%");
        // }
        
        // if (!empty($dis_id)) {
        //     $q->where('district', $dis_name);
        // }

        // if (!empty($dist) && !empty($area)) {
        //     if (!empty($wrd)) {
        //         $q->where('district', $dist)
        //         ->where('area', $area)
        //         ->where('category', $wrd)
        //         ->orwhere('name', 'like', "%$wrd%");;
        //     }
        //     // $q->where('district', $dist)
        //     //     ->where('area', $area)
        //     //     ->where('category', $wrd)
                 
        // }

        // if (!empty($wrd) && !empty($dis_id)) {
        //     $q->where('district', $dis_name)
        //         ->where('name', 'like', "%$wrd%")
        //         ->orwhere('category', $wrd);
                
        // }

        // if (!empty($cate) && !empty($area)) {
        //     $q->where('category', $cate)
        //         ->where('area','like', "%$area%");
        // }
// return $dis_name;
        if (($request->has('h_search_word')) && ($request->has('district'))) {
            $q->where('district', $dis_name)
                ->where('name', 'like',"%$request->h_search_word%")
                ->orwhere('category', $request->h_search_word)
                ;
        }
        if (($request->has('c_search_word'))  && ($request->has('c_city'))) {
            $q->where('name', 'like',"%$request->c_search_word%")
                ->orwhere('category', $request->c_search_word)
                ->where('district', $dist)
                ->where('area', $request->c_city);
        }
        // if (($request->has('c_search_word'))) {
        //     $q->where('name', 'like',"%$request->c_search_word%")
        //         ->orwhere('category', $request->c_search_word)
        //         ->where('district', $dist);
        // }
        
        if (($request->has('l_category'))  && ($request->has('l_city'))) {
            $q->where('category', $request->l_category)
                ->where('district', $dist)
                ->where('area', $request->l_city);
        }


            

        $listings = $q->orderby('id', 'asc')->paginate(15);
        //return $listings ;->paginate(5);
        // return back()->with('error', 'ddd.');
         return view('front.search', compact('listings'));
        
    }
}
