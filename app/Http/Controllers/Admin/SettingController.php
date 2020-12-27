<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.setting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //         'app_name' => 'required',
        //         'app_des' => 'required',
        //         'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]
        // );storage/app/public
        $setting = new Setting();
        $req = $request->all();
        
        $image = $request->file('logo');
        $input['logo'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['logo']);

        foreach($req as $key => $value) {
            for($i = 1; $i < 2; $i++) {
                $data[] = [
                    'setting_name' => $key,
                    'setting_value'=> $value,
                ];
            }
        }
        Setting::insert($data);
        return $data;

        // $setting->setting_name->app_name = $request->app_name;
        // $setting->setting_name->des = $request->app_des;

        // $setting->save();
        // return redirect('/setting');
       
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
