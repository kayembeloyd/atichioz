<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\Organization;
use App\Models\Requirement;
use App\Http\Resources\Job as JobResource;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $organizations = Organization::all();

		return view('admin.jobcreate', compact('categories', 'organizations'));   
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
        $data = request()->validate([
			'job_title' => 'required',
			'job_description_little' => '',
            'job_description' => '',
            'job_organization' => '',
            'r1' => '',
            'r2' => '',
            'r3' => '',
            'r4' => '',
            'selected_categories' => ''
        ]);
        
        $tempJob = new Job();
		$tempJob->title = $data['job_title']; 
		$tempJob->description_little = $data['job_description_little']; 
		$tempJob->description = $data['job_description']; 

		if (Organization::where('name', $data['job_organization'])->first()){
			$tempJob->organization()->associate(Organization::where('name', $data['job_organization'])->first());
            $tempJob->save();
            
            foreach ($data['selected_categories'] as $selected_category) {
                Job::find($tempJob->id)->categories()->save(Category::where('name', $selected_category)->first());
            }


            if ($data['r1'] != '' ){
                $req = new Requirement();
                $req->description = $data['r1'];
                $req->save();
                Job::find($tempJob->id)->requirements()->save(Requirement::findOrFail($req->id));
            }

            if ($data['r2'] != '' ){
                $req = new Requirement();
                $req->description = $data['r2'];
                $req->save();
                Job::find($tempJob->id)->requirements()->save(Requirement::findOrFail($req->id));
            }
            
            if ($data['r3'] != '' ){
                $req = new Requirement();
                $req->description = $data['r3'];
                $req->save();
                Job::find($tempJob->id)->requirements()->save(Requirement::findOrFail($req->id));
            }

            if ($data['r4'] != '' ){
                $req = new Requirement();
                $req->description = $data['r4'];
                $req->save();
                Job::find($tempJob->id)->requirements()->save(Requirement::findOrFail($req->id));
            } 
        } 

		return redirect('/admin/job/create');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
