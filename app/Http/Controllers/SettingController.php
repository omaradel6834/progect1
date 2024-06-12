<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use App\Http\Traits\AttachFilesTrait;
class SettingController extends Controller
{
    use AttachFilesTrait;
    public function index()
    {
        $collection = setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('setting.index', $setting);
    }

    public function update(Request $request, setting $setting)
    {
        try{
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key=> $value){
                setting::where('key', $key)->update(['value' => $value]);
            }

//            $key = array_keys($info);
//            $value = array_values($info);
//            for($i =0; $i<count($info);$i++){
//                Setting::where('key', $key[$i])->update(['value' => $value[$i]]);
//            }

            if($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                setting::where('key', 'logo')->update(['value' => $logo_name]);
                $this->uploadFile($request,'logo','logo');
            }

            toastr()->success(trans('messages.Update'));
            return back();
        }
        catch (\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
    }

   
   