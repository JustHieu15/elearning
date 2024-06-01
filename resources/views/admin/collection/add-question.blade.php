@extends('layouts.admin')

@section('title')
    Add Question to Collection
@endsection

@section('content')
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <div class="w-full h-auto rounded-lg p-4 bg-gray-700">
            <h2 class="text-white text-center text-base font-semibold">Create a new Collection and Add Questions</h2>
        </div>

        <div class="flex space-x-4 py-2">
            <div class="w-1/2">
                <div class="w-full h-auto rounded-lg p-4 bg-gray-700">
                    <h3 class="text-white text-center text-base font-semibold">List of Questions</h3>

                    <div class="list-question">
                        @foreach($questions as $question)
                            @if($question->checked == false)
                                <div class="form-question p-2 border-b border-gray-600">
                                    <div class="question-detail mb-3">
                                        <h4 class="text-white text-base font-semibold">{{ $question->title }}</h4>
                                        <input type="hidden" name="question_id[]" value="{{ $question->id }}">
                                    </div>

                                    <button type="button"
                                            class="add-collection text-white bg-orange-500 hover:bg-orange-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                        Add to Collection
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-1/2">
                <div class="w-full h-auto rounded-lg p-4 bg-gray-700">
                    <h3 class="text-white text-center text-base font-semibold">Selected Questions</h3>

                    <form action="{{ route('admin.collection.store-question') }}" class="p-2 form-group"
                          method="POST">
                        @csrf

                        <div class="selected-questions mb-5">
                            @foreach($questions as $question)
                                @if($question->checked == true)
                                    <div class="form-question p-2 border-b border-gray-600">
                                        <div class="question-detail mb-3">
                                            <h4 class="text-white text-base font-semibold">{{ $question->title }}</h4>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                    class=" text-white bg-orange-500 hover:bg-orange-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">

                                <p>Add Question to Collection&#160&#160</p>

                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                                    <path fill="#ffffff"
                                          d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.querySelectorAll('.list-question').forEach((listQuestion) => {
            listQuestion.addEventListener('click', (e) => {
                const button = e.target.closest('button');

                if (button) {
                    const question = e.target.closest('.form-question');
                    const selectedQuestions = document.querySelector('.selected-questions');

                    const newQuestion = question.cloneNode(true);
                    const newButton = newQuestion.querySelector('button');

                    newButton.textContent = 'Remove from Collection';
                    newButton.classList.remove('bg-orange-500');
                    newButton.classList.add('bg-red-500');

                    newButton.addEventListener('click', (e) => {
                        e.preventDefault();

                        newQuestion.remove();

                        listQuestion.appendChild(question);
                    });

                    selectedQuestions.appendChild(newQuestion);

                    question.remove();
                }
            });
        });
    </script>
@endpush
