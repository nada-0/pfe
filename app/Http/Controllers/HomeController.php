<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $categories = Category::all();
        $mainCategories = $categories->take(4);
        $moreCategories = $categories->slice(4);

        $users = User::all();

        $latestPosts = Post::with('user')->orderBy('created_at', 'desc')->take(3)->get();

        $topRatedUsers = User::orderBy('rating', 'desc')->take(3)->get();

        $popularPosts = Post::with('user')->orderBy('likes', 'desc')->take(3)->get();

        return view('home')->with(compact('mainCategories', 'moreCategories', 'users', 'latestPosts', 'topRatedUsers', 'popularPosts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Service::where('name', 'LIKE', '%' . $query . '%')->get();
        return response()->json($results);
    }
}
