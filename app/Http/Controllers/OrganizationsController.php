<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Category;
use App\Http\Resources\Organization as OrganizationResource;


class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::paginate(15);

        foreach ($organizations as $organization) {
            $organization['number_of_jobs'] = $organization->jobs()->count();
            unset($organization['description']);
            unset($organization['created_at']);
            unset($organization['updated_at']);
            unset($organization['logo']);
        }

        return OrganizationResource::collection($organizations);
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

		return view('admin.organizationcreate', compact('categories'));
        //
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
			'organization_name' => 'required',
			'organization_description' => '',
			'selected_categories' => ''
		]);

		$tempOrganization = new Organization();

		$tempOrganization->name = $data['organization_name'];
        $tempOrganization->description = $data['organization_description'];
		$tempOrganization->save();
        $selectedCats = $data['selected_categories'];

        foreach ($selectedCats as $selectedCat) {
		    Organization::find($tempOrganization->id)->categories()->save(Category::where('name', $selectedCat)->first());
        } 

		return redirect('/admin/organization/create');
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
