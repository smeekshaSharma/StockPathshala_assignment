@extends('layout')
@section('title', 'Verify OTP')
@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100" style="background: linear-gradient(45deg, #12c2e9, #c471ed, #f64f59);">
    <div class="col-md-4 col-sm-8 col-lg-6">
        <div class="card border-0 shadow-lg" style="border-radius: 20px; background-color: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
            <div class="card-header text-center" style="border-bottom: none; padding-top: 2rem;">
                <h2 style="color: #fff; font-weight: bold;">OTP Verification</h2>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('verify.otp') }}" id="otpForm">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="otp" class="form-label text-light">Enter OTP</label>
                        <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter the OTP" style="border-radius: 20px; background: rgba(255, 255, 255, 0.2); color: #fff; border: none;" required>
                    </div>
                    <button type="submit" class="btn btn-block w-100 py-2" style="background: linear-gradient(90deg, #ff8a00, #e52e71); border: none; border-radius: 30px; color: #fff; font-weight: bold; font-size: 1.2rem;">
                        Verify OTP
                    </button>
                </form>
                <div id="otpLoader" class="text-center mt-3" style="display: none;">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center border-0" style="padding-bottom: 2rem;">
                <small style="color: #fff;">Didn’t receive an OTP? <a href="/resend-otp" class="text-warning" style="font-weight: 500;">Resend OTP</a></small>
            </div>
        </div>
    </div>
</div>

<script>
    const otpForm = document.getElementById('otpForm');
    const otpLoader = document.getElementById('otpLoader');
    otpForm.addEventListener('submit', function() {
        otpLoader.style.display = 'block';  
    });
</script>
@endsection
