<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\uploadImageTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;


class BannerController extends Controller
{
    use uploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::get();
        return view('banners.banner', compact('banner'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banner = Banner::all();
        Artisan::call('storage:link');

        return view('banners.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Banner $banner)
    {
        $this->validate($request, [

            'logo' => 'required|mimes:pdf,jpeg,png,jpg',
        ], [
                'logo.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
            ]);

            $banner =Banner::create
            ([
            'logo' => $this->uploadImage($request,'images'),
        ]);
        session()->flash('Add', 'تم اضافة العنصر بنجاح');
            return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('banners.edit', compact('banner'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $banner = Banner::findOrFail($request->id);
        $validated = $request->validate([
            'logo' => 'required|mimes:pdf,jpeg,png,jpg',
            ], [
                'logo.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
            ]);
            $distination = 'images'.$banner->logo;
            if (File::exists($distination))
            {
                File::delete($distination);
            }
            $banner->update([
            'logo' => $this->uploadImage($request,'images'),
        ]);
        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect('/');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(banner $banner)
    {
        //
    }
}
