@extends('admin.layouts.app')

@section('title', __('messages.manage_teachers'))

@section('content')

<div class="admin-teachers-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="admin-teachers-header">

        <div class="admin-teachers-header-content">

            <div class="admin-teachers-header-icon">

                <i class="fas fa-chalkboard-user"></i>

            </div>

            <div>

                <div class="admin-small-label">

                    <i class="fas fa-users"></i>

                    {{ __('messages.user_management') }}

                </div>

                <h2>
                    {{ __('messages.manage_teachers') }}
                </h2>

                <p>
                    {{ __('messages.manage_teachers_description') }}
                </p>

            </div>

        </div>


        <a
            href="/admin/teachers/create"
            class="admin-add-teacher-btn">

            <i class="fas fa-plus"></i>

            {{ __('messages.add_teacher') }}

        </a>

    </div>



    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <div class="admin-teachers-summary">

        <div class="admin-teachers-summary-icon">

            <i class="fas fa-chalkboard-user"></i>

        </div>

        <div>

            <span>
                {{ __('messages.total_teachers') }}
            </span>

            <strong>
                {{ $teachers->count() }}
            </strong>

        </div>

        <div class="admin-summary-note">

            <i class="fas fa-circle-check"></i>

            {{ __('messages.all_teacher_accounts') }}

        </div>

    </div>



    {{-- =====================================================
         TEACHERS TABLE
    ====================================================== --}}

    <div class="admin-teachers-card">


        <div class="admin-teachers-card-header">

            <div>

                <div class="admin-table-label">

                    <i class="fas fa-list"></i>

                    {{ __('messages.teacher_list') }}

                </div>

                <h3>
                    {{ __('messages.registered_teachers') }}
                </h3>

            </div>


            <span class="admin-teachers-count">

                {{ $teachers->count() }}

                {{ __('messages.teacher') }}

            </span>

        </div>



        @if($teachers->count())


            <div class="admin-table-wrapper">

                <table class="admin-teachers-table">

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                {{ __('messages.teacher') }}
                            </th>

                            <th>
                                {{ __('messages.email') }}
                            </th>

                            <th>
                                {{ __('messages.phone_number') }}
                            </th>

                            <th>
                                {{ __('messages.operations') }}
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($teachers as $teacher)

                            <tr>

                                <td>

                                    <div class="admin-teacher-number">

                                        {{ $teacher->id }}

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-teacher-user">

                                        <div class="admin-teacher-avatar">

                                            {{ mb_substr(
                                                $teacher->name,
                                                0,
                                                1
                                            ) }}

                                        </div>

                                        <div>

                                            <strong>
                                                {{ $teacher->name }}
                                            </strong>

                                            <span>
                                                {{ __('messages.teacher') }}
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-teacher-email">

                                        <i class="fas fa-envelope"></i>

                                        {{ $teacher->email }}

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-teacher-phone">

                                        <i class="fas fa-phone"></i>

                                        {{ $teacher->phone ?? __('messages.not_specified') }}

                                    </div>

                                </td>


                                <td>

                                    <div class="admin-teacher-actions">


                                        <a
                                            href="/admin/teachers/{{ $teacher->id }}/edit"
                                            class="admin-teacher-action edit">

                                            <i class="fas fa-pen"></i>

                                            {{ __('messages.edit') }}

                                        </a>


                                        <form
                                            action="/admin/teachers/{{ $teacher->id }}"
                                            method="POST">

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="admin-teacher-action delete"
                                                onclick="return confirm('{{ __('messages.confirm_delete_teacher') }}')">

                                                <i class="fas fa-trash"></i>

                                                {{ __('messages.delete') }}

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


        @else


            {{-- EMPTY STATE --}}

            <div class="admin-teachers-empty">

                <div class="admin-teachers-empty-icon">

                    <i class="fas fa-chalkboard-user"></i>

                </div>

                <h3>
                    {{ __('messages.no_teachers_yet') }}
                </h3>

                <p>
                    {{ __('messages.no_teachers_added') }}
                </p>

                <a
                    href="/admin/teachers/create"
                    class="admin-empty-teacher-btn">

                    <i class="fas fa-plus"></i>

                    {{ __('messages.add_first_teacher') }}

                </a>

            </div>

        @endif


    </div>


</div>

@endsection
