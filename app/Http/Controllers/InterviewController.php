<?php

namespace App\Http\Controllers;

use App\Interview;
use Illuminate\Http\Request;
use DB, Auth;
use App\Vacancy;
use App\Application;


class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::User()->role == 'recruiter'){

        $users = DB::table('users')
        ->join('recruiters','recruiters.user_id', '=', 'users.id')
        ->select('recruiters.id as id')
        ->where('user_id', '=', Auth::User()->id)->first()->id;

        $interviews = DB::table('interviews')
        ->join('applications','interviews.application_id', '=', 'applications.id')
        ->join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
        ->select('vacancies.position as position', 'interviews.date as date', 'interviews.time as time','interviews.id as id',  
        'interviews.confirmation as confirmation', 'applications.id as app_id', 'vacancies.id as id')
        ->where('vacancies.recruiter_id', '=', $users)->get();

        //dd('branches');
        return view('interviews.index', compact('interviews') );
        }

        else if (Auth::User()->role == 'applicant'){
            $users = DB::table('users')
            ->join('applicants','applicants.user_id', '=', 'users.id')
            ->select('applicants.id as id')
            ->where('user_id', '=', Auth::User()->id)->first()->id;

        $interviews = DB::table('interviews')
        ->join('applications','interviews.application_id', '=', 'applications.id')
        ->join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
        ->select('vacancies.position as position', 'interviews.date as date', 'interviews.time as time','interviews.id as id',  
        'interviews.confirmation as confirmation', 'applications.id as app_id', 'vacancies.id as id')
        ->where('applicant_id', '=', $users)->get();

        //dd('branches');
        return view('interviews.index', compact('interviews') );

      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $application=DB::select('select * from applications');
        return view('interviews.create', compact('application'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'time'=>'required',

        ]);

                DB::table('interviews')->insert([
                    'date' => $request->date,
                    'time'=> $request->time,
                    'application_id'=> $request->application_id,
                ]);
        
        return redirect()->route('interviews.index')
                         ->with('toast_success','Interview created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show($interview)
    {
        if (Auth::User()->role == 'recruiter'){

        $interviews = DB::table('interviews')
        ->join('applications','interviews.application_id', '=', 'applications.id')
        ->join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
        ->select('vacancies.position as position', 'interviews.date as date', 'interviews.time as time', 'interviews.confirmation as confirmation', 'interviews.id as id', 'applications.id as app_id')
        ->where('vacancies.id', '=', $interview)->get();

        }
        else if (Auth::User()->role == 'applicant'){


        $interviews = DB::table('interviews')
        ->join('applications','interviews.application_id', '=', 'applications.id')
        ->join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
        ->select('vacancies.position as position', 'interviews.date as date', 'interviews.time as time', 'interviews.confirmation as confirmation', 'interviews.id as id', 'applications.id as app_id')
        ->where('vacancies.id', '=', $interview)->get();

        }
        //dd( $request->interviews);

        return view('interviews.show', compact('interviews') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function edit($interview)
    {
        //dd($request->interviews);
        //dd(Interview::get());
        // $interview = Interview::findOrFail($id);
        if (Auth::User()->role == 'recruiter'){

           $interview = DB::table('interviews')
           ->join('applications','interviews.application_id', '=', 'applications.id')
           ->join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
           ->select('vacancies.position as position', 'interviews.date as date', 'interviews.time as time', 'interviews.confirmation as confirmation', 'interviews.id as id', 'applications.id as app_id')
           ->where('vacancies.id', '=', $interview)->first();
        }
        else if (Auth::User()->role == 'applicant'){
            $interview = DB::table('interviews')
            ->join('applications','interviews.application_id', '=', 'applications.id')
            ->join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
            ->select('vacancies.position as position', 'interviews.date as date', 'interviews.time as time', 'interviews.confirmation as confirmation', 'interviews.id as id')
            ->where('vacancies.id', '=', $interview)->get();
                    //dd(Interview::get());

        }
            return view('interviews.edit', compact('interview'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interview $interview)
    {
        if (Auth::User()->role == 'recruiter'){
            
        $interview->update($request->all());

        $request->validate([
            'date'=>'required',
            'time'=>'required',

        ]);

       DB::table('interviews')
        ->where('id',$interview)->update([
            'date' => $request->date,
            'time' => $request->time,

        ]);

    }
    else if (Auth::User()->role == 'applicant'){

        $interview->update($request->all());

        $request->validate([
            'confirmation'=>'required',
        
        ]);
        DB::table('interviews')
        ->where('id',$interview->id)->update([
            'confirmation' => $request->confirmation,

        ]);

    }
        return redirect()->route('interviews.index')
        ->with('toast_success','Interview updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interview $interview)
    {
        $interview->delete();

        return redirect()->route('interviews.index')
        ->with('toast_success','Interview deleted successfully');
    }
    
}
