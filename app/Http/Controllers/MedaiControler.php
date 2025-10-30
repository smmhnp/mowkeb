<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Requests\VideoRequest;

use App\Models\Image;
use App\Models\Video;

class MedaiControler extends Controller
{
    public function ImageGallery(){
        $images = Image::paginate(9);
        $count = Image::count();

        return view('admin.image', compact('images', 'count'));
    }

    //.....add.image...............................................

    public function ImageManager(){
        $images = Image::latest()->take(4)->get();

        return view('admin.addImage', compact('images'));
    }

    public function ImageStore(ImageRequest $request){
        $file = $request->file('image');
        $fileName = time() . "_" . str_replace(" ","_",$file->getClientOriginalName());
        $filePath = $file->storeAs('images', $fileName, 'public');

        Image::create([
            "name" => $request->name,
            "url" => $filePath,
            "alt" => $request->alt,
            "description" => $request->description,
        ]);

        return redirect()->back()->with('success', 'تصویر با موفقیت اضافه شد!');
    }

    //.....update.image...............................................

    public function UpdateImageManager($id){
        $images = Image::latest()->take(4)->get();
        $currentImage = Image::findOrFail($id);

        return view('admin.addImage', compact('images', 'currentImage'));
    }

    public function UpdateImageStore(UpdateImageRequest $request, Image $image){
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . "_" . str_replace(" ", "_", $file->getClientOriginalName());
            $filePath = $file->storeAs('images', $fileName, 'public');

            if ($image->url && file_exists(public_path('storage/' . $image->url))) {
                unlink(public_path('storage/' . $image->url));
            }

            $data['url'] = $filePath;
        }

        $image->update($data);

        return redirect()->route('MedaiControler.ImageGallery')->with('success', 'تصویر با موفقیت ویرایش شد');
    }

    //.....delete.image...............................................

    public function DestroyImage(Image $image){
        if ($image->url && file_exists(public_path('storage/' . $image->url))) {
            unlink(public_path('storage/' . $image->url));
        }

        $image->delete();
        return response()->json(['success' => true]);
    }

    //...............................................video...............................................

    public function VideoGallery(){
        $videos = Video::paginate(9);
        $count = Video::count();

        return view('admin.video', compact('videos', 'count'));
    }

    //.....add.video...............................................

    public function VideoManager(){
        $videos = Video::latest()->take(3)->get();

        return view('admin.addVideo', compact('videos'));
    }

    public function VideoStore(VideoRequest $request){
        $data = $request->validated();
        Video::create($data);

        return redirect()->back()->with('success', 'ویدیو با موفقیت اضافه شد!');
    }

    //.....update.video...............................................

    public function UpdateVideoManager($id){
        $videos = Video::latest()->take(3)->get();
        $currentVideo = Video::findOrFail($id);

        return view('admin.addVideo', compact('videos', 'currentVideo'));
    }

    public function UpdateVideoStore(VideoRequest $request, Video $video){
        $data = $request->validated();
        $video->update($data);

        return redirect()->route('MedaiControler.VideoGallery')->with('success', 'تصویر با موفقیت ویرایش شد');
    }

    //.....delete.video...............................................

    public function DestroyVideo(Video $video){
        $video->delete();
        return response()->json(['success' => true]);
    }
}
