@extends('layouts.admin')

@section('title')
    Test
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <!-- Create Class button -->
        <div class="p-2">
            <div class="flex w-full h-auto justify-between items-center rounded-lg p-4 bg-gray-700">
                <h2 class="text-white text-base font-semibold">Create a new Test</h2>
                <a href="{{ route('admin.test.create') }}">
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

        <!--Test Session -->
        @include('admin.blocks.search')

        <!-- Classes list table -->
        <div class="p-2">
            <div class="realative overflow-x-auto mb-4  rounded-lg bg-gray-700">

                <div class="mt-4">
                    <form class="max-w-md mx-auto">
                        <label for="default-search"
                               class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                   class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 f"
                                   placeholder="Search with Test's, Course's ID" required/>
                            <button type="submit"
                                    class="text-white absolute end-2.5 bottom-2.5 bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 ">
                                Search
                            </button>
                        </div>
                    </form>
                </div>

                <table class="w-full text-sm text-left rtl:text-right text-white">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-50 bg-gray-700 ">
                        Your tests list
                        <p class="mt-1 text-sm font-normal text-gray-300 ">The 'Test List' displays all assessments
                            within
                            your courses. Quickly access test details and student performance to streamline grading and
                            monitor
                            progress.</p>
                    </caption>
                    <thead class="text-xs text-white uppercase bg-gray-500 ">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            test ID
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">
                            course name
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">
                            Questions amount
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">
                            Time limit
                        </th>
                        <th scope="col" class="px-6 py-4 text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tests as $key => $test)
                        <tr class="odd:bg-gray-700 even:bg-gray-400">
                            <th scope="row" class="px-6 py-4 font-medium text-white  whitespace-nowrap uppercase">
                                TESTNO {{ $key + 1 }}
                            </th>

                            <td class="px-6 py-4 text-center uppercase">
                                {{ $test->course_name }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                50
                            </td>

                            <td class="px-6 py-4 text-center">
                                {{ $test->time_limit }} minutes
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.test.add-collection', $test->slug) }}"
                                   class="font-medium text-orange-500 hover:underline me-4">
                                    Add Collection
                                </a>

                                <a href="{{ route('admin.test.edit', $test->slug) }}"
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
    </div>
@endsection

@push('script')
@endpush
