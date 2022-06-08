<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB,Auth,file;
use App\Vacancy;

class ApplicationController extends Controller
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
    

        $applications = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 
                  'applications.date_apply as date_apply', 'applications.id as id')
        ->where('vacancies.recruiter_id', '=', $users)->get();
                 
        
        //dd($applications);
        return view('applications.index', compact('applications') );
    }

    else if (Auth::User()->role == 'applicant'){
       
        $users = DB::table('users')
        ->join('applicants','applicants.user_id', '=', 'users.id')
        ->select('applicants.id as id')
        ->where('user_id', '=', Auth::User()->id)->first()->id;

        $applications = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 'applications.id as id',  'applications.applicant_id as applicant_id ')
        ->where('applicant_id', '=', $users)->get();

        //dd($applications);
        return view('applications.index', compact('applications') );

    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vacancy $vacancy)
    {
        $users = DB::table('users')
        ->join('applicants','applicants.user_id', '=', 'users.id')
        ->select('applicants.id as id')
        ->where('user_id', '=', Auth::User()->id)->first()->id;

        $education = DB::table('applicants')
        ->join('educations','educations.applicant_id', '=', 'applicants.id')
        ->select('educations.id as id', 'applicants.id as id', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth' , 'applicants.address as address', 'applicants.phone_number as phone_number' )
        //->where('users.id', '=', Auth::User()->id)->get();
        ->where('applicant_id', '=', $users)->get();
  
        if (is_null($applicant->gender) && is_null($applicant->date_of_birth) && is_null($applicant->address) && is_null($applicant->phone_number)) 

        return view('applications.apply');

        else 

        return view('applications.create' , compact('vacancy'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request->resume);
        $request->validate([
            'resume'=>'required',
            'date_apply'=>'required',

        ]);

        if($request->hasFile('resume')){
            $file = $request->file('resume');
            $filepath = $file->getClientOriginalName();
            $destination = public_path().'/file';
            $file->move($destination, $filepath);
        }
        
        $applicant = DB::table('applicants')
        ->join('users','users.id', '=', 'applicants.user_id')
        ->select('applicants.id as id')
        ->where('users.id', '=', Auth::User()->id)->first()->id;
        
        $vacancy = DB::table('vacancies')
        ->select('id')
        ->where('id', '=', $request->vacancy_id)->first()->id;

        DB::table('applications')->insert([
            'id' => $request->id,
            'resume'=> $filepath,
            'date_apply'=> $request->date_apply,
            'app_status'=> 'Pending',
            'applicant_id'=> $applicant,       
            'vacancy_id'=> $vacancy,       
         ]);


                return redirect()->route('applications.index')
                ->with('success','Application created successfully.');
          
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($application)
    {  

    if (Auth::User()->role == 'recruiter'){
      
        $applications = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->join('applicants','applications.applicant_id', '=', 'applicants.id')
        ->join('users', 'users.id', '=', 'applicants.user_id')
        ->join('educations','educations.applicant_id', '=', 'applicants.id')
        ->join('experiences','experiences.applicant_id', '=', 'applicants.id')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','recruiters.branch_id', '=', 'branches.id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 'applications.id as id', 
                'applications.resume as resume', 'users.name as name' , 'users.email as email', 'applications.date_apply as date_apply','branches.location as location', 'applicants.gender as gender',
                'applicants.date_of_birth as date_of_birth', 'applicants.phone_number as phone_number', 'applicants.address as address',
                'educations.level as level',
                'educations.certificate as certificate', 'educations.institution as institution', 'educations.grad_date as grad_date', 
                'educations.grade as grade','educations.field_study as field_study',
                'experiences.job as job', 'experiences.job_level as job_level',
                'experiences.specialization as specialization', 'experiences.company as company', 'experiences.date_joined as date_joined', 
                'experiences.working_year as working_year','experiences.detail as detail')
        ->where('applications.id', '=', $application)->get();

       }
       else if (Auth::User()->role == 'applicant'){


        $applications = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','recruiters.branch_id', '=', 'branches.id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 'applications.id as id', 
                'applications.resume as resume','applications.date_apply as date_apply','branches.location as location' )
        ->where('applications.id', '=', $application)->get();
       }

      // if (is_null($experience->job) && is_null($experiences->job_level)  && is_null($experiences->grad_date)
      // && is_null($experiences->company) && is_null($experiences->date_joined) && is_null($experiences->working_year)
     //  && is_null($experiences->detail)){
        

        return view('applications.show', compact('applications') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        return view('applications.edit', compact('application') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    { //dd($application);
        $request->validate([
            'app_status'=>'required',

        ]);

        $application_user = DB::table('recruiters')
        ->select('id')
        ->where('user_id', '=', Auth::User()->id)->first()->id;

        //dd($application);
        
     
        DB::table('applications')
        ->where('id',$application)->update([
            'app_status' => $request->app_status,
        ]);

        return redirect()->route('applications.index')
        ->with('toast_success','Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('applications.index')
        ->with('toast_success','Application deleted successfully');
    }

    public function view($id){
        
        $education = DB::table('applicants')
        ->join('educations','educations.applicant_id', '=', 'applicants.id')
        ->join('users','users.id', '=', 'applicants.user_id')
        ->select('educations.id as id', 'applicants.id as id', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth' , 'applicants.address as address', 'applicants.phone_number as phone_number')
        ->where('users.id', '=', Auth::User()->id)->get();

        $vacancy = DB::table('vacancies')
        ->select('id')
        ->where('id', '=', $id)->get();
  
        if ($education->isEmpty()) 

        return view('applications.apply');

        else 

        return view('applications.create' , compact('vacancy'));

        /*
        $applicant = DB::table('users')
        ->join('applicants','applicants.user_id', '=', 'users.id')
        ->select('applicants.id as id', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth' , 'applicants.address as address', 'applicants.phone_number as phone_number')
        ->where('user_id', '=', Auth::User()->id)->first()->id;

        $education = DB::table('applicants')
        ->join('educations','educations.applicant_id', '=', 'applicants.id')
        ->join('users','users.id', '=', 'applicants.user_id')
        ->select('educations.id as id')
        //->where('users.id', '=', Auth::User()->id)->get();
        ->where('applicant_id', '=', $applicant)->get();


        $vacancy = DB::table('vacancies')
        ->select('id')
        ->where('id', '=', $id)->get();

        if ($education->isEmpty() && is_null($applicant->gender)) //&& is_null($applicant->date_of_birth) && is_null($applicant->address) && is_null($applicant->phone_number))

        return view('applications.apply');

        else 

        return view('applications.create' , compact('vacancy', 'applicant'));
        */


    }
}
