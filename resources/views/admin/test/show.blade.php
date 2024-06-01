@extends('layouts.admin')

@section('title')
    Show Course
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <div class="p-2">
            <div class="flex flex-col w-full h-auto items-center rounded-lg p-4 mb-2 bg-gray-700">
                <h1 class="text-white text-xl font-bold">Show your test</h1>

                <div class="flex flex-col w-full h-auto items-center">
                    <div class="flex w-full justify-between items-center mt-5">
                        <!-- Class ID -->
                        <h2 class="text-white text-base font-semibold">Your test's ID (Auto generated)</h2>
                        <div class="w-full max-w-[16rem]">
                            <div class="relative">
                                <label for="npm-install-copy-button" class="sr-only">Label</label>
                                <input id="npm-install-copy-button" type="text"
                                       class="col-span-6 bg-gray-700 border text-white text-sm rounded-lg outline-none block w-full p-2.5 uppercase"
                                       value="TEST {{ $test->id }}" disabled readonly>
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
                        <h2 class="text-white text-base font-semibold">Your course's name</h2>
                        <div class="w-full max-w-[16rem]">
                            <div class="relative">
                                <input type="text" id="class_name" disabled
                                       class=" bg-gray-700 border text-white text-sm rounded-lg block w-64 p-2.5"
                                       placeholder="Ex: Unit 1" value="{{ $test->name }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2">
                <div class="realative overflow-x-auto mb-4  rounded-lg bg-gray-700">
                    <table class="w-full text-sm text-left rtl:text-right text-white">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-50 bg-gray-700 ">
                            Test list
                            <p class="mt-1 text-sm font-normal text-gray-300 ">The 'Your test list' table gives teachers
                                an overview of their assigned classes, displaying key details like course names, subjects,
                                and schedules for efficient management.</p>
                        </caption>
                        <thead class="text-xs text-white uppercase bg-gray-500 ">
                        <tr>
                            <th scope="col" class="px-6 py-4">
                                User id
                            </th>

                            <th scope="col" class="px-6 py-4 text-center">
                                name user
                            </th>

                            <th scope="col" class="px-6 py-4 text-center">
                                Result
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($testUsers as $index => $user)
                            <tr class="odd:bg-gray-700 even:bg-gray-400">
                                <th scope="row" class="px-6 py-4 font-medium text-white  whitespace-nowrap ">
                                    User {{ $index + 1}}
                                </th>

                                <td class="px-6 py-4 text-center uppercase">
                                    {{ $user->user_name }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    {{ $user->result }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
