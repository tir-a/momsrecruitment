<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::all();
        $users = DB::table('users')
             ->join('applicants','applicants.user_id', '=', 'users.id')
             ->select('users.id as id', 'users.name as name')->get();
             
        return view('applicants.index', compact('applicants', 'users') );
        
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
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return view('applicants.show', compact('applicant') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        $users = DB::table('users')
        ->join('applicants','applicants.user_id', '=', 'users.id')
        ->select('users.id as id', 'users.name as name','users.email as email', 'users.password as password', 'applicants.gender as gender', 'applicants.date_of_birth as date_of_birth', 'applicants.address as address', 'applicants.phone_number as phone_number')->get()
        ->where('users.id', '<>', $user->id)->get();
        return view('users.edit',compact( 'user'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
