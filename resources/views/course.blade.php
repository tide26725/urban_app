@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-3">
                <h4 class="mb-3">หลักสูตร {{ $course_detail->course_name }}  {{ $course_detail->start_time }}-{{ $course_detail->end_time }}</h4>
                <p>จำนวนที่รับทั้งหมด : <strong>{{ $course_detail->quota_max }}</strong></p>
                <p>จำนวนตัวจริง : <strong>{{ $course_detail->quota }}</strong></p>
            </div>
        </div>
    </div>

    @if(session("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session("error"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{session('error')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card m-3 text-center">
                <div class="card-header">
                    จำนวนคนทั้งหมดที่ลงทะเบียน
                </div>
                <p>{{ $count }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-3 bg-success text-white  text-center">
                <div class="card-header">
                    จำนวนคนที่เข้าร่วม
                </div>
                <p>{{ $count_approve }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-3 bg-danger text-white  text-center">
                <div class="card-header">
                    จำนวนคนที่ปฏิเสธ
                </div>
                <p>{{ $count_cancel }}</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-3">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">เบอร์โทร</th>
                            <th scope="col">อายุ</th>
                            <th scope="col">วันที่สมัครหลักสูตร</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user_in_course as $user)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td>{{ $user->tel_no }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @if($user->status == 1)
                                <span class="badge rounded-pill text-bg-success">เข้าร่วม</span>
                                @elseif($user->status == 2)
                                <span class="badge rounded-pill text-bg-danger">ปฎิเสธ</span>
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('verify.confirm', $user->register_course_id) }}" class="btn btn-primary m-1" onclick="return confirm('ตกลงเข้าร่วม?');"><i class="fa-sharp fa-solid fa-square-check"></i></a>
                                <a href="{{ route('verify.cancel', $user->register_course_id) }}" class="btn btn-danger m-1" onclick="return confirm('ปฏิเสธการเข้าร่วม?');"><i class="fa-sharp fa-solid fa-xmark"></i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection