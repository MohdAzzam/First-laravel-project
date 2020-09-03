<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
        /*
         * ->except('index') if you want the user show the index and prevent any thing else use except
         * */
    }
    public function index()
    {
//        $this->authorize('index');
        $images=ImageUpload::latest()->get();
        return view ('/upload-image',compact('images'));

    }

    public function store()
    {
//        $this->authorize('create', ImageUpload::class);
        if(!is_dir(public_path('/images'))){
            mkdir(public_path('/images'),0777);
        }
        $images=Collection::wrap(request()->file('file'));

        $images->each(function ($images){
            $basename=Str::random();
            $path='/images';
            $original=$basename.'.'.$images->getClientOriginalExtension();
            $thumbnail=$basename.'_thumb.'.$images->getClientOriginalExtension();
            Image::make($images)->fit(250,250)->save(public_path($path.'/'.$thumbnail));
            $images->move(public_path($path),$original);
        ImageUpload::create([
            'original'=>$path.'/'.$original,
            'thumbnail'=>$path.'/'.$thumbnail,
        ]);
        });

    }
    public function destroy(ImageUpload $imageUpload)
    {
        $this->authorize('delete', $imageUpload);
        File::delete([
            public_path($imageUpload->original),
            public_path($imageUpload->thumbnail),
        ]);
        //delete the record from DB
        $imageUpload->delete();

        //redirect the user
        return redirect('upload-image');
    }

}
