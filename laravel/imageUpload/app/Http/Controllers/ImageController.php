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






    public function postUploadProfilePic(Request $request)
    {
        $data = $request->input('img');
        // return $data;
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time() . '.png';
        // $imagename = $request->image->getClientOriginalName();
        $request->user()->update(['image' => $imageName]);
        $path = public_path('profile_pics/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . $imageName, $data);
        $imageUrl = url('profile_pics/' . $imageName);
        return response(['data' => $imageName], 201);
    }


    public function postUploadProfilePic11(Request $request)
    {
        $data = $request->input('img');
        // return $data;
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time() . '.png';
        $path = public_path('profile_pics/');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . $imageName, $data);
        $imageUrl = url('profile_pics/' . $imageName);
        // $user = User::with('profile')->find($request->user()->id);
        // $user->profile->removeCurrentProfilePic($user);
        // $user->profile->profile_pic = $imageUrl;
        // $user->profile->save();
        return response(['data' => $imageUrl], 201);
    }
    //
} 
