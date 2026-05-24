<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Event;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Event::with('category')->latest()->take(3)->get();
        $partners = Partner::all();
        return view('welcome', compact('categories', 'events', 'partners'));
    }
}
