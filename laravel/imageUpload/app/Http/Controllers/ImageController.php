<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\User;
use Illuminate\Http\Request;
// use Illuminate\Database\QueryException;

class ImageController extends Controller
{
    public function upload(ImageRequest $request)
    {
        // if ($request->hasFile('image')) {
        //     $imagename = $request->image->getClientOriginalName();
        //     $request->image->storeAs('public', $imagename);
        //     // return 'done1';
        // }
        // return 'done';
        $request->user()->avatar = $request->image;
        $request->user()->save();
        // return back();
        return response(null, 200);
    }


    public function saveImage(ImageRequest $request)
    {
        // return $request->all();
        if ($request->hasFile('image')) {
            $imagename = $request->image->getClientOriginalName();
            $request->image->storeAs('public', $imagename);
            $request->user()->update(['image' => $imagename]);
            return response(null, 202);
        }
    }
} 
