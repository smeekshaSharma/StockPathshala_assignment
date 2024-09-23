@extends('layout')
@section('title', 'Stock Market Classes | Hindi')
@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100" style="background: linear-gradient(45deg, #00dbde, #fc00ff);">
    <div class="col-md-4 col-sm-8 col-lg-6">
        <div class="card border-0 shadow-lg" style="border-radius: 20px; background-color: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
            <div class="card-header text-center" style="border-bottom: none; padding-top: 2rem;">
                <h2 style="color: #fff; font-weight: bold;">Login</h2>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="/login" id="loginForm">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="user_name" class="form-label text-light">Mobile Number</label>
                        <div class="input-group">
                            <select class="form-select border-0" name="country_code" style="max-width: 100px; border-radius: 20px 0 0 20px; background: rgba(255, 255, 255, 0.2); color: #fff;" required>
                                <option value="+91" selected style="color: #000">+91 (IN)</option>
                                <option value="+1" style="color: #000">+1 (US)</option>
                                <option value="+44" style="color: #000">+44 (UK)</option>
                                <option value="+61" style="color: #000">+61 (AU)</option>
                                <option value="+81" style="color: #000">+81 (JP)</option>
                                <option value="+49" style="color: #000">+49 (DE)</option>
                            </select>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter your mobile number" style="border-radius: 0 20px 20px 0; background: rgba(255, 255, 255, 0.2); color: #fff; border: none;" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block w-100 py-2" style="background: linear-gradient(90deg, #ff8a00, #e52e71); border: none; border-radius: 30px; color: #fff; font-weight: bold; font-size: 1.2rem;">
                        Login
                    </button>
                </form>
                <div id="loginLoader" class="text-center mt-3" style="display: none;">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center border-0" style="padding-bottom: 2rem;">
                <small style="color: #fff;">Don't have an account? <a href="/register" class="text-warning" style="font-weight: 500;">Register here</a></small>
            </div>
        </div>
    </div>
</div>

<script>
    const loginForm = document.getElementById('loginForm');
    const loginLoader = document.getElementById('loginLoader');
    loginForm.addEventListener('submit', function() {
        loginLoader.style.display = 'block';  
    });
</script>
@endsection
