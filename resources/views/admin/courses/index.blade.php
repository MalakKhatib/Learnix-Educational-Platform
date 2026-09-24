@extends('admin.layouts.app')

@section('title', __('messages.manage_courses'))

@section('content')

<div class="admin-courses-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="admin-courses-header">

        <div class="admin-courses-header-content">

            <div class="admin-courses-header-icon">

                <i class="fas fa-book-open"></i>

            </div>

            <div>

                <div class="admin-small-label">

                    <i class="fas fa-layer-group"></i>

                    {{ __('messages.content_management') }}

                </div>

                <h2>
                    {{ __('messages.manage_courses') }}
                </h2>

                <p>
                    {{ __('messages.manage_courses_description') }}
                </p>

            </div>

        </div>


        <div class="admin-courses-badge">

            <i class="fas fa-book"></i>

            {{ __('messages.courses') }}

        </div>

    </div>



    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="admin-courses-summary">

        <div class="admin-courses-summary-icon">

            <i class="fas fa-book-open"></i>

        </div>

        <div>

            <span>
                {{ __('messages.total_courses') }}
            </span>

            <strong>
                {{ $courses->total() }}
            </strong>

        </div>


        <div class="admin-courses-summary-note">

            <i class="fas fa-circle-check"></i>

            {{ __('messages.all_courses_on_platform') }}

        </div>

    </div>



    {{-- =====================================================
         COURSES TABLE
    ====================================================== --}}

    <div class="admin-courses-card">


        <div class="admin-courses-card-header">

            <div>

                <div class="admin-table-label">

                    <i class="fas fa-list"></i>

                    {{ __('messages.course_list') }}

                </div>

                <h3>
                    {{ __('messages.registered_courses') }}
                </h3>

            </div>


            <span class="admin-courses-count">

                {{ $courses->total() }}

                {{ __('messages.course') }}

            </span>

        </div>



        @if($courses->count())


            <div class="admin-table-wrapper">

                <table class="admin-courses-table">

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                {{ __('messages.course') }}
                            </th>

                            <th>
                                {{ __('messages.teacher') }}
                            </th>

                            <th>
                                {{ __('messages.students') }}
                            </th>

                            <th>
                                {{ __('messages.lessons') }}
                            </th>

                            <th>
                                {{ __('messages.action') }}
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($courses as $course)

                            <tr>

                                <td>

                                    <div class="admin-course-number">

                                        {{ $course->id }}

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-course-user">

                                        <div class="admin-course-icon">

                                            <i class="fas fa-book-open"></i>

                                        </div>

                                        <div>

                                            <strong>
                                                {{ $course->title }}
                                            </strong>

                                            <span>
                                                {{ __('messages.educational_course') }}
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-course-teacher">

                                        <div class="admin-course-teacher-avatar">

                                            {{ mb_substr(
                                                $course->teacher->name ?? '?',
                                                0,
                                                1
                                            ) }}

                                        </div>

                                        <span>

                                            {{ $course->teacher->name
                                                ?? __('messages.not_specified') }}

                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-course-stat students">

                                        <i class="fas fa-user-graduate"></i>

                                        {{ $course->students->count() }}

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-course-stat lessons">

                                        <i class="fas fa-book"></i>

                                        {{ $course->lessons->count() }}

                                    </div>

                                </td>


                                <td>

                                    <form
                                        method="POST"
                                        action="/admin/courses/{{ $course->id }}">

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="admin-course-delete-btn"
                                            onclick="return confirm('{{ __('messages.confirm_delete_course') }}')">

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


            <div class="admin-courses-empty">

                <div class="admin-courses-empty-icon">

                    <i class="fas fa-book-open"></i>

                </div>

                <h3>
                    {{ __('messages.no_courses') }}
                </h3>

                <p>
                    {{ __('messages.no_courses_on_platform') }}
                </p>

            </div>

        @endif


    </div>



    {{-- =====================================================
         PAGINATION
    ====================================================== --}}

    @if($courses->hasPages())

        <div class="admin-courses-pagination">

            {{ $courses->links() }}

        </div>

    @endif


</div>

@endsection
