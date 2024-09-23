@extends('layout')
@section('title', 'Live Classes')
@section('content')

<div style="min-height: 100vh; background: linear-gradient(145deg, #f0f2f5, #e0e5eb); padding: 40px;">
    <h1 class="text-center mb-5" style="color: #2c3e50; font-weight: bold; letter-spacing: 1px;">Live Classes</h1>

    <div id="shimmerContainer">
        <div class="mb-4 shimmer shimmer-image" style="width: 100%; height: 250px; background: linear-gradient(90deg, rgba(220,220,220,0.1) 25%, rgba(240,240,240,0.2) 50%, rgba(220,220,220,0.1) 75%); border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);"></div>
        <div class="mb-2 shimmer shimmer-text" style="width: 60%; height: 20px; background: linear-gradient(90deg, rgba(220,220,220,0.1) 25%, rgba(240,240,240,0.2) 50%, rgba(220,220,220,0.1) 75%); border-radius: 10px;"></div>
        <div class="mb-2 shimmer shimmer-text" style="width: 70%; height: 20px; background: linear-gradient(90deg, rgba(220,220,220,0.1) 25%, rgba(240,240,240,0.2) 50%, rgba(220,220,220,0.1) 75%); border-radius: 10px;"></div>
        <div class="mb-2 shimmer shimmer-text" style="width: 50%; height: 20px; background: linear-gradient(90deg, rgba(220,220,220,0.1) 25%, rgba(240,240,240,0.2) 50%, rgba(220,220,220,0.1) 75%); border-radius: 10px;"></div>
    </div>

    <div id="classList" class="row" style="display: none; padding: 0; margin-top: 30px;">
        @foreach ($classes as $class)
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s ease; background: rgba(255, 255, 255, 0.7); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15); backdrop-filter: blur(15px);">
                <img src="{{ $class['image'] }}" class="card-img-top class-image" alt="{{ $class['title'] }}" style="object-fit: cover; filter: brightness(90%);">
                <div class="card-body" style="color: #2c3e50;">
                    <h4 class="card-title" style="font-weight: bold; color: #2c3e50;">{{ $class['title'] }}</h4>
                    <p class="card-text" style="color: #7f8c8d;">
                        <strong>Teacher:</strong> {{ $class['teachers']['name'] }}<br>
                        <strong>Start Time:</strong> {{ \Carbon\Carbon::parse($class['start_datetime'])->format('d M, Y h:i A') }}
                    </p>
                    <a href="{{ $class['participant_link'] }}" class="btn btn-primary" target="_blank" style="background: linear-gradient(45deg, #3498db, #2980b9); border: none; padding: 10px 20px; border-radius: 50px; transition: background 0.3s ease;">
                        View Batch
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const shimmerContainer = document.getElementById('shimmerContainer');
        const classList = document.getElementById('classList');
        setTimeout(function() {
            shimmerContainer.style.display = 'none';  
            classList.style.display = 'flex';  
        }, 3000);  
    });
</script>

<style>
    @media (max-width: 768px) {
        .class-image {
            height: 250px; 
        }
        .text-center{
            font-size: 2.8rem;
        }
    }
    @media (max-width: 414px) {
        .class-image {
            height: 150px; 
        }
        .text-center{
            font-size: 1.5rem;
        }
    }
</style>

@endsection
