<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function posts()
    {
        // $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();

        // $posts = Http::post('https://jsonplaceholder.typicode.com/posts',[
        //    'title'=> 'Yousef',
        //    'body'=> 'nice'
        // ]);
        // $posts = Http::withToken('nice one')->post('https://jsonplaceholder.typicode.com/posts',[
        //    'title'=> 'Yousef',
        //    'body'=> 'nice'
        // ]);
        return view('site.posts_api');
        // return view('site.posts_api',compact('posts'));

    // dd($posts);
        // dd($posts->body());
        // dd($posts->json());
    }
}
