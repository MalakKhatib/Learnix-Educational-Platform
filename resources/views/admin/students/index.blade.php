@extends('admin.layouts.app')

@section('title', __('messages.manage_students'))

@section('content')

<div class="admin-students-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="admin-students-header">

        <div class="admin-students-header-content">

            <div class="admin-students-header-icon">

                <i class="fas fa-user-graduate"></i>

            </div>

            <div>

                <div class="admin-small-label">

                    <i class="fas fa-users"></i>

                    {{ __('messages.user_management') }}

                </div>

                <h2>
                    {{ __('messages.manage_students') }}
                </h2>

                <p>
                    {{ __('messages.manage_students_description') }}
                </p>

            </div>

        </div>


        <div class="admin-students-badge">

            <i class="fas fa-graduation-cap"></i>

            {{ __('messages.students') }}

        </div>

    </div>



    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="admin-students-summary">

        <div class="admin-students-summary-icon">

            <i class="fas fa-user-graduate"></i>

        </div>

        <div>

            <span>
                {{ __('messages.total_students') }}
            </span>

            <strong>
                {{ $students->total() }}
            </strong>

        </div>


        <div class="admin-students-summary-note">

            <i class="fas fa-circle-check"></i>

            {{ __('messages.registered_students_on_platform') }}

        </div>

    </div>



    {{-- =====================================================
         SEARCH
    ====================================================== --}}

    <div class="admin-students-search-card">

        <form
            method="GET"
            action="/admin/students"
            class="admin-students-search-form">

            <div class="admin-students-search-input">

                <i class="fas fa-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="{{ __('messages.search_student_placeholder') }}">

            </div>


            <button
                type="submit"
                class="admin-students-search-btn">

                <i class="fas fa-search"></i>

                {{ __('messages.search') }}

            </button>


            @if(request('search'))

                <a
                    href="/admin/students"
                    class="admin-students-reset-btn">

                    <i class="fas fa-rotate-right"></i>

                    {{ __('messages.cancel_search') }}

                </a>

            @endif

        </form>

    </div>



    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <div class="admin-students-card">


        <div class="admin-students-card-header">

            <div>

                <div class="admin-table-label">

                    <i class="fas fa-list"></i>

                    {{ __('messages.student_list') }}

                </div>

                <h3>
                    {{ __('messages.registered_students') }}
                </h3>

            </div>


            <span class="admin-students-count">

                {{ $students->total() }}

                {{ __('messages.student') }}

            </span>

        </div>



        @if($students->count())


            <div class="admin-table-wrapper">

                <table class="admin-students-table">

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                {{ __('messages.student') }}
                            </th>

                            <th>
                                {{ __('messages.email') }}
                            </th>

                            <th>
                                {{ __('messages.phone_number') }}
                            </th>

                            <th>
                                {{ __('messages.university_id') }}
                            </th>

                            <th>
                                {{ __('messages.action') }}
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($students as $student)

                            <tr>

                                <td>

                                    <div class="admin-student-number">

                                        {{ $student->id }}

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-student-user">

                                        <div class="admin-student-avatar">

                                            {{ mb_substr(
                                                $student->name,
                                                0,
                                                1
                                            ) }}

                                        </div>

                                        <div>

                                            <strong>
                                                {{ $student->name }}
                                            </strong>

                                            <span>
                                                {{ __('messages.student') }}
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-student-email">

                                        <i class="fas fa-envelope"></i>

                                        {{ $student->email }}

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-student-phone">

                                        <i class="fas fa-phone"></i>

                                        {{ $student->phone ?? __('messages.not_specified') }}

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-student-university">

                                        <i class="fas fa-id-card"></i>

                                        {{ $student->university_id ?? __('messages.not_specified') }}

                                    </div>

                                </td>


                                <td>

                                    <form
                                        method="POST"
                                        action="/admin/students/{{ $student->id }}">

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="admin-student-delete-btn"
                                            onclick="return confirm('{{ __('messages.confirm_delete_student') }}')">

                                            <i class="fas fa-trash"></i>

                                            {{ __('messages.delete') }}

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


        @else


            <div class="admin-students-empty">

                <div class="admin-students-empty-icon">

                    <i class="fas fa-user-graduate"></i>

                </div>

                <h3>
                    {{ __('messages.no_students') }}
                </h3>

                <p>
                    {{ __('messages.no_students_matching_search') }}
                </p>

                @if(request('search'))

                    <a
                        href="/admin/students"
                        class="admin-students-empty-btn">

                        <i class="fas fa-users"></i>

                        {{ __('messages.show_all_students') }}

                    </a>

                @endif

            </div>

        @endif


    </div>



    {{-- =====================================================
         PAGINATION
    ====================================================== --}}

    @if($students->hasPages())

        <div class="admin-students-pagination">

            {{ $students->appends(
                request()->only('search')
            )->links() }}

        </div>

    @endif


</div>

@endsection
