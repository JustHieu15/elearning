@extends('layouts.admin')

@section('title')
    User
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 sm:ml-auto mr-auto max-w-4xl">
        <!-- Table -->
        <div class="p-2">
            <div class="realative overflow-x-auto mb-4  rounded-lg bg-gray-700">
                <table class="w-full text-sm text-left rtl:text-right text-white">
                    <thead class="text-xs text-white uppercase bg-gray-500 ">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            User ID
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            Name user
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            Role
                        </th>

                        <th scope="col" class="px-6 py-4 text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $index => $user)
                        @if($user->role_id == 1)
                            @continue
                        @endif

                        <tr class="odd:bg-gray-700 even:bg-gray-400">
                            <th scope="row" class="px-6 py-4 font-medium text-white  whitespace-nowrap ">
                                User {{ $index + 1 }}
                            </th>

                            <td class="px-6 py-4 text-center">
                                {{ $user->name }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                {{ $user->role_name }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.user.edit', $user->id) }}"
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
