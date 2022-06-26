<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
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

        $educations = DB::table('educations')
            ->select('educations.id as id',
            'educations.certificate as certificate', 'educations.institution as institution', 'educations.applicant_id as applicant_id')
            ->where('applicant_id', '=', $users)->get();
        //dd('branches');

        return view('educations.index', compact('educations') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $education = DB::table('applicants')
           ->join('educations','educations.applicant_id', '=', 'applicants.id')
           ->join('users','users.id', '=', 'applicants.user_id')
           ->select('educations.id as id')
           ->where('users.id', '=', Auth::User()->id)->get();

        return view('educations.create',  compact('education'));

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
            'level'=>'required',
            'certificate'=>'required',
            'institution'=>'required',
            'grad_date'=>'required',
            'grade'=>'required',
            'field_study'=>'required',

        ]);

        $id = DB::table('applicants')
                    ->select('id')
                    ->where('user_id', '=', Auth::User()->id)->first()->id;

        DB::table('educations')->insert([
            'level' => $request->level,
            'certificate'=> $request->certificate,
            'institution'=> $request->institution,
            'grad_date'=> $request->grad_date,
            'grade'=> $request->grade,
            'field_study'=> $request->field_study,
            'applicant_id'=> $id,
        ]);
        
        return redirect()->route('educations.index')
                         ->with('success','Education created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        $applications = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','recruiters.branch_id', '=', 'branches.id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 'applications.id as id', 
                'applications.resume as resume','applications.date_apply as date_apply','branches.location as location' )
        ->where('applications.id', '=', Auth::User()->id)->get();

        return view('educations.show', compact('education','applications') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('educations.edit', compact('education') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'level'=>'required',
            'certificate'=>'required',
            'institution'=>'required',
            'grad_date'=>'required',
            'grade'=>'required',
            'field_study'=>'required',

        ]);
        $education->field_study = $request->input('field_study');
        $education->level = $request->input('level');
        $education->save();

        $education->update($request->all());

        return redirect()->route('educations.index')
        ->with('success','Education updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('educations.index')
        ->with('success','Education deleted successfully');
    }
}
