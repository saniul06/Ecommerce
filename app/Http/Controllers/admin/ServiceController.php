<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\Multiimage;
use Auth;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Image;

class ServiceController extends Controller
{
    public function addService()
    {
        $categories = Category::all();
        return view('admin.service.add-service', compact('categories'));
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'price' => 'required',
            'cat_id' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'img' => 'required',
        ], [
            "cat_id.required" => 'The category field is required',
        ]);

        $img = $request->file('img');
        foreach ($img as $image) {
            $ext = $image->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
                return redirect()->back()->with('img_error', 'The image must be a file of type: jpg, jpeg, png, gif');
            }
        }

        $service_id = Service::insertGetId([
            'service_name' => $request->name,
            'service_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'service_code' => $request->code,
            'category_id' => $request->cat_id,
            'owner_id' => Auth::user()->id,
            'short_desc' => $request->short_desc,
            'price' => $request->price,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now(),
        ]);

        $img = $request->file('img');
        foreach ($img as $image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/frontend/img/service/multi/' . $name_gen);
            Multiimage::insert([
                'img' => $name_gen,
                'service_id' => $service_id,
                'created_at' => Carbon::now()
            ]);
        }


        session()->flash('message', 'Service Added Successfully');
        return redirect()->route('service.manage');
    }

    public function manageService()
    {
        $services = Service::latest()->get();
        return view('admin.service.manage-service', compact('services'));
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all();
        return view('admin.service.edit-service', compact('service', 'categories'));
    }

    public function updateService($id, Request $request)
    {
        $check = Multiimage::where('service_id', $id)->first();
        if($check){
            $request->validate([
                'name' => 'required|max:255',
                'code' => 'required|max:255',
                'price' => 'required',
                'cat_id' => 'required',
                'short_desc' => 'required',
                'long_desc' => 'required',
            ], [
                "cat_id.required" => 'The category field is required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|max:255',
                'code' => 'required|max:255',
                'price' => 'required',
                'cat_id' => 'required',
                'short_desc' => 'required',
                'long_desc' => 'required',
                'img' => 'required',
            ], [
                "cat_id.required" => 'The category field is required',
            ]);
        }


        $img = $request->file('img');
        if($img != null){
            foreach ($img as $image) {
                $ext = $image->getClientOriginalExtension();
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
                    return redirect()->back()->with('img_error', 'The image must be a file of type: jpg, jpeg, png, gif');
                }
            }
        }


        $service = Service::findOrFail($id);
        $service->update([
            'service_name' => $request->name,
            'service_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'service_code' => $request->code,
            'category_id' => $request->cat_id,
            'owner_id' => Auth::user()->id,
            'short_desc' => $request->short_desc,
            'price' => $request->price,
            'long_desc' => $request->long_desc,
        ]);

        $img = $request->file('img');
        if($img != null){
            foreach ($img as $image) {
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(270, 270)->save('public/frontend/img/service/multi/' . $name_gen);
                Multiimage::insert([
                    'img' => $name_gen,
                    'service_id' => $id,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        session()->flash('message', 'Service Updated Successfully');
        return redirect()->route('service.manage');
    }

    public function deleteService($id)
    {
        $service = Service::find($id);
        // dd($service);

        foreach ($service->images as $item) {
            // dd($item);
            $img = base_path() . '/public/frontend/img/service/multi/' . $item->img;
            File::delete($img);
            // echo $item->img . '<br>';
        }

        Multiimage::where('service_id', $id)->delete();
        // $img_1 = base_path() . '/public/frontend/img/service/uploads/' . $service->img_1;
        // File::delete($img_1);
        // $img_2 = base_path() . '/public/frontend/img/service/uploads/' . $service->img_2;
        // File::delete($img_2);
        $service->delete();
        session()->flash('message', 'Service Deleted Successfully');
        return redirect()->back();
    }

    public function deleteImage($img, $id)
    {
        $image = $img;
        $img = base_path() . '/public/frontend/img/service/multi/' . $img;
        File::delete($img);
        Multiimage::where('service_id', $id)->where('img', $image)->delete();
        session()->flash('message', 'Image Deleted Successfully');
        return redirect()->route('service.edit', $id);
    }

    public function statusService($id, $status)
    {
        if ($status == 1) {
            $service = Service::findOrFail($id);
            $service->update([
                'status' => 0
            ]);
        } else {
            $service = Service::findOrFail($id);
            $service->update([
                'status' => 1
            ]);
        }
        session()->flash('message', 'Status Changed Successfully');
        return redirect()->back();
    }
}
