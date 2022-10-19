@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-3">
        <form action="{{ route('search.get') }}" method="get">
            @csrf
            <div class="mb-3 text-center">
                <h3>ค้นหารายชื่อผู้ลงทะเบียน</h3>

                <select class="form-control  fs-5 form-select" name="course_id" required>
                    <option value="">กรุณาเลือกหลักสูตร</option>
                    <option value="" disabled>------รอบเช้า (09.30-12.00น.)------</option>
                    <option value="1" {{ $course_id == 1 ? 'selected' : '' }}>การปลูกผักคนเมือง</option>
                    <option value="" disabled>------รอบเช้า (09.30-10.30น.)------</option>
                    <option value="2" {{ $course_id == 2 ? 'selected' : '' }}>การเพาะต้นอ่อนผักงอกสำหรับคนเมือง </option>
                    <option value="3" {{ $course_id == 3 ? 'selected' : '' }}>น้ำเต้าหู้ทรงเครื่อง </option>
                    <option value="4" {{ $course_id == 4 ? 'selected' : '' }}>การเพาะเห็ดฟางในตะกร้า </option>
                    <option value="" disabled>------รอบเช้า (10.45-12.00น.)------</option>
                    <option value="5" {{ $course_id == 5 ? 'selected' : '' }}>การเพาะต้นอ่อนผักงอกสำหรับคนเมือง</option>
                    <option value="6" {{ $course_id == 6 ? 'selected' : '' }}>น้ำเต้าหู้ทรงเครื่อง</option>
                    <option value="7" {{ $course_id == 7 ? 'selected' : '' }}>การเพาะเห็ดฟางในตะกร้า</option>
                    <option value="" disabled>------รอบบ่าย (13.30-16.00 น.)------</option>
                    <option value="8" {{ $course_id == 8 ? 'selected' : '' }}>การปลูกผักคนเมือง</option>
                    <option value="" disabled>------รอบบ่าย (13.30-14.30 น.)------</option>
                    <option value="9" {{ $course_id == 9 ? 'selected' : '' }}>การเพาะต้นอ่อนผักงอกสำหรับคนเมือง</option>
                    <option value="10" {{ $course_id == 10 ? 'selected' : '' }}>ก๋วยเตี๋ยวลุยสวนจากผักงอก</option>
                    <option value="11" {{ $course_id == 11 ? 'selected' : '' }}>การเพาะเห็ดฟางในตะกร้า</option>
                    <option value="" disabled>------รอบบ่าย(14.45-16.00น.)------</option>
                    <option value="12" {{ $course_id == 12 ? 'selected' : '' }}>การเพาะต้นอ่อนผักงอกสำหรับคนเมือง</option>
                    <option value="13" {{ $course_id == 13 ? 'selected' : '' }}>ก๋วยเตี๋ยวลุยสวนจากผักงอก</option>
                    <option value="14" {{ $course_id == 14 ? 'selected' : '' }}>การเพาะเห็ดฟางในตะกร้า</option>
                </select>

                <button type="submit" class="btn btn-primary mt-2"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา</button>
            </div>
        </form>
    </div>

    <div class="card mt-2">
        <h3 class="m-2">หลักสูตร : {{ $course_name }}</h3>
        <h5 class="m-1">เวลา : {{$start_time}} -  {{$end_time}} น.</h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                </tr>
            </thead>
            <tbody>
                @if($user_registers)
                @php($i=1)
                @foreach($user_registers as $user_register)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $user_register->prefix }}{{ $user_register->firstname }} {{ $user_register->lastname }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="2" class="text-center">ค้นหาข้อมูล</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>




</script>


@endsection