<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller {

    public function index() {
        $allslider = Slider::select()->get();
        return view('Admin/slider', compact('allslider'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'url' => 'required',
            'picture' => 'required'
        ]);
        $picture = $request->picture;
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif' && $ext != 'bmp') {
                $ext = "";
            }
        }

        $data = [
            'url' => $request->url,
            'picture' => $ext
        ];

        $id = Slider::create($data)->id;
        if ($ext) {
            $picture->move("images/slider", "slide-img-{$id}.{$ext}");
        }
        return redirect('slider/add')->with('message', 'Slider Details Updated');
    }

    public function edit($id) {
        $allslider = Slider::where('id', '=', $id)->first();
        return view('Admin/sliderEdit', compact('allslider'));
    }

    public function update($id, Request $request) {
        $allSilder = DB::table('slider')->select()->where('id', $id)->get();
        foreach ($allSilder as $slider) {
            $old_ext = $slider->picture;
        }
        $this->validate($request, [
            'url' => 'required',
        ]);

        $picture = $request->picture;
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif' && $ext != 'bmp') {
                $ext = $old_ext;
            } else {
                if (file_exists("images/slider/{$id}.{$old_ext}")) {
                    unlink("images/slider/slide-img-{$id}.{$old_ext}");
                }
                $picture->move("images/slider", "slide-img-{$id}.{$ext}");
            }
        } else {
            $ext = $old_ext;
        }
        $data = [
            'url' => $request->url,
            'picture' => $ext
        ];
        Slider::where('id', $id)->update($data);
        return redirect('slider/add')->with('message', 'Slide Details UPdate Success');
    }

    public function delete($id) {
        $allSilder = DB::table('slider')->select()->where('id', $id)->get();
        foreach ($allSilder as $slider) {
            $old_ext = $slider->picture;
        }
        if (file_exists("images/slider/slide-img-{$id}.{$old_ext}")) {
            unlink("images/slider/slide-img-{$id}.{$old_ext}");
        }

        Slider::where('id', $id)->delete();
        return  redirect('slider/add')->with('msg', 'Slider Details Deteled Success');
    }

}
