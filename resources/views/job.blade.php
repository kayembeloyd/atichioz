@extends('layouts.app')

@section('content')
    @if ($category != '')
        <submenu current_pg="{{$view_type}}" l1="{{$category}}" l2=".job" l3="{{$job_title}}"></submenu>
    @else
        <submenu current_pg="{{$view_type}}" l1="{{$organization}}" l2=".job" l3="{{$job_title}}"></submenu>
    @endif

    <myjobsleft current_job_id="{{$job_id}}"></myjobsleft>
@endsection