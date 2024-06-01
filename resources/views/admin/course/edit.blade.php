@extends('layouts.admin')

@section('title')
    Edit Course
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <div class="p-2">
            <div class="flex flex-col w-full h-auto items-center rounded-lg p-4 mb-2 bg-gray-700">
                <h1 class="text-white text-xl font-bold">Edit your course</h1>

                <form action="{{ route('admin.course.update', $course->slug) }}" class="flex flex-col w-full h-auto items-center"
                      method="POST">
                    @method('PATCH')
                    @csrf

                    <div class="flex w-full justify-between items-center mt-5">
                        <!-- Class ID -->
                        <h2 class="text-white text-base font-semibold">Your course's ID (Auto generated)</h2>
                        <div class="w-full max-w-[16rem]">
                            <div class="relative">
                                <label for="npm-install-copy-button" class="sr-only">Label</label>
                                <input id="npm-install-copy-button" type="text"
                                       class="col-span-6 bg-gray-700 border text-white text-sm rounded-lg outline-none block w-full p-2.5 uppercase"
                                       value="COURSE {{ $course->id }}" disabled readonly>
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

                    <div class="flex justify-between w-full items-center mt-3">
                        <h2 class="text-white text-base font-semibold">Change your course's name</h2>
                        <div class="w-full max-w-[16rem]">
                            <div class="relative">
                                <input type="text" id="class_name" name="name"
                                       class=" bg-gray-700 border text-white text-sm rounded-lg block w-64 p-2.5"
                                       placeholder="Ex: Unit 1" value="{{ $course->name }}"/>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between w-full items-center mt-3">
                        <h2 class="text-white text-base font-semibold">Choose subject</h2>
                        <div class="w-full max-w-[16rem]">
                            <div class="relative">
                                <select id="subject" name="subject_id" disabled
                                        class="bg-gray-700 border text-white text-sm rounded-lg block w-64 p-2.5">
                                    <option value="{{ $course->subject_id }}">{{ $course->subject_name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 justify-end w-full mt-3">
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                                class="text-white bg-transparent border border-gray-500 hover:bg-red-500 font-medium rounded-lg text-lg px-12 py-1.5 mb-2">
                            Delete
                        </button>

                        <button data-modal-target="popup-modal-1" data-modal-toggle="popup-modal-1" type="submit"
                                class="text-white bg-orange-500 hover:bg-yellow-500 font-medium rounded-lg text-lg px-12 py-1.5 mb-2">
                            Save
                        </button>
                    </div>
                </form>
            </div>

            <div id="popup-modal" tabindex="-1"
                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure
                                you want to delete this course?</h3>
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
            </div>

            <div id="stage-details-container"
                 class="flex flex-col justify-start w-full h-auto rounded-lg p-4 mb-2 bg-gray-700 text-white">
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
