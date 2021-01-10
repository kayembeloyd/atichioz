@extends('layouts.app')

@section('content')
    <submenu current_pg=".jobs_in_category" l1="{{$category}}"></submenu>
    <myjobs api_path="{{'/api/categories/' .$category }}" job_urls="{{'/categories/'. $category . '/jobs/job/'}}"></myjobs>
@endsection