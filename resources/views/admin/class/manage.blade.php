@extends('layouts.admin')

@section('title')
    Manage Class
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <div class="p-2">
            <form class="max-w-md mx-auto">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                           class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-400 focus:border-orange-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           placeholder="Search student"/>
                    <button type="button"
                            class="text-white absolute end-2.5 bottom-2.5 bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 ">
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Class Information -->
        <div class="p-2">
            <div class="flex flex-col justify-start w-full h-auto rounded-lg p-4 bg-gray-700 text-white text-base">
                <h2 class="font-bold uppercase text-center">Class's informaiton</h2>
                <p class="font-semibold">Name:
                    <span class="font-normal">{{ $class->name }}</span>
                </p>

                <p class="font-semibold">Class's ID:
                    <span class="uppercase font-normal">class {{ $class->id }}</span>
                </p>

                <p class="font-semibold">Semester:
                    <span class="font-normal">{{ $class->semester_name }}</span>
                </p>

                <p class="font-semibold">School year:
                    <span class="uppercase font-normal">
                        {{ $class->start_date }} - {{ $class->end_date }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Create Course button -->
        <div class="p-2">
            <div class="flex w-full h-auto justify-between items-center rounded-lg p-4 bg-gray-700">
                <h2 class="text-white text-base font-semibold">Create a new course</h2>
                <a href="{{ route('admin.course.create', $class->slug) }}">
                    <button type="button"
                            class=" text-white bg-orange-500 hover:bg-orange-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <h3>Create&#160&#160</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512">
                            <path fill="#ffffff"
                                  d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>

        <!-- Courses list table -->
        <div class="p-2">
            <div class="realative overflow-x-auto  rounded-lg bg-gray-700">
                <table class="w-full text-sm text-left rtl:text-right text-white">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-50 bg-gray-700 ">
                        Courses list
                        <p class="mt-1 text-sm font-normal text-gray-300 ">The 'Your Courses' table gives teachers an
                            overview of their assigned classes, displaying key details like course names, subjects, and
                            schedules for efficient management.</p>
                    </caption>
                    <thead class="text-xs text-white uppercase bg-gray-500 ">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            Course id
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            Course name
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            Subject
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($courses as $course)
                        <tr class="odd:bg-gray-700 even:bg-gray-400">
                            <th scope="row" class="px-6 py-4 font-medium text-white  whitespace-nowrap ">
                                Course {{ $course->id }}
                            </th>

                            <td class="px-6 py-4 text-center uppercase">
                                {{ $course->name }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                {{ $course->subject_name }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.course.show', $course->slug) }}"
                                   class="font-medium text-orange-500 hover:underline me-4">
                                    View
                                </a>

                                <a href="{{ route('admin.course.edit', $course->slug) }}"
                                   class="font-medium text-orange-500 hover:underline">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Student list table -->
        {{--        <div class="p-2">--}}
        {{--            <div class="realative overflow-x-auto mb-4  rounded-lg bg-gray-700">--}}
        {{--                <table class="w-full text-sm text-left rtl:text-right text-white">--}}
        {{--                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-50 bg-gray-700 ">--}}
        {{--                        Students list--}}
        {{--                        <p class="mt-1 text-sm font-normal text-gray-300 ">Track your students' progress, grades, and--}}
        {{--                            engagement with ease. Stay connected and informed with a glance at your Student List.</p>--}}
        {{--                    </caption>--}}
        {{--                    <thead class="text-xs text-white uppercase bg-gray-500 ">--}}
        {{--                    <tr>--}}
        {{--                        <th scope="col" class="px-6 py-4">--}}
        {{--                            Student name--}}
        {{--                        </th>--}}
        {{--                        <th scope="col" class="px-6 py-4 text-center">--}}
        {{--                            student id--}}
        {{--                        </th>--}}
        {{--                        <th scope="col" class="px-6 py-4 text-center">--}}
        {{--                            email--}}
        {{--                        </th>--}}
        {{--                        <th scope="col" class="px-6 py-4 text-center">--}}
        {{--                            Date of birth--}}
        {{--                        </th>--}}
        {{--                        <th scope="col" class="pl-8 py-4">--}}
        {{--                            <a href="#" class="hover:underline hover:text-blue-500"></a>--}}
        {{--                        </th>--}}
        {{--                    </tr>--}}
        {{--                    </thead>--}}
        {{--                    <tbody>--}}
        {{--                    <tr class="odd:bg-gray-700 even:bg-gray-400">--}}
        {{--                        <th scope="row" class="px-6 py-4 font-medium text-white  whitespace-nowrap ">--}}
        {{--                            John Statham--}}
        {{--                        </th>--}}
        {{--                        <td class="px-6 py-4 text-center uppercase">--}}
        {{--                            STUNO1--}}
        {{--                        </td>--}}
        {{--                        <td class="px-6 py-4 text-center">--}}
        {{--                            example@gmail.com--}}
        {{--                        </td>--}}
        {{--                        <td class="px-6 py-4 text-center">--}}
        {{--                            (dd/mm/yyyy)--}}
        {{--                        </td>--}}
        {{--                        <td class="px-6 py-4 text-center">--}}
        {{--                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"--}}
        {{--                                    class="text-orange-500 hover:underline font-medium rounded-lg text-sm text-center"--}}
        {{--                                    type="button">--}}
        {{--                                Delete--}}
        {{--                            </button>--}}
        {{--                            <div id="popup-modal" tabindex="-1"--}}
        {{--                                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">--}}
        {{--                                <div class="relative p-4 w-full max-w-md max-h-full">--}}
        {{--                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">--}}
        {{--                                        <button type="button"--}}
        {{--                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"--}}
        {{--                                                data-modal-hide="popup-modal">--}}
        {{--                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"--}}
        {{--                                                 fill="none" viewBox="0 0 14 14">--}}
        {{--                                                <path stroke="currentColor" stroke-linecap="round"--}}
        {{--                                                      stroke-linejoin="round" stroke-width="2"--}}
        {{--                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>--}}
        {{--                                            </svg>--}}
        {{--                                            <span class="sr-only">Close modal</span>--}}
        {{--                                        </button>--}}
        {{--                                        <div class="p-4 md:p-5 text-center">--}}
        {{--                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"--}}
        {{--                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"--}}
        {{--                                                 viewBox="0 0 20 20">--}}
        {{--                                                <path stroke="currentColor" stroke-linecap="round"--}}
        {{--                                                      stroke-linejoin="round" stroke-width="2"--}}
        {{--                                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>--}}
        {{--                                            </svg>--}}
        {{--                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are--}}
        {{--                                                you sure you want to delete this student?</h3>--}}
        {{--                                            <button data-modal-hide="popup-modal" type="button"--}}
        {{--                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">--}}
        {{--                                                Yes, I'm sure--}}
        {{--                                            </button>--}}
        {{--                                            <button data-modal-hide="popup-modal" type="button"--}}
        {{--                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">--}}
        {{--                                                No, cancel--}}
        {{--                                            </button>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                    </tbody>--}}
        {{--                </table>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
@endsection

@push('script')
@endpush
