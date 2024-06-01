@extends('layouts.client')

@section('title')
    Result
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/client/css/studenttest.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Congratulation!</h1>
        <div>
            <h3>You have finished the test, this is your result.</h3>

            <div>
                <h3>Score: {{ $testUser->result }}/10 </h3>
            </div>

        </div>

        <div class="button text-center mb-5 mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
        </div>

    </div>
@endsection

@push('script')
    <script>
        const title = @php echo json_encode($testSlug); @endphp;

        localStorage.removeItem(title);
    </script>
@endpush
