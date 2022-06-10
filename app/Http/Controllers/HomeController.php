<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use App\Application;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vacancies = Vacancy::count();
        $applications = Application::count();

        return view('home', compact('applications', 'vacancies'));
    }

    public function contact()
    {

        return view('contact');
    }

    public function about()
    {

        return view('about');
    }

    public function count($id)
    {
      $showCounts = Application::where('id',$id)->count();
      return view('home',['showCounts'=>$showCounts,'id'=>$id]);
    }
}
