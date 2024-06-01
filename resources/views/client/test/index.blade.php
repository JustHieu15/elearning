@extends('layouts.client')

@section('title')
    Test
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/client/css/studentcourse.css') }}">

    <style>
        .container {
            margin-top: 120px;
            margin-bottom: 120px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row row-cols-6">
            <div class="col">
                <h3>{{ $course->name }}</h3>
            </div>
        </div>

        <div class="row row-cols-7 mt-5">
            <div class="col">
                <h5>No.</h5>
            </div>

            <div class="col">
                <h5>Name</h5>
            </div>

            <div class="col">
                <h5>Time</h5>
            </div>

            <div class="col">
                <h5>Score</h5>
            </div>

            <div class="col">
            </div>
        </div>

        @foreach($tests as $key => $value)
            <div class="alert alert-Warning">
                <div class="row row-cols-6 align-items-center">
                    <div class="col">
                        <p>{{ $key + 1 }}.</p>
                    </div>

                    <div class="col">
                        <p>
                            {{ $value->name }}
                        </p>
                    </div>

                    <div class="col">
                        <p>
                            @php $time = explode(':', $value->time_limit) @endphp
                            {{ $time[0] * 60 + $time[1] }} minutes
                        </p>
                    </div>

                    <div class="col">
                        <p>
                            @if (!empty($testUser))
                                @if ($testUser->where('test_id', $value->id)->first() != null)
                                    {{ $testUser->result }} point
                                @else
                                    0 point
                                @endif
                            @else
                                0 point
                            @endif
                        </p>
                    </div>

                    <div class="col">
                        @if (!empty($testUser))
                            @if ($testUser->where('test_id', $value->id)->first() != null)
                                <button type="button" class="btn btn-secondary">Start</button>
                            @else
                                <a href="{{ route('test.show', $value->slug) }}" class="btn btn-primary">Start</a>
                            @endif
                        @else
                            <a href="{{ route('test.show', $value->slug) }}" class="btn btn-primary">Start</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('script')
@endpush
