<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Branch;
use App\Recruiter;
use App\Application;
use App\Education;
use App\Experience;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function show(User $user)
    {
        if (Auth::User()->role == 'recruiter'){ 

            $recruiter = Recruiter::where('user_id',$user->id)->first(); 
            $branch = Branch::where('id',$recruiter->branch_id)->first();
            if (!empty($recruiter->manager)){
            $manager= User::where('id',$recruiter->manager->user_id)->first();
            }
            else{
                $manager=null;
            }
            return view('users.show', compact('user', 'branch', 'manager'));     
        }    

        else if (Auth::User()->role == 'applicant'){ 
                  
                   $applicant = DB::table('users')
                    ->join('applicants','applicants.user_id', '=', 'users.id')
                    ->where('user,s.id',$user->id)
                    ->select('users.id as id', 'users.name as name','users.email as email', 'users.password as password', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth', 'applicants.address as address', 'applicants.phone_number as phone_number')->get();
   
                    $users = DB::table('users')
                    ->join('applicants','applicants.user_id', '=', 'users.id')
                    ->select('applicants.id as id')
                    ->where('user_id', '=', Auth::User()->id)->first()->id;
            
                    $applications = DB::table('vacancies')
                    ->join('applications','applications.vacancy_id', '=', 'vacancies.id')
                    ->select('vacancies.position as position', 'applications.app_status as app_status', 'applications.id as id',  'applications.applicant_id as applicant_id ')
                    ->where('applicant_id', '=', $users)->get();

                    $educations = DB::table('educations')
                    ->select('educations.id as id',
                    'educations.certificate as certificate', 'educations.institution as institution', 'educations.applicant_id as applicant_id')
                    ->where('applicant_id', '=', $users)->get();

                    $experiences = DB::table('experiences')
                    ->select('experiences.id as id',
                    'experiences.job as job', 'experiences.company as company', 'experiences.applicant_id as applicant_id')
                    ->where('applicant_id', '=', $users)->get();
            

                return view('users.show', compact('user', 'applicant', 'applications', 'educations', 'experiences'));
        }
    }

    public function edit(User $user)
    {
        if (Auth::User()->role == 'recruiter'){

       $branch=DB::select('select * from branches');
       $manager = DB::table('recruiters')
                    ->join('users','recruiters.user_id', '=', 'users.id')
                    ->join('branches','recruiters.branch_id', '=', 'branches.id')
                    ->select('users.id as id', 'users.name as name','users.email as email', 'users.password as password','recruiters.id as id', 'users.name as name', 'branches.location as location')
                    ->where('users.id', '<>', $user->id)->get();
// dump($user->recruiter);
// dump($branch);dd($manager);
        return view('users.edit',compact('branch', 'user', 'manager'));
       }

       else if (Auth::User()->role=="applicant"){

       $applicant = DB::table('users')
       ->join('applicants','applicants.user_id', '=', 'users.id')
       ->select('users.id as id', 'users.name as name','users.email as email', 'users.password as password', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth', 'applicants.address as address', 'applicants.phone_number as phone_number')
       ->where('users.id', '=', $user->id)->get();

       return view('users.edit',compact('user','applicant'));
       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {  //dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);

        if (Auth::User()->role == 'recruiter'){

      //  $user->update($request->all());

        $manager_id = DB::table('recruiters')
        //->select('id')
        ->where('id', '=', $request->manager_id)->first();
       // dd($manager_id);

            DB::table('users')
            ->where('id',$user->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            
            if (!empty($manager_id)) { 
                
                $manager = $manager_id->id;
            } 
                
                else { 
                    
                    $manager = null;
                }

            DB::table('recruiters')
            ->where('user_id',$user->id)
                ->update([
                    'branch_id' => $request->branch_id,
                    'manager_id' => $manager,
                ]);
      
        }

        else if (Auth::User()->role=="applicant"){

            //$user->update($request->all());
            DB::table('users')
                ->where('id',$user->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

            DB::table('applicants')
                ->where('user_id',$user->id)
                ->update([
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                ]);
        }  
        return redirect('users/'.$user->id.'');
    }

    public function destroy($user){

        if (Auth::User()->role == 'recruiter'){

            try {
                DB::table('recruiters')->where('user_id',$user)->delete();
                DB::table('users')->where('id',$user)->delete();

              } catch (\Illuminate\Database\QueryException $e) {
              
                  return redirect()->route('users.show', $user)
                  ->with('toast_warning','Account cannot be deleted as there is job application belongs to it.');
              }
        }

        else if(Auth::User()->role == 'applicant'){

            DB::table('applicants')->where('user_id',$user)->delete();
            DB::table('users')->where('id',$user)->delete();
    
        }
        return redirect()->route('login')
        ->with('success');
    }

}
