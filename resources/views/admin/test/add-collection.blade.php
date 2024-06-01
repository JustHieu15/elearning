@extends('layouts.admin')

@section('title')
    Add Question to Collection
@endsection

@section('content')
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <div class="w-full h-auto rounded-lg p-4 bg-gray-700">
            <h2 class="text-white text-center text-base font-semibold">Create a new Test</h2>
        </div>

        <div class="flex space-x-4 py-2">
            <div class="w-1/2">
                <div class="w-full h-auto rounded-lg p-4 bg-gray-700">
                    <h3 class="text-white text-center text-base font-semibold">List of Collections</h3>

                    <div class="list-collection">
                        @foreach($collections as $collection)
                            @if($collection->checked == false)
                                <div class="form-collection p-2 border-b border-gray-600">
                                    <div class="collection-detail mb-3">
                                        <h4 class="text-white text-base font-semibold">{{ $collection->name }}</h4>
                                        <input type="hidden" name="collection_id" value="{{ $collection->id }}">
                                    </div>

                                    <button type="button"
                                            class="add-collection text-white bg-orange-500 hover:bg-orange-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                        Add to Test
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-1/2">
                <div class="w-full h-auto rounded-lg p-4 bg-gray-700">
                    <h3 class="text-white text-center text-base font-semibold">Selected Collections</h3>

                    <form action="{{ route('admin.test.store-collection') }}" class="p-2 form-group"
                          method="POST">
                        @csrf

                        <div class="selected-collections mb-5">
                            @foreach($collections as $collection)
                                @if($collection->checked == true)
                                    <div class="form-collection p-2 border-b border-gray-600">
                                        <div class="collection-detail mb-3">
                                            <h4 class="text-white text-base font-semibold">{{ $collection->name }}</h4>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                    class=" text-white bg-orange-500 hover:bg-orange-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                                Add Test Collection
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
        document.querySelectorAll('.list-collection').forEach((listCollection) => {
            listCollection.addEventListener('click', (e) => {
                const button = e.target.closest('button');

                if (button) {
                    const collection = e.target.closest('.form-collection');
                    const selectedQuestions = document.querySelector('.selected-collections');

                    const newQuestion = collection.cloneNode(true);
                    const newButton = newQuestion.querySelector('button');

                    newButton.textContent = 'Remove from Collection';
                    newButton.classList.remove('bg-orange-500');
                    newButton.classList.add('bg-red-500');

                    newButton.addEventListener('click', (e) => {
                        e.preventDefault();

                        newQuestion.remove();

                        listCollection.appendChild(collection);

                        if (selectedQuestions.children.length === 0) {
                            listCollection.querySelectorAll('button').forEach((button) => {
                                button.classList.remove('bg-gray-500', 'cursor-not-allowed');
                                button.classList.add('bg-orange-500', 'hover:bg-orange-700');
                                button.disabled = false;
                            });
                        }
                    });

                    selectedQuestions.appendChild(newQuestion);

                    collection.remove();

                    if (selectedQuestions.children.length > 0) {
                        listCollection.querySelectorAll('button').forEach((button) => {
                            button.classList.remove('bg-orange-500', 'hover:bg-orange-700');
                            button.classList.add('bg-gray-500', 'cursor-not-allowed');
                            button.disabled = true;
                        });
                    }
                }
            });
        });

        if (document.querySelector('.selected-collections').children.length > 0) {
            document.querySelectorAll('.list-collection button').forEach((button) => {
                button.classList.remove('bg-orange-500', 'hover:bg-orange-700');
                button.classList.add('bg-gray-500', 'cursor-not-allowed');
                button.disabled = true;
            });
        }
    </script>
@endpush
