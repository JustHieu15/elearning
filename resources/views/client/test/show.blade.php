@extends('layouts.client')

@section('title')
    Show
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/client/css/studenttest.css') }}">
@endsection

@section('content')
    <div class="container mb-5">
        <form action="{{ route('test.submit') }}" method="POST" class="form-test">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="section-question">
                        @foreach($tests->questions as $key => $test)
                            <div class="question">
                                <h4>Question {{ $key + 1 }}:</h4>
                                <span>{{ $test->title }}</span>

                                @foreach($test->answers as $count => $answer)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{ $key }}"
                                               id="question_{{ $key }}_{{ $count }}" value="{{ $answer->content }}"/>

                                        <label class="form-check-label" for="question_{{ $key }}_{{ $count }}">
                                            {{ $answer->content }}
                                        </label>
                                    </div>
                                @endforeach
                                <div class="seperate"></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col">
                    <div class="section-time">
                        <h3>Time: <span class="time-display"></span> left</h3>
                        <div class="form-check-question">
                            <div class="box1 form-check-icon">
                                @foreach($tests->questions as $key => $test)
                                    <i class="far fa-check-circle">
                                        <br>
                                        {{ $key + 1 }}
                                    </i>
                                @endforeach
                            </div>

                            <div class="box2">
                                <button id="cancelButton" type="button" class="btn btn-danger">
                                    Cancel
                                </button>

                                <button type="submit" class="btn btn-warning"
                                        style="color: white !important;">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        const question = document.querySelectorAll('.question');
        const formCheckIcon = document.querySelectorAll('.form-check-icon i');
        const timeDisplay = document.querySelector('.time-display');
        const time = @php echo $tests->time_limit; @endphp;
        const title = @php echo json_encode($tests->slug); @endphp;
        const form = document.querySelector('.form-test')

        console.log(form)

        question.forEach((item, index) => {
            item.addEventListener('click', () => {
                formCheckIcon[index].classList.remove('far');
                formCheckIcon[index].classList.add('fas');
                formCheckIcon[index].style.color = '#ffa200';
            });
        });

        let countDown = time * 60;

        const timer = setInterval(() => {
            const minutes = Math.floor(countDown / 60);
            let seconds = countDown % 60;

            seconds = seconds < 10 ? '0' + seconds : seconds;

            timeDisplay.textContent = `${minutes}:${seconds}`;

            if (countDown === 0) {
                clearInterval(timer);
                form.submit();
            } else {
                countDown--;
            }
        }, 1000);

        window.addEventListener('beforeunload', function (e) {
            const data = {
                title: title,
                time: countDown,
                questions: []
            };

            question.forEach((item, index) => {
                const question = {
                    title: item.querySelector('span').textContent,
                    answers: []
                };

                item.querySelectorAll('input').forEach((input) => {
                    if (input.checked) {
                        question.answers.push(input.value);
                    }
                });

                data.questions.push(question);
            });

            localStorage.setItem(title, JSON.stringify(data));
        });

        window.addEventListener('load', function () {
            const data = JSON.parse(localStorage.getItem(title));

            if (data) {
                question.forEach((item, index) => {
                    item.querySelector('span').textContent = data.questions[index].title;

                    item.querySelectorAll('input').forEach((input, count) => {
                        if (data.questions[index].answers.includes(input.value)) {
                            input.checked = true;
                            formCheckIcon[index].classList.remove('far');
                            formCheckIcon[index].classList.add('fas');
                            formCheckIcon[index].style.color = '#ffa200';
                        }
                    });
                });

                countDown = data.time;
            }
        });
    </script>
@endpush
