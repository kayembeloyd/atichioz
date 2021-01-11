@extends('layouts.app')

@section('content')
    <submenu current_pg=".jobs_in_organization" l1="{{$organization}}"></submenu>
    <myjobs api_path="{{'/api/organizations/' .$organization }}" job_urls="{{'/organizations/'. $organization . '/jobs/job/'}}"></myjobs>
@endsection