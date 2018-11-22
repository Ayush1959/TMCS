<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    public function about()
    {
        $title = "About Page";
        return view('pages.about', compact('title'));
    }
    public function services()
    {
        $title = "Service Page";
        return view('pages.services')->with('title', $title);
    }
    public function serve()
    {
        $data = array(
            'title' => "Serve Page",
            'serve' => ['web','programmin','SEO']
        );
        return view('pages.serve')->with($data);
    }
}
