<?php

namespace App\Http\Controllers;

use App\Application;
use App\Applicant;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB,Auth,file;
use App\Vacancy;
use App\Notifications\SMSNotification;
use Notification;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatus;

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
        }
        return view('applications.index', compact('applications') );

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
        ->select('educations.id as id', 'applicants.id as id', 'applicants.gender as gender', 
        'applicants.date_of_birth as date_of_birth' , 'applicants.address as address', 'applicants.phone_number as phone_number' )
        ->where('users.id', '=', Auth::User()->id)->get();

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
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','recruiters.branch_id', '=', 'branches.id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 'applications.id as id', 
                'applications.resume as resume', 'users.name as name' , 'users.email as email', 'applications.date_apply as date_apply','branches.location as location', 'applicants.gender as gender',
                'applicants.date_of_birth as date_of_birth', 'applicants.phone_number as phone_number', 'applicants.address as address')
        ->where('applications.id', '=', $application)->get();

        $applicants = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->join('applicants','applications.applicant_id', '=', 'applicants.id')
        ->join('users', 'users.id', '=', 'applicants.user_id')
        ->join('educations','educations.applicant_id', '=', 'applicants.id')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','recruiters.branch_id', '=', 'branches.id')
        ->select('applications.id as id', 'educations.level as level', 'educations.certificate as certificate', 'educations.institution as institution', 'educations.grad_date as grad_date', 
                'educations.grade as grade','educations.field_study as field_study')
        ->where('applications.id', '=', $application)->get();
        
        $experiences = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->join('applicants','applications.applicant_id', '=', 'applicants.id')
        ->join('users', 'users.id', '=', 'applicants.user_id')
        ->join('experiences','experiences.applicant_id', '=', 'applicants.id')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','recruiters.branch_id', '=', 'branches.id')
        ->select('experiences.job as job', 'experiences.job_level as job_level',
                'experiences.specialization as specialization', 'experiences.company as company', 'experiences.date_joined as date_joined', 
                'experiences.working_year as working_year','experiences.detail as detail')
        ->where('applications.id', '=', $application)->get();
        
        return view('applications.show', compact('applications', 'applicants', 'experiences') );
       }

       else if (Auth::User()->role == 'applicant'){

        $applications = DB::table('vacancies')
        ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','recruiters.branch_id', '=', 'branches.id')
        ->select('vacancies.position as position', 'applications.app_status as app_status', 'applications.id as id', 
                'applications.resume as resume','applications.date_apply as date_apply','branches.location as location' )
        ->where('applications.id', '=', $application)->get();

        return view('applications.show', compact('applications') );
       }
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
    { 
       // dd($request->application);

        $request->validate([
            'app_status'=>'required',

        ]);

        $id = DB::table('recruiters')
        ->select('id')
        ->where('user_id', '=', Auth::User()->id)->first()->id;

        DB::table('applications')
        ->where('id',$application->id)->update([
            'app_status' => $request->app_status,
            'recruiter_id' => $id,

        ]);

        $user = DB::table('users')
        ->join('applicants','applicants.user_id', '=', 'users.id')
        ->select('users.id as uid','users.name as name','users.email as email', 'applicants.id as id', 'applicants.phone_number as phone_number')
        ->where('applicants.id',$application->applicant_id)
        ->first();

        Mail::to($user->email)->send(new ApplicationStatus($application));

        return redirect()->route('applications.index')
        ->with('toast_success','Application status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        try {
            $application->delete();

            return redirect()->route('applications.index')
              ->with('toast_success','Application deleted successfully');

          } catch (\Illuminate\Database\QueryException $e) {
          
              return redirect()->route('applications.index')
              ->with('toast_warning','Application cannot be deleted as there is an interview belongs to it');
          }
    }

    public function view($id){
        
        $education = DB::table('applicants')
        ->join('educations','educations.applicant_id', '=', 'applicants.id')
        ->join('users','users.id', '=', 'applicants.user_id')
        ->select('educations.id as id', 'applicants.id as id', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth' , 'applicants.address as address', 'applicants.phone_number as phone_number')
        ->where('users.id', '=', Auth::User()->id)->get();

        $us =  DB::table('users')
          ->join('applicants','users.id', '=', 'applicants.user_id')
          ->select('applicants.id as id', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth' , 'applicants.address as address', 'applicants.phone_number as phone_number')
          ->where('users.id', '=', Auth::User()->id)->first();//get?

        $applicant = DB::table('users')
          ->join('applicants','applicants.user_id', '=', 'users.id')
          ->select('users.id as id', 'users.name as name','users.email as email', 'users.password as password', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth', 'applicants.address as address', 'applicants.phone_number as phone_number')
          ->where('users.id', '=', Auth::User()->id)->get();

        $vacancy = DB::table('vacancies')
        ->select('id')
        ->where('id', '=', $id)->get();

        if ($education->isEmpty() || is_null($us->gender) || is_null($us->date_of_birth) ||  is_null($us->address) ||  is_null($us->phone_number))

        return view('applications.apply' , compact('us', 'applicant'));

        else 

        return view('applications.create' , compact('vacancy'));

        
    }
/*
    public function send($application )
    {//dd($application);
        $user = DB::table('users')
        ->join('applicants','applicants.user_id', '=', 'users.id')
        ->select('users.id as uid','users.name as name','users.email as email', 'applicants.id as id', 'applicants.phone_number as phone_number')
        ->where('applicants.id',$application->applicant_id)
        ->first();
    	//$user = User::first();

       // dd($user);

    //   $std = new \stdClass();
  //  $std->phone_number;
   //$std->project = $project;

     //   $project = [
       //     'greeting' => 'Hi '.$user->name.',',
         //   'body' => 'Your status of job application has been updated. Login to Moms Recruitment to view it.',
        //];

      //dd($user);
       //dd($project);

   // Notification::send($user, new SMSNotification($project));
   //   Notification::route('nexmo', $project)->notify(new SMSNotification($project));

   // dd( Notification::route('nexmo', $project)->notify(new SMSNotification($project)));
       //  dd('Notification sent!');
      //   return back()->with('status', 'A text message has been sent!');;
     
 // Notification::send($user, new EmailNotification($project));
//  $user->notify(new EmailNotification($project));

//$application['email'] = $request->get('email');

    //Mail::to($application['email'])->send(new ApplicationStatus($application));\

    Mail::to($input['email'])->send(new ApplicationStatus($application));


    dd('Notification sent!');
    }

    */
}
