@extends('layouts.admin')

@section('title')
    Test Create
@endsection

@section('content')
    <!-- Main Content -->
    <main class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <div class="container">
            <!-- Test's details -->
            <div class="flex flex-col">

                <div class="content w-full" id="div1">
                    <form action="{{ route('admin.test.store') }}"
                          class="flex flex-col w-full h-auto items-center"
                          method="POST">
                        @csrf

                        <div class="flex flex-col w-full h-auto items-center p-4 rounded-lg bg-gray-700">
                            <h1 class="text-white text-2xl font-bold">
                                Create a new test
                            </h1>

                            <div class="flex w-full justify-between items-center mt-5">
                                <h2 class="text-white text-base font-semibold">
                                    Your test's ID (Auto generated)
                                </h2>
                                <div class="w-full max-w-[16rem]">
                                    <div class="relative">
                                        <label for="npm-install-copy-button" class="sr-only">
                                            Label
                                        </label>
                                        <input id="npm-install-copy-button" type="text"
                                               class="col-span-6 bg-gray-700 border text-white text-sm rounded-lg outline-none block w-full p-2.5 "
                                               value="TEST {{ $testId }}" disabled readonly>
                                        <button data-copy-to-clipboard-target="npm-install-copy-button"
                                                data-tooltip-target="tooltip-copy-npm-install-copy-button"
                                                class="absolute end-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
                              <span id="default-icon">
                                 <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                      fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                 </svg>
                              </span>
                                            <span id="success-icon" class="hidden items-center">
                                 <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                 </svg>
                              </span>
                                        </button>
                                        <div id="tooltip-copy-npm-install-copy-button" role="tooltip"
                                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            <span id="default-tooltip-message">Copy to clipboard</span>
                                            <span id="success-tooltip-message" class="hidden">Copied!</span>
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-700 w-full p-4 -mt-3 rounded-b-lg mb-5">
                            <div class="max-w mx-auto">
                                <label for="courseID" class="block mb-2 text-white text-base font-semibold">
                                    Select a course
                                </label>

                                <select id="courseID" name="course_id"
                                        class="gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-500 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="0" disabled selected>Choose a course</option>

                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-5">
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="title" class="block mb-2 text-white text-base font-semibold">Add
                                            test's
                                            title</label>
                                        <input type="text" id="title" name="name"
                                               class="bg-gray-700 border text-white text-sm rounded-lg outline-none block w-full p-2.5"
                                               placeholder="Ex: Final exam Unit 1" required/>
                                    </div>

                                    <div>
                                        <label for="duration" class="block mb-2 text-white text-base font-semibold">Test's
                                            duration</label>
                                        <select id="duration" name="time_limit"
                                                class="bg-gray-700 border text-white text-base rounded-lg outline-none block w-full p-2.5">
                                            <option selected disabled>Duration</option>
                                            <option value="15">15 minutes</option>
                                            <option value="45">45 minutes</option>
                                            <option value="60">60 minutes</option>
                                            <option value="90">90 minutes</option>
                                            <option value="120">120 minutes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label for="testDesc" class="block mb-2 text-white text-base font-semibold">Add
                                        test's
                                        description</label>
                                    <textarea id="testDesc" rows="4" name="description"
                                              class="bg-gray-700 border  text-white text-base rounded-lg outline-none block w-full p-2.5"
                                              placeholder="Test's description goes here"></textarea>
                                </div>
                            </div>

                            <div class="flex space-x-4 justify-end w-full mt-3">
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

            <!-- Toolbar -->
            <div id="toolbar1" class="flex flex-col absolute bg-gray-700 rounded-lg w-10">
                <button data-tooltip-target="tooltip-top-1" data-tooltip-placement="top" type="button"
                        class="toolbar-item"
                        onclick="addDiv()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 448 512">
                        <path fill="#ffffff"
                              d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                    </svg>
                </button>
                <div id="tooltip-top-1" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 tooltip">
                    Add question
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-top-2" data-tooltip-placement="top" type="button"
                        class="toolbar-item"
                        onclick="deleteDiv()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512">
                        <path fill="#ffffff"
                              d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/>
                    </svg>
                </button>
                <div id="tooltip-top-2" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 tooltip">
                    Delete question
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-top-3" data-tooltip-placement="top" type="button"
                        class="toolbar-item"
                        onclick="function3()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512">
                        <path fill="#ffffff"
                              d="M128 64c0-35.3 28.7-64 64-64H352V128c0 17.7 14.3 32 32 32H512V448c0 35.3-28.7 64-64 64H192c-35.3 0-64-28.7-64-64V336H302.1l-39 39c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l39 39H128V64zm0 224v48H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H128zM512 128H384V0L512 128z"/>
                    </svg>
                </button>
                <div id="tooltip-top-3" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 tooltip">
                    Insert question
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-top-4" data-tooltip-placement="top" type="button"
                        class="toolbar-item"
                        onclick="moveUp()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="18" viewBox="0 0 384 512">
                        <path fill="#ffffff"
                              d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
                    </svg>
                </button>
                <div id="tooltip-top-4" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 tooltip">
                    Move up
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-top-5" data-tooltip-placement="top" type="button"
                        class="toolbar-item"
                        onclick="moveDown()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="18" viewBox="0 0 384 512">
                        <path fill="#ffffff"
                              d="M169.4 502.6c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 402.7 224 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 370.7L86.6 329.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128z"/>
                    </svg>
                </button>
                <div id="tooltip-top-5" role="tooltip"
                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 tooltip">
                    Move down
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>
        //Toolbar position
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.container');
            const toolbar1 = document.getElementById('toolbar1');

            container.addEventListener('click', function (event) {
                const clickedDiv = event.target.closest('.content');
                if (clickedDiv) {
                    const toolbarTop = toolbar1.getBoundingClientRect().top;
                    const divTop = clickedDiv.getBoundingClientRect().top;
                    const toolbarOffset = divTop - toolbarTop;
                    toolbar1.style.top = (toolbar1.offsetTop + toolbarOffset) + 'px'; // Update the toolbar position relative to the clicked div
                }
            });
        });

        //Generate new Question
        function addDiv() {
            const totalQuestions = document.querySelectorAll('.content').length;
            if (totalQuestions >= 50) {
                alert('Maximum limit of 50 questions reached.');
                return;
            }

            const newDiv = document.createElement('div');
            newDiv.className = 'content';
            const divCount = document.querySelectorAll('.content').length;
            const newDivId = `div${divCount + 1}`; // Generate a unique ID for the new div
            while (document.getElementById(newDivId)) {
                divCount++;
                newDivId = `div${divCount + 1}`
            }
            const answersContainerId = `answers-container-${divCount + 1}`;
            newDiv.id = newDivId;

            newDiv.innerHTML = `
               <!-- Question -->
               <div class="bg-gray-700 p-4 rounded-lg">
                  <h1 id="questionTitle" class="text-white font-bold text-2xl mb-2">
                     Question ${divCount}
                  </h1>
                  <form>
                     <div class="mb-2">
                        <label for="question" class="block mb-2 text-white text-base font-semibold">
                           Add question
                        </label>
                        <textarea id="question" rows="4" class="bg-gray-700 border text-white text-base rounded-lg outline-none h-20 block w-full p-2.5" placeholder="Question goes here"></textarea>
                     </div>
                     <div class="inline-flex rounded-md shadow-sm" role="group">
                        <button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-white" onclick="makeBold()">
                           <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512"><path fill="#ffffff" d="M0 64C0 46.3 14.3 32 32 32H80 96 224c70.7 0 128 57.3 128 128c0 31.3-11.3 60.1-30 82.3c37.1 22.4 62 63.1 62 109.7c0 70.7-57.3 128-128 128H96 80 32c-17.7 0-32-14.3-32-32s14.3-32 32-32H48V256 96H32C14.3 96 0 81.7 0 64zM224 224c35.3 0 64-28.7 64-64s-28.7-64-64-64H112V224H224zM112 288V416H256c35.3 0 64-28.7 64-64s-28.7-64-64-64H224 112z"/></svg>
                        </button>
                        <button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-white" onclick="makeItalic()">
                           <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5" viewBox="0 0 384 512"><path fill="#ffffff" d="M128 64c0-17.7 14.3-32 32-32H352c17.7 0 32 14.3 32 32s-14.3 32-32 32H293.3L160 416h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H90.7L224 96H160c-17.7 0-32-14.3-32-32z"/></svg>
                        </button>
                        <button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-white" onclick="makeUnderline()">
                           <svg xmlns="http://www.w3.org/2000/svg" height="18" width="14" viewBox="0 0 448 512"><path fill="#ffffff" d="M16 64c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H128V224c0 53 43 96 96 96s96-43 96-96V96H304c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H384V224c0 88.4-71.6 160-160 160s-160-71.6-160-160V96H48C30.3 96 16 81.7 16 64zM0 448c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32z"/></svg>
                        </button>
                        <button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-white" onclick="toggleDiv()">
                           <svg xmlns="http://www.w3.org/2000/svg" height="20" width="16" viewBox="0 0 512 512"><path fill="#ffffff" d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg>
                        </button>
                     </div>
                     <div id="dropzone-container" class="hidden mt-2">
                        <div class="flex items-center justify-center w-full">
                           <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-700 hover:bg-gray-500">
                              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                 <svg xmlns="http://www.w3.org/2000/svg" height="25" width="30" viewBox="0 0 640 512"><path fill="#ffffff" d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/></svg>
                                    <p class="my-2 text-sm text-white dark:text-gray-400"><span class="font-semibold">
                                       Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-white dark:text-gray-400">
                                       SVG, PNG, JPG or GIF (MAX. 800x400px)
                                    </p>
                              </div>
                              <input id="dropzone-file" type="file" class="hidden" />
                           </label>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="bg-gray-700 p-4 -mt-3 rounded-b-lg mb-4">
                  <h2 class="text-white font-bold text-xl mb-2">
                     Answers
                  </h2>
                  <form id="answers-form">
                     <!-- <div id="answers-container"> -->
                     <div id="${answersContainerId}">
                        <div class="flex items-center mb-4">
                           <input id="disabled-radio-1" type="radio" value="1" name="correct-answer" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                           <label for="disabled-radio-1" class="ms-2 text-sm font-medium text-gray-400 w-10/12">
                              <input type="text" name="answers[]" rows="4" class="bg-gray-700 border border-gray-500 text-white text-base rounded-lg outline-none h-auto block w-full p-2.5" placeholder="Answer goes here">
                           </label>
                           <button type="button" onclick="removeAnswer(1)" class="text-gray-500 hover:text-red-500 ml-2 focus:outline-none">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                              </svg>
                           </button>
                        </div>
                     </div>
                     <button type="button" onclick="addAnswer(event, '${answersContainerId}')" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg">
                        Add Answer
                        </button>
                     <button type="button" onclick="defineCorrectAnswer()" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-lg ml-4">
                        Choose Correct Answer
                     </button>
                  </form>
               </div>
               `;

            const container = document.querySelector('.container');
            container.appendChild(newDiv);
        }

        //Delete chosen question
        function deleteDiv(event) {
            const divs = document.querySelectorAll('.content');
            const toolbarTop = document.getElementById('toolbar1').getBoundingClientRect().top;

            divs.forEach((div, index) => {
                const divTop = div.getBoundingClientRect().top;
                if (Math.abs(toolbarTop - divTop) < 5 && index !== 0) { // Exclude the first div from deletion
                    div.remove(); // Remove the corresponding div
                }
            });

            // Update the text content of the remaining divs excluding the first div
            const updatedDivs = document.querySelectorAll('.content');
            updatedDivs.forEach((div, index) => {

                if (index !== 0) {
                    const h1Tag = div.querySelector('#questionTitle');
                    if (h1Tag !== 0) {
                        h1Tag.textContent = `Question ${index}`
                    }
                }
            });
        }

        function moveUp(event) {
            const divs = document.querySelectorAll('.content');
            const toolbarTop = document.getElementById('toolbar1').getBoundingClientRect().top;

            let selectedDiv = null;
            divs.forEach((div, index) => {
                const divTop = div.getBoundingClientRect().top;
                if (Math.abs(toolbarTop - divTop) < 5 && index !== 0) { // Exclude the first div
                    selectedDiv = div;
                }
            });

            if (selectedDiv) {
                const prevDiv = selectedDiv.previousElementSibling;
                if (prevDiv) {
                    selectedDiv.parentNode.insertBefore(selectedDiv, prevDiv); // Move the selected div up
                    updateDivTextContent();
                }
            }
        }

        function moveDown(event) {
            const divs = document.querySelectorAll('.content');
            const toolbarTop = document.getElementById('toolbar1').getBoundingClientRect().top;

            for (let i = divs.length - 1; i >= 0; i--) {
                const div = divs[i];
                const divTop = div.getBoundingClientRect().top;
                if (Math.abs(toolbarTop - divTop) < 5 && i !== divs.length - 1 && i !== 0) { // Exclude the last and first div
                    const nextDiv = divs[i + 1];
                    if (nextDiv) {
                        div.parentNode.insertBefore(nextDiv, div); // Move the div down
                        updateDivTextContent();
                    }
                }
            }
        }

        function updateDivTextContent() {
            const updatedDivs = document.querySelectorAll('.content');
            updatedDivs.forEach((div, index) => {
                if (index !== 0) {
                    const questionTitle = div.querySelector('#questionTitle');
                    if (questionTitle) {
                        questionTitle.textContent = `Question ${index}`;
                    }
                }
            });
        }


        //Answer funcion
        function addAnswer(event, answersContainerId) {
            const answersContainer = document.getElementById(answersContainerId);
            const totalAnswers = answersContainer.childElementCount;
            if (totalAnswers >= 4) {
                alert('Maximum limit of 4 answers reached.');
                return;
            }
            const inputContainer = document.createElement('div');
            inputContainer.classList.add('flex', 'items-center', 'mb-4');
            const inputId = answersContainer.childElementCount + 1;
            inputContainer.innerHTML = `
                <input id="disabled-radio-${inputId}" type="radio" value="${inputId}" name="correct-answer" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="disabled-radio-${inputId}" class="ms-2 text-sm font-medium text-gray-400 w-10/12">
                   <input type="text" name="answers[]" rows="4" class="bg-gray-700 border border-gray-500 text-white text-base rounded-lg outline-none h-auto block w-full p-2.5" placeholder="Answer goes here">
                </label>
                <button type="button" onclick="removeAnswer(${inputId})" class="text-gray-500 hover:text-red-500 ml-2 focus:outline-none">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                   </svg>
                </button>
             `;

            answersContainer.appendChild(inputContainer);
        }

        function removeAnswer(id) {
            const inputContainer = document.getElementById(`disabled-radio-${id}`).closest('.flex');
            inputContainer.remove();
        }

        function defineCorrectAnswer() {
            const form = document.getElementById('answers-form');
            const radios = form.elements['correct-answer'];
            let isAnyChecked = false;
            for (let i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    isAnyChecked = true;
                    break;
                }
            }
            if (!isAnyChecked) {
                alert('Please select a correct answer!');
                return;
            }

            let correctAnswerValue = '';
            for (let i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    correctAnswerValue = radios[i].value;
                    break;
                }
            }
            console.log('Correct answer is: ', correctAnswerValue);
        }

        //Text-funciton
        function makeBold() {
            var textarea = document.getElementById("question");
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var selectedText = textarea.value.substring(start, end);
            var newText = textarea.value.substring(0, start) + "<b>" + selectedText + "</b>" + textarea.value.substring(end);
            textarea.value = newText;
        }

        function makeItalic() {
            var textarea = document.getElementById("question");
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var selectedText = textarea.value.substring(start, end);
            var newText = textarea.value.substring(0, start) + "<i>" + selectedText + "</i>" + textarea.value.substring(end);
            textarea.value = newText;
        }

        function makeUnderline() {
            var textarea = document.getElementById("question");
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var selectedText = textarea.value.substring(start, end);
            var newText = textarea.value.substring(0, start) + "<u>" + selectedText + "</u>" + textarea.value.substring(end);
            textarea.value = newText;
        }

        //Picture uploading
        function toggleDiv() {
            var dropzoneDiv = document.getElementById("dropzone-container");
            dropzoneDiv.classList.toggle("hidden");
        }
    </script>
@endpush
