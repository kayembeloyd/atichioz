@extends('layouts.app')

@section('content')
    <submenu current_pg=".jobs"></submenu>
    <staggeredcategories current_pg=".jobs"></staggeredcategories>
    <myjobs api_path="api/jobs" job_urls="jobs/job/"></myjobs>
@endsection