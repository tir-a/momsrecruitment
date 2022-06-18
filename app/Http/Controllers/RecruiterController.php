<?php

namespace App\Http\Controllers;

use App\Recruiter;
use Illuminate\Http\Request;
use App\User;
use App\Branch;
use DB;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruiters = Recruiter::all();
        $users = DB::table('users')
             ->join('recruiters','recruiters.user_id', '=', 'users.id')
             ->join('branches', 'recruiters.branch_id', '=', 'branches.id')
             ->select('users.id as id', 'users.name as name','branches.id as branch_id', 'branches.location as location')
             ->where('users.role','=', 'recruiter')->get();

        return view('recruiters.index', compact('recruiters', 'users') );
        
    }

    public function show(Recruiter $recruiter)
    {
        return view('recruiters.show', compact('recruiter') );
    }

    public function edit(Recruiter $recruiter)
    {
        
       $branch=DB::select('select * from branches');
       $manager = DB::table('recruiters')
                    ->join('users','recruiters.user_id', '=', 'users.id')
                    ->select('users.id as id', 'users.name as name')
                    ->where('users.id', '<>', $user->id)->get();
       return view('users.edit',compact('branch', 'user', 'manager'));
    
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recruiter $recruiter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recruiter  $recruiter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruiter $recruiter)
    {
        //
    }
}
