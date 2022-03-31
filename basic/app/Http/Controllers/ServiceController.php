<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Service;

class ServiceController extends Controller
{
    public function Services(){
        $services = Service::latest()->paginate(3);
        return view('admin.services.index',compact('services'));
    }
    public function addService(Request $request){
        $services = new Service;
        $services -> service_name = $request -> service_name;
        $services -> user_id = Auth::user()->id;
        $services->save();

        return Redirect()->back()->with('success','New Services Inserted Successfully');
    }
    public function editService($id){
        $services = Service::find($id);
        return view('admin.services.editService',compact('services'));
    }
    public function updateService(Request $request,$id){
        $updateService = Service::find($id)->update([
            'service_name' => $request -> service_name,
            'user_id' => Auth::user() ->id
        ]);
        return Redirect()->route('service')->with('success','Updated The Service');
    }
}
