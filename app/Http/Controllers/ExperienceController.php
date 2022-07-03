<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('applicants','applicants.user_id', '=', 'users.id')
            ->select('applicants.id as id')
            ->where('user_id', '=', Auth::User()->id)->first()->id;

        $experiences = DB::table('experiences')
            ->select('experiences.id as id',
            'experiences.job as job', 'experiences.company as company', 'experiences.applicant_id as applicant_id')
            ->where('applicant_id', '=', $users)->get();
        //dd('branches');

        return view('experiences.index', compact('experiences') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experiences.create');

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
        /*  'job'=>'required',
            'job_level'=>'required',
            'specialization'=>'required',
            'company'=>'required',
            'date_joined'=>'required',
            'working_year'=>'required',*/

        ]);

        $id = DB::table('applicants')
                ->select('id')
                ->where('user_id', '=', Auth::User()->id)->first()->id;

        DB::table('experiences')->insert([
            'job' => $request->job,
            'job_level'=> $request->job_level,
            'specialization'=> $request->specialization,
            'company'=> $request->company,
            'date_joined'=> $request->date_joined,
            'working_year'=> $request->working_year,
            'applicant_id'=> $id,     
         ]);

        return redirect()->route('experiences.index')
                         ->with('success','Experience created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        $applications = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','recruiters.branch_id', '=', 'branches.id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 'applications.id as id', 
                'applications.resume as resume','applications.date_apply as date_apply','branches.location as location' )
        ->where('applications.id', '=', Auth::User()->id)->get();

        return view('experiences.show', compact('experience', 'applications') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'job'=>'required',
            'job_level'=>'required',
            'specialization'=>'required',
            'company'=>'required',
            'date_joined'=>'required',
            'working_year'=>'required',

        ]);
        $experience->job_level = $request->input('job_level');
        $experience->specialization = $request->input('specialization');
        $experience->save();

        $experience->update($request->all());

        return redirect()->route('experiences.index')
        ->with('success','Experience updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('experiences.index')
        ->with('success','Experience deleted successfully');
    }
}
