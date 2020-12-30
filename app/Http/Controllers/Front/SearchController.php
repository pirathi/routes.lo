<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Listing;
use App\Models\District;

class SearchController extends Controller
{
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


            

        $listings = $q->orderby('id', 'asc')->get();
        //return $listings ;->paginate(5);
        // return back()->with('error', 'ddd.');
         return view('front.search', compact('listings'));
        
    }
}
