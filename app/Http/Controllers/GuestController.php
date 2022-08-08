<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Vacancy;
use App\Application;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home');
    }

    public function contact()
    {

        return view('contact');
    }

    public function about()
    {

        return view('about');
    }

    public function vacancy()
    {
        $vacancies = DB::table('vacancies')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','branches.id', '=', 'recruiters.branch_id')
        ->select('vacancies.id as id',
        'vacancies.position as position','vacancies.status as status', 'vacancies.quantity as quantity', 
        'vacancies.date_close as date_close', 'branches.location as location')
        ->paginate(4);

        return view('vacancies.index', compact('vacancies') );
    }

    public function showvacancy(Vacancy $vacancy)
    { 
        $branches = DB::table('branches')
        ->join('recruiters','recruiters.branch_id', '=', 'branches.id')
        ->join('vacancies','vacancies.recruiter_id', '=', 'recruiters.id')
        ->select('branches.id as branch_id', 'branches.location as location', 'vacancies.id as id', 'vacancies.description as description',   'vacancies.requirement as requirement',  'vacancies.qualification as qualification',
         'vacancies.position as position', 'vacancies.status as status', 'vacancies.quantity as quantity', 'vacancies.date_close as date_close', 'vacancies.recruiter_id as recruiter_id')
        ->where('vacancies.id', '=', $vacancy->id)->get();

        return view('vacancies.show', compact('vacancy', 'branches') );
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
