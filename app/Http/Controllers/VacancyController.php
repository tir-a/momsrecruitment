<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vacancies = Vacancy::all();
        //dd('branches');
        $vacancies = DB::table('vacancies')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','branches.id', '=', 'recruiters.branch_id')
         ->select('vacancies.id as id',
          'vacancies.position as position','vacancies.status as status', 'vacancies.quantity as quantity', 
          'vacancies.date_close as date_close', 'branches.location as location')->get();

    
        if (Auth::User()->role == 'applicant'){

        $vacancies = DB::table('vacancies')
           ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
           ->join('branches','branches.id', '=', 'recruiters.branch_id')
            ->select('vacancies.id as id',
             'vacancies.position as position','vacancies.status as status', 'vacancies.quantity as quantity', 
             'vacancies.date_close as date_close', 'branches.location as location')->get();

        return view('vacancies.index', compact('vacancies') );

        }

        else if (Auth::User()->role == 'recruiter'){

        $users = DB::table('users')
            ->join('recruiters','recruiters.user_id', '=', 'users.id')
            ->select('recruiters.id as id')
            ->where('user_id', '=', Auth::User()->id)->first()->id;
    
        $branches = DB::table('vacancies')
            ->select('vacancies.id as id',
             'vacancies.position as position', 'vacancies.status as status', 'vacancies.quantity as quantity', 
             'vacancies.date_close as date_close', 'vacancies.recruiter_id as recruiter_id')
            ->where('recruiter_id', '=', $users)->get();


        return view('vacancies.index', compact('branches') );
        }

        return view('vacancies.index', compact('vacancies') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancies.create');

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
            'position'=>'required',
            'description'=>'required',
            'requirement'=>'required',
            'qualification'=>'required',
            'status'=>'required',
            'quantity'=>'required',
            'date_close'=>'required',

        ]);

        $id = DB::table('recruiters')
                ->select('id')
                ->where('user_id', '=', Auth::User()->id)->first()->id;

                DB::table('vacancies')->insert([
                    'position' => $request->position,
                    'description'=> $request->description,
                    'requirement'=> $request->requirement,
                    'qualification'=> $request->qualification,
                    'status'=> $request->status,
                    'quantity'=> $request->quantity,
                    'date_close'=> $request->date_close,
                    'recruiter_id'=> $id,
                ]);
        
        return redirect()->route('vacancies.index')
                         ->with('toast_success','Vacancy created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    { 
        $branches = DB::table('branches')
        ->join('recruiters','recruiters.branch_id', '=', 'branches.id')
        ->join('vacancies','vacancies.recruiter_id', '=', 'recruiters.id')
        ->select('branches.id as branch_id', 'branches.location as location', 'vacancies.id as id', 'vacancies.description as description',   'vacancies.requirement as requirement',  'vacancies.qualification as qualification',
         'vacancies.position as position', 'vacancies.status as status', 'vacancies.quantity as quantity', 'vacancies.date_close as date_close', 'vacancies.recruiter_id as recruiter_id')
        ->where('vacancies.id', '=', $vacancy->id)->get();

        return view('vacancies.show', compact('vacancy', 'branches') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit', compact('vacancy') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            'position'=>'required',
            'description'=>'required',
            'requirement'=>'required',
            'qualification'=>'required',
            'status'=>'required',
            'quantity'=>'required',
            'date_close'=>'required',
        ]);

        $vacancy->update($request->all());

        return redirect()->route('vacancies.index')
        ->with('toast_success','Vacancy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
         $vacancy->delete();

        return redirect()->route('vacancies.index')
        ->with('toast_success','Vacancy deleted successfully');
    }

    public function guest ()
    {
        $vacancies = DB::table('vacancies')
        ->join('recruiters','vacancies.recruiter_id', '=', 'recruiters.id')
        ->join('branches','branches.id', '=', 'recruiters.branch_id')
         ->select('vacancies.id as id',
          'vacancies.position as position','vacancies.status as status', 'vacancies.quantity as quantity', 
          'vacancies.date_close as date_close', 'branches.location as location')->get();
          
     return view('vacancies.index', compact('vacancies') );

    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $vacancies = Vacancy::query()
            ->where('position', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('search', compact('vacancies'));
    }
}
