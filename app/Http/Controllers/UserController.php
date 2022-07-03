<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Branch;
use App\Recruiter;
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

        $branch = DB::table('users')
             ->join('recruiters','recruiters.user_id', '=', 'users.id')
             ->join('branches','recruiters.branch_id', '=', 'branches.id')
             ->where('users.id',$user->id)
             ->select('users.id as id', 'users.name as name','users.email as email', 'users.password as password',
                      'branches.location as location', 'recruiters.manager_id')->first();
           // dd($branch->manager_id);
     //  $result = Recruiter::with('childRecruiters')->get();

        $manager = DB::table('users')
             ->join('recruiters','recruiters.user_id', '=', 'users.id')
             ->join('branches','recruiters.branch_id', '=', 'branches.id')
             ->where('recruiters.id',$branch->manager_id)
             ->select('users.name as name','branches.location as location')
             ->get();//retrieve nama mgr

        return view('users.show', compact('user', 'branch', 'manager'));
        }
        
        else if (Auth::User()->role=="applicant"){

        $applicant = DB::table('users')
              ->join('applicants','applicants.user_id', '=', 'users.id')
              ->where('users.id',$user->id)
              ->select('users.id as id', 'users.name as name','users.email as email', 'users.password as password', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth', 'applicants.address as address', 'applicants.phone_number as phone_number')->get();

        return view('users.show', compact('user', 'applicant'));
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

        return view('users.edit',compact('branch', 'user', 'manager'));
       }

       else if (Auth::User()->role=="applicant"){

       $applicant = DB::table('users')
       ->join('applicants','applicants.user_id', '=', 'users.id')
       ->select('users.id as id', 'users.name as name','users.email as email', 'users.password as password', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth', 'applicants.address as address', 'applicants.phone_number as phone_number')
       ->where('users.id', '=', $user->id)->get();

       return view('users.edit',compact('user','applicant'));//tambah applicant
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
       // dd($request->branch_id);
       //dd($request->role);
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

        DB::table('recruiters')->where('user_id',$user)->delete();
        DB::table('users')->where('id',$user)->delete();

        }
        else if(Auth::User()->role == 'applicant'){

        DB::table('applicants')->where('user_id',$user)->delete();
        DB::table('users')->where('id',$user)->delete();

        }

        return redirect()->route('login')
        ->with('success');
    }

}
