@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="card-title lh-sm">ลงทะเบียนสมัครการอบรมฝึกอาชีพ “เกษตรในสังคมเมือง” ในงานวันที่ระลึกคล้ายวันสถาปนากรมส่งเสริมการเกษตร ประจำปี 2565 ครบรอบปีที่ 55</h2>
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

    <form action="{{ route('register.update', $register->register_id) }}" method="get">
        @csrf
        <div class="card border-0 shadow-sm mt-3 p-3">
            <div class="row my-2">
                <div class="col-md-4 m-1">
                    <label for="tel_no" class="form-label fw-semibold">หมายเลขโทรศัพท์มือถือ</label>
                    <input type="text" class="form-control form-control-lg border-0 tel_no" id="tel_no" name="tel_no" value="{{ $register->tel_no }}" required readonly>
                    <span id="tel_no"></span>
                </div>
                @error('tel_no')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
            </div>
        </div>

        <div class="card border-0 shadow-sm mt-3 p-3">
            <div class="row my-2">
                <div class="col-md-2 m-1">
                    <label for="prefix" class="form-label fw-semibold"><strong class="text-danger">*</strong>คำนำหน้า</label>
                    <select class="form-select form-control-lg" name="prefix" id="prefix" required>
                        <option value="นาย" {{ $register->prefix == 'นาย' ? 'selected' : ''}}>นาย</option>
                        <option value="นาง" {{ $register->prefix == 'นาง' ? 'selected' : ''}}>นาง</option>
                        <option value="นางสาว" {{ $register->prefix == 'นางสาว' ? 'selected' : ''}}>นางสาว</option>
                    </select>
                </div>
                @error('prefix')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-4 m-1">
                    <label for="firstname" class="form-label fw-semibold"><strong class="text-danger">*</strong>ชื่อ</label>
                    <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" value="{{ $register->firstname }}" maxlength="30" required>
                </div>
                @error('firstname')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-4 m-1">
                    <label for="lastname" class="form-label fw-semibold"><strong class="text-danger">*</strong>นามสกุล</label>
                    <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" value="{{ $register->lastname }}" maxlength="30"required>
                </div>
                @error('lastname')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
            </div>
            <div class="row my-2">
                <div class="col-md-4 m-1">
                    <label for="address" class="form-label fw-semibold"><strong class="text-danger">*</strong>บ้านเลขที่</label>
                    <input type="text" class="form-control form-control-lg" id="address" name="address" value="{{ $register->address }}" maxlength="10" required>
                </div>
                @error('address')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-2 m-1">
                    <label for="moo" class="form-label fw-semibold">หมู่ที่</label>
                    <input type="text" class="form-control form-control-lg" id="moo" name="moo" maxlength="10" value="{{ $register->moo }}">
                </div>
                @error('moo')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-2 m-1">
                    <label for="village" class="form-label fw-semibold">หมู่บ้าน</label>
                    <input type="text" class="form-control form-control-lg" id="village" name="village" value="{{ $register->village }}" maxlength="30">
                </div>
                @error('village')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-2 m-1">
                    <label for="soi" class="form-label fw-semibold">ซอย</label>
                    <input type="text" class="form-control form-control-lg" id="soi" name="soi" value="{{ $register->soi }}" maxlength="30">
                </div>
                @error('soi')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-2 m-1">
                    <label for="road" class="form-label fw-semibold">ถนน</label>
                    <input type="text" class="form-control form-control-lg" id="road" name="road" value="{{ $register->road }}" maxlength="30">
                </div>
                @error('road')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="row">
                    <div class="col-md-2 m-1">
                        <label for="province_id" class="form-label fw-semibold"><strong class="text-danger">*</strong>จังหวัด</label>
                        <select class="form-select form-control-lg province" name="province_id" id="province_id" required>
                            <option value="">
                                <--เลือกจังหวัด-->
                            </option>
                            @foreach($provinces as $province)
                            <option value="{{ $province->id }}" {{ $register->province_id == $province->id ? 'selected' : ''}}>{{ $province->name_th }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('province_id')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="col-md-2 m-1">
                        <label for="amphure_id" class="form-label fw-semibold"><strong class="text-danger">*</strong>อำเภอ</label>
                        <select class="form-select form-control-lg amphure" name="amphure_id" id="amphure_id" required>
                            <option value="">
                                <--เลือกอำเภอ-->
                            </option>
                            @foreach($amphures as $amphure)
                            <option value="{{ $amphure->id }}" {{ $register->amphure_id == $amphure->id ? 'selected' : ''}}>{{ $amphure->name_th }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('amphure_id')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="col-md-2 m-1">
                        <label for="district_id" class="form-label fw-semibold"><strong class="text-danger">*</strong>ตำบล</label>
                        <select class="form-select form-control-lg district" name="district_id" id="district_id" required>
                            <option value="">
                                <--เลือกตำบล-->
                            </option>
                            @foreach($districts as $district)
                            <option value="{{ $district->id }}" {{ $register->district_id == $district->id ? 'selected' : ''}}>{{ $district->name_th }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('district_id')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="col-md-2 m-1 post_code">
                        <label for="post_code" class="form-label fw-semibold"><strong class="text-danger">*</strong>รหัสไปรษณีย์</label>
                        <input type="text" class="form-control form-control-lg post_code" name="post_code" value="{{ $register->post_code }}" require readonly>
                    </div>
                    @error('post_code')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row my-2">
                <div class="col-md-4 m-1">
                    <label for="email" class="form-label fw-semibold">อีเมล์</label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ $register->email }}" maxlength="30" required>
                </div>
                @error('email')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-4 m-1">
                    <label for="age" class="form-label fw-semibold"><strong class="text-danger">*</strong>อายุ</label>
                    <input type="text" class="form-control form-control-lg" id="age" name="age" value="{{ $register->age }}" maxlength="2" required>
                </div>
                @error('age')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
            </div>

            <div class="d-flex justify-content-center m-3">
                <a href="{{ route('register.show', $register->register_id) }}" class="btn btn-secondary btn-lg fw-semibold m-2">กลับ</a>
                <button type="submit" class="btn btn-primary btn-lg submit_form fw-semibold m-2">บันทึก</button>
            </div>
        </div>
    </form>


</div>

<script>
    $('.province').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"').val();
            $('.amphure').val('');
            $('.district').val('');
            $('.post_code').val('');
            $.ajax({
                url: "{{route('dropdown.fetch_amphure')}}",
                method: "POST",
                data: {
                    select: select,
                    _token: _token
                },
                success: function(result) {
                    $('.amphure').html(result);

                }
            })
        }
    });

    $('.amphure').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"').val();
            $('.district').val('');
            $('.post_code').val('');
            $.ajax({
                url: "{{route('dropdown.fetch_district')}}",
                method: "POST",
                data: {
                    select: select,
                    _token: _token
                },
                success: function(result) {
                    $('.district').html(result);

                }
            })
        }
    });

    $('.district').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"').val();
            $('.post_code').val('');
            $.ajax({
                url: "{{route('dropdown.fetch_postcode')}}",
                method: "POST",
                data: {
                    select: select,
                    _token: _token
                },

                success: function(result) {
                    $('.post_code').val(result);

                }
            })
        }
    });

    $(document).ready(function() {
        let data = localStorage.getItem("inputvalue");
        $('.tel_no').val(data);
    });
</script>
@endsection