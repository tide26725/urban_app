@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <div class="card m-3 text-center">
                <div class="card-header">
                    คนลงทะเบียนทั้งหมด
                </div>
                <p>{{ $getAllUser }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card m-3 text-center">
                <div class="card-header">
                    จำนวนหลักสูตร
                </div>
                <p>{{ $count_course }}</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ชื่อหลักสูตร</th>
                        <th scope="col">เวลา</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <th scope="row">หลักสูตร : {{ $course->course_name}}</th>
                        <td>{{ $course->start_time }} - {{ $course->end_time }}</td>
                        <td><a href=" {{ route('course.view', $course->course_id) }} " class="btn btn-primary">รายละเอียด</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




        <!-- @foreach($courses as $course)
        <div class="col-md-12">
            <div class="card m-2">
                <div class="row">
                    <div class="col-md">
                        หลักสูตร : {{ $course->course_name}}
                    </div>
                    <div class="col-md">
                        <a href=" {{ route('course.view', $course->course_id) }} " class="btn btn-primary">รายละเอียด</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach -->
        <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div> -->
    </div>

</div>
@endsection