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
                    Class ID
                </th>
                <th scope="col" class="px-6 py-4 text-center">
                    Name
                </th>
                <th scope="col" class="px-6 py-4 text-center">
                    Students amount
                </th>
                <th scope="col" class="px-6 py-4 text-center">
                    Semester
                </th>
                <th scope="col" class="px-6 py-4 text-center">
                    School year
                </th>
                <th scope="col" class="px-6 py-4 text-center">
                    @if (request()->routeIs('admin.dashboard'))
                        <a href="{{ route('admin.class.index') }}" class="hover:underline hover:text-blue-300">See all</a>
                    @else
                        Action
                    @endif
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($classes as $index => $class)
                <tr class="odd:bg-gray-700 even:bg-gray-400">
                    <th scope="row" class="px-6 py-4 font-medium text-white  whitespace-nowrap ">
                        CLASS {{ $index + 1 }}
                    </th>
                    <td class="px-6 py-4 text-center">
                        {{ $class->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $class->number_student }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if (empty($class->semester))
                            {{ $class->semester_name }}
                        @else
                            {{ $class->semester->name }}
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @foreach($schools as $school)
                            @if($school->id == $class->school_year_id)
                                {{ $school->start }} - {{ $school->end }}
                            @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.class.manage', $class->slug) }}"
                           class="font-medium text-orange-500 hover:underline">Manage</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
