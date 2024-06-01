@extends('layouts.client')

@section('title')
    Subject Detail
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/client/css/studentcourse.css') }}">

    <style>
        .container {
            margin-top: 120px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row row-cols-7 mt-5">
            <div class="col">
                <h5>No.</h5>
            </div>

            <div class="col">
                <h5>Name</h5>
            </div>

            <div class="col">
                <h5>Status</h5>
            </div>

            <div class="col">
            </div>
        </div>

        @foreach($course as $key => $value)
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
                        @foreach($value->courseUser as $courseUser)
                            @if($courseUser->user_id == Auth::user()->id)
                                <span class="badge badge-warning">On Progress</span>
                            @endif
                        @endforeach

                        @if ($value->courseUser->count() == 0)
                            <span class="badge badge-danger">Not Registered</span>
                        @endif
                    </div>

                    <div class="col">
                        @foreach($value->courseUser as $courseUser)
                            @if($courseUser->user_id == Auth::user()->id)
                                <a href="{{ route('course.show', $value->slug) }}" class="btn btn-primary">Detail</a>
                            @endif
                        @endforeach

                        @if ($value->courseUser->count() == 0)
                            <form action="{{ route('course.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="course_slug" value="{{ $value->slug }}">

                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('script')
@endpush
