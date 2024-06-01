@extends('layouts.client')

@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/client/css/studenthome.css') }}">
@endsection

@section('content')
    <div class="box1">
        <div class="abc">
            <div class="row align-items-start">
                <div class="col">
                    <h1 style="font-size: 50px; color: orange; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> <i class="fas fa-book" style="color: orange;"></i> elEARNING 2024</h1>
                </div>
                <div class="col">

                </div>
                <div class="col">
                    <img src="{{ asset('assets/img/back ground1.png') }}" style="width: 100%; height: 280px; transform: rotate(180deg);" alt="">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <div class="text1">
                        <h1 style="font-family: cursive;" >The best learning <br> platform for students</h1>
                        <span style="font-family: cursive;">Trusted by over 300 universities worldwide.</span><br>
                        <button class="start-button">Start learning now </button>
                    </div>
                </div>
                <div class="col">
                    <img class="img-abc" src="{{ asset('assets/img/Default_student_elearning_0.jpg') }}" style="width: 140px; height: auto; " alt="">
                    <img class="img-abc" src="{{ asset('assets/img/Default_student_elearning_2.jpg') }}" style="width: 330px; height: auto; " alt="">
                    <img class="img-abc" src="{{ asset('assets/img/Default_student_elearning_background_0.jpg') }}" style="width: 220px; height: auto; " alt=""> <br> <br>
                    <p style="font-family: cursive;">Join an eLearning course for a new experience <br> Register now to experience the courses</p>
                </div>

            </div>
            <div class="row align-items-end">
                <div class="col">
                    <img src="{{ asset('assets/img/back ground1.png') }}" style="width: 100%; height: 280px;" alt="">
                </div>
                <div class="col">
                    <div class="text2">
                        <img src="{{ asset('assets/img/logo 2.jpg') }}" style="width: 150px; height: auto; " alt="">
                        <img src="{{ asset('assets/img/logo 3.jpg') }}" style="width: 150px; height: auto; " alt="">
                        <img src="{{ asset('assets/img/logo 2.jpg') }}" style="width: 150px; height: auto; " alt="">
                    </div>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="box2">
            <div class="container">
{{--                <h2--}}
{{--                    style="--}}
{{--                            font-family: Impact, Haettenschweiler,--}}
{{--                                'Arial Narrow Bold', sans-serif;--}}
{{--                        "--}}
{{--                >--}}
{{--                    Blog--}}
{{--                    <i class="fab fa-blogger" style="color: orange"></i>--}}
{{--                </h2>--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="box3">--}}
{{--                            <img src="img/top4-khoi-nganh-1.png" alt=""/>--}}
{{--                            <p>Title</p>--}}
{{--                            <span--}}
{{--                            >Welcome to our elearning blog! Here, we--}}
{{--                                    focus on sharing knowledge, experience and--}}
{{--                                    learning materials related to diverse topics--}}
{{--                                    in the field of online education</span--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="row row-cols-2">--}}
{{--                            <div class="col">--}}
{{--                                <img--}}
{{--                                    src="img/dai-hoc-fpt-1-1659081213-910x607.jpg"--}}
{{--                                    alt=""--}}
{{--                                />--}}
{{--                                <p>title</p>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <img--}}
{{--                                    src="img/5-xu-huong-e-learning-dinh-hinh-nam-2021-1.png"--}}
{{--                                    alt=""--}}
{{--                                />--}}
{{--                                <p>title</p>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <img--}}
{{--                                    src="img/Doanh-nghiệp-làm-gì-để-đánh-giá-hiệu-quả-khóa-học-E-learning.png"--}}
{{--                                    alt=""--}}
{{--                                />--}}
{{--                                <p>title</p>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <img--}}
{{--                                    src="img/e-learning-website-01-scaled.jpg"--}}
{{--                                    alt=""--}}
{{--                                />--}}
{{--                                <p>title</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>

{{--        <div class="box4 mt-5">--}}
{{--            <h2--}}
{{--                style="--}}
{{--                        font-family: Impact, Haettenschweiler,--}}
{{--                            'Arial Narrow Bold', sans-serif;--}}
{{--                    "--}}
{{--            >--}}
{{--                Test--}}
{{--                <i class="fas fa-clipboard-list" style="color: orange"></i>--}}
{{--            </h2>--}}
{{--            <div class="row">--}}
{{--                @foreach($tests as $test)--}}
{{--                    <div class="col-4">--}}
{{--                        <div--}}
{{--                            class="card"--}}
{{--                            style="width: 18rem; height: auto"--}}
{{--                        >--}}
{{--                            <img--}}
{{--                                src="https://storage.timviec365.vn/timviec365/pictures/images/tin-hoc-van-phong-tieng-anh%20(1).jpg"--}}
{{--                                class="card-img-top"--}}
{{--                                style="height: 200px"--}}
{{--                                alt="..."--}}
{{--                            />--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title">{{ $test->name }}</h5>--}}
{{--                                <p class="card-text">{{ $test->time_limit }}</p>--}}
{{--                                <a--}}
{{--                                    href="{{ route('test.show', $test->slug) }}"--}}
{{--                                    class="btn"--}}
{{--                                    style="--}}
{{--                                            background-color: orange;--}}
{{--                                            color: white;--}}
{{--                                        "--}}
{{--                                >Take test</a--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="container">
            <div class="box7">
                <h2
                    style="
                            font-family: Impact, Haettenschweiler,
                                'Arial Narrow Bold', sans-serif;
                        "
                >
                    Subject
                    <i class="far fa-file" style="color: orange"></i>
                </h2>
                <div class="row align-items-start">
                    <div class="col">
                        <div class="box-img1">
                            <img src="{{ asset('assets/img/Mathematics.png') }}" alt=""/> <br/>
                            <span>Mathematics</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-img">
                            <img src="{{ asset('assets/img/Literature.png') }}" alt=""/> <br/>
                            <span>Literature</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-img1">
                            <img src="{{ asset('assets/img/English.png') }}" alt=""/> <br/>
                            <span>English</span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <div class="box-img">
                            <img src="{{ asset('assets/img/Biology.png') }}" alt=""/> <br/>
                            <span>Biology</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-img1">
                            <img src="{{ asset('assets/img/Chemistry.png') }}" alt=""/> <br/>
                            <span>Chemistry</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-img">
                            <img src="{{ asset('assets/img/Physics.png') }}" alt=""/> <br/>
                            <span>Physics</span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col">
                        <div class="box-img1">
                            <img src="{{ asset('assets/img/Civic Education.png') }}" alt=""/> <br/>
                            <span>Civic Education</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-img">
                            <img src="{{ asset('assets/img/History.png') }}" alt=""/> <br/>
                            <span>History</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box-img1">
                            <img src="{{ asset('assets/img/Geography.png') }}" alt=""/> <br/>
                            <span>Geography</span>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="box-img1">
                            <img src="{{ asset('assets/img/Informatics.png') }}" alt=""/> <br/>
                            <span>Informatics</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box-img1">
                            <img src="{{ asset('assets/img/Music.png') }}" alt=""/> <br/>
                            <span>Music</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
