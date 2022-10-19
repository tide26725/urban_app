@extends('layouts.app')

@section('content')
<img class="img-fluid" src="{{ asset('pics/banner_2.png') }}" alt="">
<div class="container">




    <div class="d-flex justify-content-center mt-3">

        <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-magnifying-glass"></i> หลักสูตรที่เปิดให้ลงทะเบียน</button>
    </div>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">รายชื่อหลักสูตร</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="card border-0 bg-light shadow-sm p-2 mb-1">
                <strong>09.30 - 12.00 น.</strong>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_1 >= $courses['0']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การปลูกผักคนเมือง
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_1 }}</span>&nbsp;การปลูกผักคนเมือง
                    @endif
                </div>
            </div>
            <div class="card border-0 bg-light shadow-sm p-2 mb-1">
                <strong>09.30 - 10.30 น.</strong>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_2 >= $courses['1']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การเพาะต้นอ่อนผักงอกสำหรับคนเมือง
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_2 }}</span>&nbsp;การเพาะต้นอ่อนผักงอกสำหรับคนเมือง
                    @endif
                </div>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_3 >= $courses['2']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;น้ำเต้าหู้ทรงเครื่อง
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_3 }}</span>&nbsp;น้ำเต้าหู้ทรงเครื่อง
                    @endif
                </div>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_4 >= $courses['3']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การเพาะเห็ดฟางในตะกร้า
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_4 }}</span>&nbsp;การเพาะเห็ดฟางในตะกร้า
                    @endif
                </div>
            </div>
            <div class="card border-0 bg-light shadow-sm p-2 mb-1">
                <strong>10.45 - 12.00 น.</strong>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_5 >= $courses['4']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การเพาะต้นอ่อนผักงอกสำหรับคนเมือง
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_5 }}</span>&nbsp;การเพาะต้นอ่อนผักงอกสำหรับคนเมือง
                    @endif
                </div>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_6 >= $courses['5']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;น้ำเต้าหู้ทรงเครื่อง
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_6 }}</span>&nbsp;น้ำเต้าหู้ทรงเครื่อง
                    @endif
                </div>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_7 >= $courses['6']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การเพาะเห็ดฟางในตะกร้า
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_7 }}</span>&nbsp;การเพาะเห็ดฟางในตะกร้า
                    @endif
                </div>
            </div>
            <div class="card border-0 bg-light shadow-sm p-2 mb-1">
                <strong>13.30 - 16.00 น.</strong>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_8 >= $courses['7']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การปลูกผักคนเมือง
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_8 }}</span>&nbsp;การปลูกผักคนเมือง
                    @endif
                </div>
            </div>
            <div class="card border-0 bg-light shadow-sm p-2 mb-1">
                <strong>13.30 - 14.30 น.</strong>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_9 >= $courses['8']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การเพาะต้นอ่อนผักงอกสำหรับคนเมือง
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_9 }}</span>&nbsp;การเพาะต้นอ่อนผักงอกสำหรับคนเมือง
                    @endif
                </div>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_10 >= $courses['9']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;ก๋วยเตี๋ยวลุยสวนจากผักงอก
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_10 }}</span>&nbsp;ก๋วยเตี๋ยวลุยสวนจากผักงอก
                    @endif
                </div>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_11 >= $courses['10']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การเพาะเห็ดฟางในตะกร้า
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_11 }}</span>&nbsp;การเพาะเห็ดฟางในตะกร้า
                    @endif
                </div>
            </div>
            <div class="card border-0 bg-light shadow-sm p-2 mb-1">
                <strong>14.45 - 16.00 น.</strong>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_12 >= $courses['11']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การเพาะต้นอ่อนผักงอกสำหรับคนเมือง
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_12 }}</span>&nbsp;การเพาะต้นอ่อนผักงอกสำหรับคนเมือง
                    @endif
                </div>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_13 >= $courses['12']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;ก๋วยเตี๋ยวลุยสวนจากผักงอก
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_13 }}</span>&nbsp;ก๋วยเตี๋ยวลุยสวนจากผักงอก
                    @endif
                </div>
                <div class="d-flex flex-row text-start mt-1">
                    @if( $count_course_id_14 >= $courses['13']->quota_max )
                    <span class="badge text-bg-danger">ผู้ลงทะเบียน : {{ ('เต็ม') }}</span>&nbsp;การเพาะเห็ดฟางในตะกร้า
                    @else
                    <span class="badge text-bg-success">ผู้ลงทะเบียน : {{ $count_course_id_14 }}</span>&nbsp;การเพาะเห็ดฟางในตะกร้า
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-3">

<a href="{{ route('search_register_course') }}" class="btn btn-success"><i class="fa-sharp fa-solid fa-clipboard"></i> ตรวจสอบรายชื่อผู้ลงทะเบียน</a>
</div>


<div class="d-flex justify-content-center">
    <div class="card border-0 shadow-sm mt-4" style="width: 30rem;">
        <div class="card-body fs-5">
            <form action="{{ route('register.index') }}" method="get">
                <h5 class="card-title">ลงทะเบียน | ค้นหาข้อมูล</h5>
                <div class="form-floating mb-3 ">
                    <input type="text" class="form-control form-control-lg " id="floatingInput" name="tel_no" id="tel_no" maxlength="10" minlength="10" onkeypress='validate(event)' required>
                    <label for="floatingInput">ระบุหมายเลขโทรศัพท์มือถือ</label>
                </div>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary fs-5">ลงทะเบียน | ค้นหา <i class="fa-solid fa-right-to-bracket"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="position-relative bottom-0 start-50 translate-middle-x">
    <div class="d-flex justify-content-center">
        <div class="card border-0 shadow-sm mt-4 opacity-75" style="width: 30rem;">
            <div class="card-body text-center">
                <div class="form-text fw-semibold">
                    ประสานงานเรื่องการรับสมัครฝึกอาชีพได้ที่
                </div>
                <div class="form-text">
                    คุณพุทธิดา โทร. 0933058904
                </div>
                <div class="form-text">
                    คุณฆฤณรัศมิ์ โทร. 0646386661
                </div>
            </div>
        </div>
    </div>
</div>


</div>


<script>
    $(document).ready(function() {

        $('button').on('click', function() {
            localStorage.setItem("inputvalue", $('#floatingInput').val());
            $('p').text(localStorage.getItem("inputvalue"));
        });

    });
</script>

<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
@endsection