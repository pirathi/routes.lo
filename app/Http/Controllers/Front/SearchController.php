<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\Listing;
use App\Models\District;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = Listing::query();
        
        $wrd = $request->search_word;
        $dis_id = $request->district;
        $area = $request->city;
        $dist = $request->districthid;
        $cate = $request->category;

        $dis_name = DB::table('districts')
                    ->where('id',$dis_id)
                    ->pluck('districts_name');
        // return $dis_name;
        if (!empty($wrd)) {
            $q->where('name', 'like', "%$wrd%");
        }
        
        if (!empty($dis_id)) {
            $q->where('district', $dis_name);
        }

        if (!empty($wrd) && !empty($area) && !empty($dist)) {
            $q->where('district', $dist)
                ->where('area', $area)
                ->where('name', 'like', "%$wrd%")
                ->orwhere('category', $wrd);
                 
        }

        if (!empty($wrd) && !empty($dis_id)) {
            $q->where('name', 'like', "%$wrd%")
                ->where('district', $dis_name);
        }

        if (!empty($cate) && !empty($area)) {
            $q->where('category', $cate)
                ->where('area','like', "%$area%");
        }


            

        $listings = $q->orderby('id', 'asc')->get();
        //return $listings ;->paginate(5);
         return view('front.search', compact('listings'));
        
    }
}
