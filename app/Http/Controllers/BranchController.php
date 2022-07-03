<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        //dd('branches');

        return view('branches.index', compact('branches') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branches.create');
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
            'location'=>'required',
            'b_address'=>'required',
            'contact'=>'required',

        ]);
         //  DB::table('branches')->insert([
        //    'location'=>$request->location,
        //])

        Branch::create($request->all());
        
        return redirect()->route('branches.index')
                         ->with('toast_success','Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {

        return view('branches.edit', compact('branch') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'location'=>'required',
            'b_address'=>'required',
            'contact'=>'required',

        ]);
        $branch->update($request->all());

        return redirect()->route('branches.index')
        ->with('toast_success','Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
        ->with('toast_success','Branch deleted successfully');
    }
}
