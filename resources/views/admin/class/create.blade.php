@extends('layouts.admin')

@section('title')
    Create Class
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <!--Class Session -->
        <div class="p-2">
            <div class="flex flex-col w-full h-auto items-center rounded-lg p-4 bg-gray-700">
                <h1 class="text-white text-xl font-bold">Create your new class</h1>

                <form action="{{ route('admin.class.store') }}" class="flex flex-col w-full h-auto items-center"
                      method="POST">
                    @csrf

                    <div class="flex w-full justify-between items-center mt-5">
                        <!-- Class ID -->
                        <h2 class="text-white text-base font-semibold">Your class's ID (Auto generated)</h2>
                        <div class="w-full max-w-[16rem]">
                            <div class="relative">
                                <label for="npm-install-copy-button" class="sr-only">Label</label>
                                <input id="npm-install-copy-button" type="text"
                                       class="col-span-6 bg-gray-700 border text-white text-sm rounded-lg outline-none block w-full p-2.5 "
                                       value="CLASS {{ $class->id }}" disabled readonly>
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

                    <!-- Insert Class's name -->
                    <div class="flex w-full justify-between items-center mt-3">
                        <h2 class="text-white text-base font-semibold">Insert your class's name</h2>
                        <div class="w-full max-w-[16rem]">
                            <div class="relative">
                                <input type="text" id="class_name" name="name"
                                       class="col-span-6 bg-gray-700 border text-white text-sm rounded-lg block w-full p-2.5"
                                       placeholder="Ex: 10A1 Math"/>
                            </div>
                        </div>
                    </div>

                    <!-- Insert Number of Students -->
                    <div class="flex w-full justify-between items-center mt-3">
                        <h2 class="text-white text-base font-semibold">Insert number of students</h2>
                        <div class="w-full max-w-[16rem]">
                            <div class="relative">
                                <input type="text" id="class_name" name="number_of_students"
                                       class="col-span-6 bg-gray-700 border text-white text-sm rounded-lg block w-full p-2.5"
                                       placeholder="Ex: 20"/>
                            </div>
                        </div>
                    </div>

                    <!-- Insert Class's Subject -->
                    <div class="flex w-full justify-between items-center mt-3 ">
                        <h2 class="text-white text-base font-semibold">Choose semester</h2>

                        <div class="flex flex-row text-white">
                            <label for="semester" class="sr-only">Choose semester</label>
                            <select id="semester" name="school_year_id"
                                    class="col-span-6 bg-gray-700 border text-white text-sm rounded-lg block w-full p-2.5">
                                <option selected disabled>Choose semester</option>
                                @foreach($schoolYear as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center justify-end w-full mt-3">
                        <button type="submit"
                                class="text-white bg-orange-500 hover:bg-yellow-500 font-medium rounded-lg text-lg px-12 py-1.5 mb-2">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
