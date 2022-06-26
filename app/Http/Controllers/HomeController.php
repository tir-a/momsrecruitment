<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use App\Application;
use App\Http\Controllers\Controller;
use DB, Auth;

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
        $applications = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->join('recruiters','applications.recruiter_id', '=', 'recruiters.id')
        ->join('users', 'users.id', '=', 'recruiters.user_id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 
                  'applications.date_apply as date_apply', 'applications.id as id')
        ->where('user_id', '=', Auth::User()->id)->count();

        $vacancies = DB::table('vacancies')        
        ->join('recruiters','recruiters.id', '=', 'vacancies.recruiter_id')
        ->join('users', 'users.id', '=', 'recruiters.user_id')
        ->select('vacancies.id as id',
         'vacancies.position as position', 'vacancies.status as status', 'vacancies.quantity as quantity', 
         'vacancies.date_close as date_close', 'vacancies.recruiter_id as recruiter_id')
         ->where('user_id', '=', Auth::User()->id)->count();

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
}
