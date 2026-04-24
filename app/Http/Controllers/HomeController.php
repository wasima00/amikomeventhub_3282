<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::with('category')->latest()->take(3)->get();
        return view('welcome', compact('categories', 'events'));
    }
}
