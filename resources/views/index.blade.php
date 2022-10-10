@extends('layouts.app')

@section('content')
<img class="img-fluid" src="{{ asset('pics/banner_2.png') }}" alt="">
<div class="container">
    <!-- <div class="row">
        <div class="col align-content-center">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div> -->

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

    <!-- <div class="d-flex justify-content-center">
        <div class="card border-0 shadow-sm mt-4" style="width: 30rem;">
            <div class="card-body">
                <p>ติดต่อสอบถามได้ที่ .....</p>
            </div>
        </div>
    </div> -->
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