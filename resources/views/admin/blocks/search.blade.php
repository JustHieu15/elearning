<div class="p-2">
    <div class="flex w-full h-auto justify-between items-center rounded-lg p-4 bg-gray-700">
        <h2 class="text-white text-base font-semibold">
            Choose

            @if (request()->routeIs('admin.class.*'))
                class
            @elseif (request()->routeIs('admin.course.*'))
                course
            @elseif (request()->routeIs('admin.test.*'))
                test
            @endif

            session
        </h2>

        <div>
            <form class="max-w-xl mx-auto" action="{{ route('admin.class.search') }}" method="GET">
                <div class="flex flex-row text-white">
                    <!-- Choose semester -->
                    <label for="semester" class="sr-only">Choose semester</label>
                    <select id="semester" name="semester_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-s-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-80% p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" selected disabled>Choose semester</option>
                        @foreach($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                        @endforeach
                    </select>

                    <!-- Choose year -->
                    <label for="start_date" class="sr-only">Choose start year</label>
                    <select id="start_date" name="start_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" selected disabled>Choose start year</option>
                        @foreach($schools as $school)
                            <option value="{{ $school->start_date }}">{{ $school->start }}</option>
                        @endforeach
                    </select>

                    <label for="end_date" class="sr-only">Choose end year</label>
                    <select id="end_date" name="end_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" selected disabled>Choose end year</option>
                        @foreach($schools as $school)
                            <option value="{{ $school->end_date }}">{{ $school->end }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        const form = document.querySelector('form');
        const semester = document.getElementById('semester');
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
        });

        const submitForm = () => {
            if (semester.value !== '0' && startDate.value !== '0' && endDate.value !== '0') {
                form.submit();
            }
        }

        semester.addEventListener('change', () => {
            submitForm();
        });

        startDate.addEventListener('change', () => {
            submitForm();
        });

        endDate.addEventListener('change', () => {
            submitForm();
        });
    </script>
@endpush
