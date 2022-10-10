@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="card-title lh-base">ลงทะเบียนสมัครการอบรมฝึกอาชีพ “เกษตรในสังคมเมือง” ในงานวันที่ระลึกคล้ายวันสถาปนากรมส่งเสริมการเกษตร ประจำปี 2565 ครบรอบปีที่ 55</h2>
        </div>
    </div>

    <form action="{{ route('questionnaire.update', $register->register_id) }}" method="get">

        <!-- ลักษณะที่พักอาศัย -->
        <div class="card m-2 p-3 fs-5">
            <label for="" class="fw-semibold mb-2 ">ลักษณะที่พักอาศัย</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="residence_mst_id" id="inlineRadio1" value="1" required>
                <label class="form-check-label" for="inlineRadio1">บ้านเดี่ยว</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="residence_mst_id" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">ทาวน์โฮม /ทาว์เฮ้าส์</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="residence_mst_id" id="inlineRadio3" value="3">
                <label class="form-check-label" for="inlineRadio3">ห้องพัก/คอนโด/อพาร์ทเม้นท์</label>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------------------------------- -->
        <!-- พื้นที่ทำการเกษตร -->
        <div class="card m-2 p-3 fs-5">
            <label for="" class="fw-semibold mb-2">พื้นที่ทำการเกษตร</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="farmland_mst_id" id="inlineRadio4" value="4" required>
                <label class="form-check-label" for="inlineRadio4">ไม่เกิน 50 ตารางเมตร</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="farmland_mst_id" id="inlineRadio5" value="5">
                <label class="form-check-label" for="inlineRadio5">มากกว่า 50 ตารางเมตร</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="farmland_mst_id" id="inlineRadio6" value="6">
                <label class="form-check-label" for="inlineRadio6">ไม่มี(ปลูกในกระถาง)</label>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------------------------------- -->
        <!-- ระดับการศึกษา -->
        <div class="card m-2 p-3 fs-5">
            <label for="" class="fw-semibold mb-2">ระดับการศึกษา</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="education_lv_mst_id" id="inlineRadio7" value="7" required>
                <label class="form-check-label" for="inlineRadio7">ปริญญาตรีหรือสูงกว่า</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="education_lv_mst_id" id="inlineRadio8" value="8">
                <label class="form-check-label" for="inlineRadio8">มัธยมศึกษาตอนต้น</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="education_lv_mst_id" id="inlineRadio9" value="9">
                <label class="form-check-label" for="inlineRadio9">ประถมศึกษา</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="education_lv_mst_id" id="inlineRadio10" value="10">
                <label class="form-check-label" for="inlineRadio10">ต่ำกว่าประถมศึกษา</label>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------------------------------- -->
        <!-- อาชีพ -->
        <div class="card m-2 p-3 fs-5">
            <label for="" class="fw-semibold mb-2">อาชีพ</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="career_mst_id" id="inlineRadio11" value="11" required>
                <label class="form-check-label" for="inlineRadio11">เกษตรกร</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="career_mst_id" id="inlineRadio12" value="12">
                <label class="form-check-label" for="inlineRadio12">ค้าขาย/ธุรกิจส่วนตัว</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="career_mst_id" id="inlineRadio13" value="13">
                <label class="form-check-label" for="inlineRadio13">รับจ้าง/ใช้แรงงาน</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="career_mst_id" id="inlineRadio14" value="14">
                <label class="form-check-label" for="inlineRadio14">งานประจำ</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="career_mst_id" id="inlineRadio15" value="15">
                <label class="form-check-label" for="inlineRadio15">นักเรียน/นักศึกษา</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="career_mst_id" id="inlineRadio16" value="16">
                <label class="form-check-label" for="inlineRadio16">ว่างงาน</label>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------------------------------- -->
        <!-- รายได้ต่อเดือน -->
        <div class="card m-2 p-3 fs-5">
            <label for="" class="fw-semibold mb-2">รายได้ต่อเดือน</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="income_mst_id" id="inlineRadio17" value="17" required>
                <label class="form-check-label" for="inlineRadio17">ไม่มีรายได้</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="income_mst_id" id="inlineRadio18" value="18">
                <label class="form-check-label" for="inlineRadio18">ไม่เกิน 9,000 บาท</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="income_mst_id" id="inlineRadio19" value="19">
                <label class="form-check-label" for="inlineRadio19">9,001 - 20,000 บาท</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="income_mst_id" id="inlineRadio20" value="20">
                <label class="form-check-label" for="inlineRadio20">มากกว่า 20,001 บาท</label>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------------------------------- -->
        <!-- เหตุผลที่เข้ารับการฝึกอบรม -->
        <div class="card m-2 p-3 fs-5">
            <label for="" class="fw-semibold mb-2">เหตุผลที่เข้ารับการฝึกอบรม</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="reason_mst_id" id="inlineRadio21" value="21" required>
                <label class="form-check-label" for="inlineRadio21">ต้องการประกอบอาชีพอิสระ</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="reason_mst_id" id="inlineRadio22" value="22">
                <label class="form-check-label" for="inlineRadio22">ต้องการมีอาชีพเสริม นอกเหนืออาชีพการงานประจำ</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="reason_mst_id" id="inlineRadio23" value="23">
                <label class="form-check-label" for="inlineRadio23">เพื่อสำหรับใช้ในชีวิตประจำวัน</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="reason_mst_id" id="inlineRadio24" value="24">
                <label class="form-check-label" for="inlineRadio24">เพื่อศึกษาหาความรู้</label>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------------------------------- -->
        <input type="hidden" name="register_id" value="{{ $register->register_id }}">
        <div class="d-flex justify-content-center mt-4 mb-5">
            <button type="submit" class="btn btn-primary btn-lg p-3 fs-2">บันทึกแบบสำรวจ</button>
        </div>

    </form>
</div>
@endsection