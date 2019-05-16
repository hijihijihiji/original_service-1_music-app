<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;

use App\User;

use Storage;

class ImagesController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('image');
       // /tmpに入る
        $path = Storage::disk('s3')->putFile('music-app-image', $file, 'public');
        //第一引数はバケットのディレクトリ
        //s3のバケットへアップロード！

        //$url = Storage::disk('s3')->url();
        
        $request->user()->images()->create([
            'image' => $path,
        ]);
        //イメージからむに追加
        //authuserでidとって格納する
        $id = $request->user()->id;
        
        return redirect()->route('users.show', $id);    
    }
        
}
