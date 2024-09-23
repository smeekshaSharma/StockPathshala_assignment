<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    public function index()
    {
        $accessToken = Session::get('access_token');
        $classes = [];
        $response = Http::withToken($accessToken)->get('https://internal.stockpathshala.in/api/v1/live_classes');
        if ($response->successful()) {
            $classes = $response->json(); 
        }
        // print_r($response);
        // print_r($classes['data']['data']);
        // die();
        return view('classes.index', ['classes' => $classes['data']['data']]);
    }
}
