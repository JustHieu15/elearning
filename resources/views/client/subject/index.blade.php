@extends('layouts.client')

@section('title')
    Subject
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/client/css/studentsubject.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Subject List</h1>
        {{--        <div class="row align-items-start">--}}
        {{--            <div class="col">--}}
        {{--                <div class="box-img1">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Mathematics.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Mathematics</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--            <div class="col">--}}
        {{--                <div class="box-img">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Literature.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Literature</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--            <div class="col">--}}
        {{--                <div class="box-img1">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/English.png') }}" alt=""/> <br/>--}}
        {{--                        <span>English</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        {{--        <div class="row align-items-center">--}}
        {{--            <div class="col">--}}
        {{--                <div class="box-img">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Biology.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Biology</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--            <div class="col">--}}
        {{--                <div class="box-img1">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Chemistry.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Chemistry</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--            <div class="col">--}}
        {{--                <div class="box-img">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Physics.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Physics</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        {{--        <div class="row align-items-end">--}}
        {{--            <div class="col">--}}
        {{--                <div class="box-img1">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Civic Education.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Civic Education</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--            <div class="col">--}}
        {{--                <div class="box-img">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/History.png') }}" alt=""/> <br/>--}}
        {{--                        <span>History</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--            <div class="col">--}}
        {{--                <div class="box-img1">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Geography.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Geography</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        {{--        <div class="row justify-content-center">--}}
        {{--            <div class="col-4">--}}
        {{--                <div class="box-img1">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Informatics.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Informatics</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-4">--}}
        {{--                <div class="box-img1">--}}
        {{--                    <a href="#" class="text-decoration-none text-black">--}}
        {{--                        <img src="{{ asset('assets/img/Music.png') }}" alt=""/> <br/>--}}
        {{--                        <span>Music</span>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="row align-items-center">
            @foreach($subjects as $subject)
                <div class="col">
                    <div class="box-img">
                        @switch($subject->name)
                            @case($subject->name == 'Mathematics')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Mathematics.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'Literature')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Literature.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'English')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/English.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'Biology')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Biology.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'Chemistry')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Chemistry.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'Physics')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Physics.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'Civic Education')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Civic Education.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'History')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/History.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'Geography')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Geography.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'Informatics')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Informatics.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break

                            @case($subject->name == 'Music')
                                <a href="{{ route('subject.show', $subject->slug) }}" class="text-decoration-none text-black">
                                    <img src="{{ asset('assets/img/Music.png') }}" alt=""/> <br/>
                                    <span>{{ $subject->name }}</span>
                                </a>
                                @break
                        @endswitch
                    </div>
                </div>

                @if ($loop->iteration % 3 == 0)
        </div>
        <div class="row align-items-center">
            @endif
            @endforeach
        </div>
    </div>
@endsection

@push('script')
@endpush
