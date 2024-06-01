@extends('layouts.admin')

@section('title')
    Semester
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <!-- Create Class button -->
        <div class="p-2">
            <div class="flex w-full h-auto justify-between items-center rounded-lg p-4 bg-gray-700">
                <h2 class="text-white text-base font-semibold">Create a new semester</h2>
                <a href="{{ route('admin.semester.create') }}">
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

        <!-- Table -->
        <div class="p-2">
            <div class="realative overflow-x-auto mb-4  rounded-lg bg-gray-700">
                <table class="w-full text-sm text-left rtl:text-right text-white">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-50 bg-gray-700 ">
                        Your classes list
                        <p class="mt-1 text-sm font-normal text-gray-300 ">The 'Your classes list' table summarizes all
                            classes assigned to the teacher, displaying key information like class names, subjects, and
                            timings. It helps teachers manage their teaching responsibilities efficiently.
                        </p>
                    </caption>

                    <thead class="text-xs text-white uppercase bg-gray-500 ">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            Semester ID
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            Name semester
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            School year
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($schools as $index => $school)
                        <tr class="odd:bg-gray-700 even:bg-gray-400">
                            <th scope="row" class="px-6 py-4 font-medium text-white  whitespace-nowrap ">
                                CLASS {{ $index + 1 }}
                            </th>

                            <td class="px-6 py-4 text-center">
                                @foreach($semesters as $semester)
                                    @if($semester->id == $school->semester_id)
                                        {{ $semester->name }}
                                    @endif
                                @endforeach
                            </td>

                            <td class="px-6 py-4 text-center">
                                {{ $school->start }} - {{ $school->end }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.semester.edit', $school->id) }}"
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
