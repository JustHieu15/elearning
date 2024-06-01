@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <div class="p-4">
            <!-- Dispalying general informaitons -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex flex-col items-center justify-center h-64 rounded-lg bg-gray-700 hover:bg-orange-500">
                    <div class="flex items-center justify-center rounded-full h-36 w-36  bg-orange-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="70%" width="70%" viewBox="0 0 640 512">
                            <path fill="#ffffff"
                                  d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/>
                        </svg>
                    </div>
                    <h2 class="text-white text-4xl font-bold mb-2">{{ $countStudents }}</h2>
                    <p class="text-white text-base font-semibold mb-2">Total Students</p>
                </div>
                <div class="flex flex-col items-center justify-center h-64 rounded-lg bg-gray-700 hover:bg-orange-500">
                    <div class="flex items-center justify-center rounded-full h-36 w-36 bg-orange-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="70%" width="70%" viewBox="0 0 576 512">
                            <path fill="#ffffff"
                                  d="M0 80v48c0 17.7 14.3 32 32 32H48 96V80c0-26.5-21.5-48-48-48S0 53.5 0 80zM112 32c10 13.4 16 30 16 48V384c0 35.3 28.7 64 64 64s64-28.7 64-64v-5.3c0-32.4 26.3-58.7 58.7-58.7H480V128c0-53-43-96-96-96H112zM464 480c61.9 0 112-50.1 112-112c0-8.8-7.2-16-16-16H314.7c-14.7 0-26.7 11.9-26.7 26.7V384c0 53-43 96-96 96H368h96z"/>
                        </svg>
                    </div>
                    <h2 class="text-white text-4xl font-bold mb-2">{{ $countCourses }}</h2>
                    <p class="text-white text-base font-semibold mb-2">Total Courses</p>
                </div>
                <div class="flex flex-col items-center justify-center h-64 rounded-lg bg-gray-700 hover:bg-orange-500">
                    <div class="flex items-center justify-center rounded-full h-36 w-36 bg-orange-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="60%" width="60%" viewBox="0 0 384 512">
                            <path fill="#ffffff"
                                  d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z"/>
                        </svg>
                    </div>
                    <h2 class="text-white text-4xl font-bold mb-2">{{ $countTests }}</h2>
                    <p class="text-white text-base font-semibold mb-2">Total Tests</p>
                </div>
            </div>
            <!-- Charts -->
{{--            <div class="grid grid-cols-2 gap-4 p- mb-4">--}}
{{--                <div class="flex items-center justify-center rounded-lg bg-gray-300 h-90">--}}
{{--                    <div class="py-6" id="donut-chart1"></div>--}}
{{--                </div>--}}
{{--                <div class="flex items-center justify-center rounded-lg bg-gray-300 h-90">--}}
{{--                    <div class="py-6" id="donut-chart2"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- Classes list -->
            @include('admin.blocks.class.list')
        </div>
    </div>
@endsection

@push('script')
@endpush
