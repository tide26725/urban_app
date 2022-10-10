@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="card-title lh-sm">ลงทะเบียนสมัครการอบรมฝึกอาชีพ “เกษตรในสังคมเมือง” ในงานวันที่ระลึกคล้ายวันสถาปนากรมส่งเสริมการเกษตร ประจำปี 2565 ครบรอบปีที่ 55</h2>
        </div>
    </div>

    <form action="{{ route('register.store') }}" method="post">
        @csrf
        <div class="card border-0 shadow-sm mt-3 p-3">
            <div class="row my-2">
                <div class="col-md-4 m-1">
                    <label for="tel_no" class="form-label fw-semibold"><strong class="text-danger">*</strong>หมายเลขโทรศัพท์</label>
                    <input type="text" class="form-control form-control-lg tel_no" id="tel_no" name="tel_no" maxlength="10" onkeypress='validate(event)' required>
                    <span id="tel_no"></span>
                </div>
                @error('tel_no')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-4 m-1">
                    <label for="tel_no_confirm" class="form-label fw-semibold"><strong class="text-danger">*</strong>ยืนยันหมายเลขโทรศัพท์</label>
                    <input type="text" class="form-control form-control-lg tel_no_confirm" id="tel_no_confirm" name="tel_no_confirm" maxlength="10" onkeypress='validate(event)' required><span id="passwordHelpInline" class="form-text">
                        ระบุให้ตรงกับข้อมูลในช่องหมายเลขโทรศัพท์
                    </span>
                </div>
                @error('tel_no_confirm')
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
                        <option selected value="">
                            <--คำนำหน้า-->
                        </option>
                        <option value="นาย" {{ old('prefix') == 'นาย' ? 'selected' : ''  }}>นาย</option>
                        <option value="นาง" {{ old('prefix') == 'นาง' ? 'selected' : ''  }}>นาง</option>
                        <option value="นางสาว" {{ old('prefix') == 'นางสาว' ? 'selected' : ''  }}>นางสาว</option>
                    </select>
                </div>
                @error('prefix')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-4 m-1">
                    <label for="firstname" class="form-label fw-semibold"><strong class="text-danger">*</strong>ชื่อ</label>
                    <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
                </div>
                @error('firstname')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-4 m-1">
                    <label for="lastname" class="form-label fw-semibold"><strong class="text-danger">*</strong>นามสกุล</label>
                    <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                </div>
                @error('lastname')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
            </div>
            <div class="row my-2">
                <div class="col-md-4 m-1">
                    <label for="address" class="form-label fw-semibold"><strong class="text-danger">*</strong>ที่อยู่</label>
                    <textarea class="form-control form-control-lg" name="address" id="" cols="50" rows="5" required>{{ old('address') }}</textarea>
                </div>
                @error('address')
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
                            <option value="{{ $province->id }}">{{ $province->name_th }}</option>
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
                        </select>
                    </div>
                    @error('district_id')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="col-md-2 m-1 post_code">
                        <label for="post_code" class="form-label fw-semibold"><strong class="text-danger">*</strong>รหัสไปรษณีย์</label>
                        <input type="text" class="form-control form-control-lg post_code" name="post_code" require readonly>
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
                    <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}">
                </div>
                @error('email')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="col-md-4 m-1">
                    <label for="age" class="form-label fw-semibold"><strong class="text-danger">*</strong>อายุ</label>
                    <input type="text" class="form-control form-control-lg" id="age" name="age" value="{{ old('age') }}"  required>
                </div>
                @error('age')
                <div class="my-2">
                    <span class="text-danger">{{$message}}</span>
                </div>
                @enderror
            </div>

            <div class="d-flex justify-content-center m-3">
            <a href="{{ route('index') }}" class="btn btn-secondary btn-lg fw-semibold m-2">กลับ</a>
                <button type="submit" class="btn btn-primary btn-lg submit_form fw-semibold m-2 disabled ">บันทึก</button>
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



    $('.tel_no_confirm').change(function() {
        if ($(this).val() != '') {
            var cf_tel_no = $(this).val();
            var tel_no = $('.tel_no').val();

            if (cf_tel_no != tel_no) {
                $(this).removeClass("is-valid")
                $(this).last().addClass("is-invalid")
                $('.submit_form').last().addClass("disabled")
            } else {
                $(this).removeClass("is-invalid")
                $(this).last().addClass("is-valid")
                $('.tel_no').last().addClass("is-valid")
                $('.submit_form').removeClass("disabled")
                return false;
            }

        }
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