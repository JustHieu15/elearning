@extends('layouts.admin')

@section('title')
    Question Create
@endsection

@section('content')
    <main class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <div class="container">
            <div class="flex flex-col w-full h-auto items-center p-4 rounded-lg bg-gray-700">
                <div class="content w-full" id="div1">
                    <form action="{{ route('admin.question.store') }}"
                          class="flex flex-col w-full h-auto items-center"
                          method="POST">
                        @csrf

                        <div class="bg-gray-700 w-full p-4 mt-3 rounded-b-lg mb-5">
                            <div class="max-w mx-auto">
                                <label for="courseID" class="block mb-2 text-white text-base font-semibold">
                                    Select a Subject
                                </label>

                                <select id="subjectId" name="subject_id"
                                        class="gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-500 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled selected>Select a Subject</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="question-form"></div>

                            <div class="flex space-x-4 justify-end w-full mt-5">
                                <button
                                    type="button"
                                    class="text-white bg-transparent border border-gray-500 hover:bg-red-500 font-medium rounded-lg text-lg px-12 py-1.5 mb-2"
                                    id="addQuestion">
                                    Add Question
                                </button>

                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                                        class="text-white bg-transparent border border-gray-500 hover:bg-red-500 font-medium rounded-lg text-lg px-12 py-1.5 mb-2">
                                    Cancel
                                </button>
                                <div id="popup-modal" tabindex="-1"
                                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none"
                                                 viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                 aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                you
                                                sure you
                                                want to cancel creating new test?</h3>
                                            <button data-modal-hide="popup-modal" type="button"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                No, cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit"
                                        class="text-white bg-orange-500 hover:bg-yellow-500 font-medium rounded-lg text-lg px-12 py-1.5 mb-2">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>
        const addQuestion = document.getElementById("addQuestion");
        const questionForm = document.getElementById("question-form");

        let questionNumber = 1;

        addQuestion.addEventListener("click", () => {
            let answerNumber = 1;
            let choice = questionNumber;

            const question = document.createElement("div");
            question.classList.add(
                "w-full",
                "h-auto",
                "py-5",
                "bg-gray-700",
                "border-b",
                "question-container",
            );

            question.innerHTML = /*html*/ `
                    <h2 class="text-white text-lg font-semibold">
                        Question ${questionNumber} <span class="remove-question cursor-pointer text-red-500">Remove</span>
                    </h2>
                    <div class="grid gap-6 mt-5 md:grid-cols-2">
                        <div class="col-span-6">
                            <label for="question" class="block mb-2 text-white text-base font-semibold">
                                Add question
                            </label>
                            <textarea id="question" name="question[]" class="bg-gray-700 border text-white text-sm rounded-lg outline-none block w-full p-2.5" placeholder="Question goes here"></textarea>
                        </div>
                        <div id="options-answer-${questionNumber}" class="col-span-6 options-answer">
                            <div class="mb-6 answer-container">
                                <div class="flex items-center mb-3 gap-3">
                                    <label for="choice_${questionNumber}_${answerNumber}" class="block text-white text-base font-semibold">
                                        Answer ${answerNumber} <span class="text-red-500">*</span>
                                    </label>
                                    <span class="remove-answer block cursor-pointer text-red-500">Remove</span>
                                </div>
                                <input type="text" id="choice_${questionNumber}_${answerNumber}" name="choice${choice}[]" class="bg-gray-700 border text-white text-sm rounded-lg outline-none block w-full p-2.5" placeholder="Ex: Paris"/>
                                <label class="text-white text-sm font-semibold mt-2 block">
                                    <input type="radio" name="correct_answer${choice}" value="0" class="mr-2">
                                    Correct answer
                                </label>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <button type="button" class="add-answer text-white bg-transparent border border-gray-500 hover:bg-red-500 font-medium rounded-lg text-lg px-12 py-1.5 mb-2">
                                Add Answer
                            </button>
                        </div>
                    </div>
                `;

            questionNumber++;
            questionForm.appendChild(question);
            updateQuestionNumbers();
        });

        questionForm.addEventListener("click", (e) => {
            if (e.target.classList.contains("remove-question")) {
                e.target.closest(".question-container").remove();
                updateQuestionNumbers();
            }

            if (e.target.classList.contains("remove-answer")) {
                const optionsAnswer = e.target.closest(".options-answer");
                e.target.closest(".answer-container").remove();
                updateAnswerNumbers(optionsAnswer);
            }

            if (e.target.classList.contains("add-answer")) {
                const optionsAnswer =
                    e.target.closest(".col-span-6").previousElementSibling;
                const questionId = optionsAnswer.id.split("-")[2];
                let answerNumber =
                    optionsAnswer.querySelectorAll(".answer-container")
                        .length + 1;

                const answer = document.createElement("div");
                answer.classList.add("mb-6", "answer-container");
                answer.innerHTML = /*html*/ `
                        <div class="flex items-center mb-3 gap-3">
                            <label for="choice_${questionId}_${answerNumber}" class="block text-white text-base font-semibold">
                                Answer ${answerNumber} <span class="text-red-500">*</span>
                            </label>
                            <span class="remove-answer block cursor-pointer text-red-500">Remove</span>
                        </div>
                        <input type="text" id="choice_${questionId}_${answerNumber}" name="choice${questionId}[]" class="bg-gray-700 border text-white text-sm rounded-lg outline-none block w-full p-2.5" placeholder="Ex: Paris"/>
                        <label class="text-white text-sm font-semibold mt-2 block">
                            <input type="radio" name="correct_answer${questionId}" value="${
                    answerNumber - 1
                }" class="mr-2">
                            Correct answer
                        </label>
                    `;

                optionsAnswer.appendChild(answer);
            }
        });

        function updateQuestionNumbers() {
            const questions = document.querySelectorAll(
                ".question-container",
            );
            questions.forEach((question, index) => {
                const questionNumber = index + 1;
                question.querySelector(
                    "h2",
                ).innerHTML = `Question ${questionNumber} <span class="remove-question cursor-pointer text-red-500">Remove</span>`;
                const optionsAnswer =
                    question.querySelector(".options-answer");
                optionsAnswer.id = `options-answer-${questionNumber}`;
                updateAnswerNumbers(optionsAnswer);
            });
        }

        function updateAnswerNumbers(optionsAnswer) {
            const answers =
                optionsAnswer.querySelectorAll(".answer-container");
            const questionId = optionsAnswer.id.split("-")[2];
            answers.forEach((answer, index) => {
                const answerNumber = index + 1;
                const label = answer.querySelector("label");
                label.setAttribute(
                    "for",
                    `choice_${questionId}_${answerNumber}`,
                );
                label.innerHTML = `Answer ${answerNumber} <span class="text-red-500">*</span>`;
                answer.querySelector(
                    "input[type='text']",
                ).id = `choice_${questionId}_${answerNumber}`;
                const radio = answer.querySelector("input[type='radio']");
                radio.value = index;
                radio.name = `correct_answer${questionId}`;
            });

            const newQuestionNumber = optionsAnswer.id.split("-")[2];
            answers.forEach((answer, index) => {
                const answerNumber = index + 1;
                answer.querySelector(
                    "input[type='text']",
                ).name = `choice${newQuestionNumber}[]`;
                answer.querySelector(
                    "input[type='radio']",
                ).name = `correct_answer${newQuestionNumber}`;
            });
        }
    </script>
@endpush
