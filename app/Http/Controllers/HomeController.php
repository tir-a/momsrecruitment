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

         $interviews = DB::table('vacancies')
         ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
         ->join('interviews','interviews.application_id', '=', 'applications.id')
         ->join('recruiters','applications.recruiter_id', '=', 'recruiters.id')
         ->join('users', 'users.id', '=', 'recruiters.user_id')
         ->select('vacancies.position as position', 'applications.app_status as app_status', 
                   'applications.date_apply as date_apply', 'applications.id as id', 'interviews.id as ivid')
         ->where('user_id', '=', Auth::User()->id)->count();

        return view('home', compact('applications', 'vacancies', 'interviews'));
    }

    public function contact()
    {

        return view('contact');
    }

    public function about()
    {

        return view('about');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search_text = $request->get('query');
        $search = $request->get('place');

        // Search in the title and body columns from the posts table

            $vacancies = DB::table('vacancies')
           ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
           ->join('branches','branches.id', '=', 'recruiters.branch_id')
           ->where('position', 'LIKE', '%'.$search_text.'%')
            ->select('vacancies.id as id',
             'vacancies.position as position','vacancies.status as status', 'vacancies.quantity as quantity', 
             'vacancies.date_close as date_close', 'branches.location as location')->get();
             $vac = DB::table('vacancies')
           ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
           ->join('branches','branches.id', '=', 'recruiters.branch_id')
           ->where('location', 'LIKE', '%'.$search.'%')
            ->select('vacancies.id as id',
             'vacancies.position as position','vacancies.status as status', 'vacancies.quantity as quantity', 
             'vacancies.date_close as date_close', 'branches.location as location')->get();
    
        // Return the search view with the resluts compacted
        return view('vacancies.index', ['vacancies'=> $vacancies, 'vacancy'=> $vac]);
    }
}
