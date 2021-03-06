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

    public function related($id){
        $jobs = Job::paginate(5);
        
        foreach ($jobs as $job) {
            $job['organization_name'] = $job->organization->name;
            $job['posted_at'] =  $job['created_at']->diffForHumans(null, true, true, 2);
            unset($job['description']);
            unset($job['description_little']);
            unset($job['organization_id']);
            unset($job['organization']);
            unset($job['created_at']);
            unset($job['updated_at']);
        }

        return JobResource::collection($jobs);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->paginate(13);

        foreach ($jobs as $job) {
            $job['organization_name'] = $job->organization->name;
            $job['posted_at'] =  $job['created_at']->diffForHumans(null, true, true, 2);
            unset($job['description']);
            unset($job['organization_id']);
            unset($job['organization']);
            unset($job['created_at']);
            unset($job['updated_at']);
        }

        return JobResource::collection($jobs);
        //
    }

    // Note this $category comes as a category name 
    public function jobsInCategoriesIndex($category)
    { 
        $jobs = Category::where('name', $category)
                    ->firstOrFail()
                    ->jobs()
                    ->orderBy('created_at', 'DESC')
                    ->paginate(13);
        
        foreach ($jobs as $job) {
            $job['organization_name'] = $job->organization->name;
            $job['posted_at'] =  $job['created_at']->diffForHumans(null, true, true, 2);
            unset($job['description']);
            unset($job['organization_id']);
            unset($job['organization']);
            unset($job['created_at']);
            unset($job['updated_at']);
        }

        return JobResource::collection($jobs);
    }

    // Note this $organization comes as an organization name 
    public function jobsInOrganizationIndex($organization){
        $jobs = Organization::where('name', $organization)
                    ->firstOrFail()
                    ->jobs()
                    ->orderBy('created_at', 'DESC')
                    ->paginate(13);
        
        foreach ($jobs as $job) {
            $job['organization_name'] = $job->organization->name;
            $job['posted_at'] =  $job['created_at']->diffForHumans(null, true, true, 2);
            unset($job['description']);
            unset($job['organization_id']);
            unset($job['organization']);
            unset($job['created_at']);
            unset($job['updated_at']);
        }

        return JobResource::collection($jobs);
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
        $job = Job::findOrFail($id);
        $job['posted_at'] =  $job['created_at']->diffForHumans(null, true, true, 2);
        $job['organization_name'] = $job->organization->name;
        $job['organization_description'] = $job->organization->description;
        $job['requirements'] = $job->requirements;
        unset($job['organization']);
        unset($job['created_at']);
        unset($job['updated_at']);
        
        return new JobResource($job);
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
