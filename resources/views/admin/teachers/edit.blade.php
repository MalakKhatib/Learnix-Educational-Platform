@extends('admin.layouts.app')

@section('title', __('messages.edit_teacher'))

@section('content')

<div class="admin-create-user-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="admin-create-user-header">

        <div class="admin-create-user-header-content">

            <div class="admin-create-user-icon edit-teacher-icon">

                <i class="fas fa-user-pen"></i>

            </div>

            <div>

                <div class="admin-create-user-label edit-teacher-label">

                    <i class="fas fa-user-gear"></i>

                    {{ __('messages.teacher_management') }}

                </div>

                <h2>
                    {{ __('messages.edit_teacher_information') }}
                </h2>

                <p>
                    {{ __('messages.update_teacher_account_information') }}
                </p>

            </div>

        </div>


        <div class="admin-create-user-badge edit-teacher-badge">

            <i class="fas fa-user-edit"></i>

            {{ __('messages.edit_account') }}

        </div>

    </div>



    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="admin-create-user-card">

        <form
            method="POST"
            action="/admin/teachers/{{ $teacher->id }}">

            @csrf

            @method('PUT')


            {{-- =================================================
                 PERSONAL INFORMATION
            ================================================== --}}

            <div class="admin-form-section">

                <div class="admin-form-section-title">

                    <div class="admin-form-section-icon purple">

                        <i class="fas fa-user"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.personal_information') }}
                        </h4>

                        <p>
                            {{ __('messages.edit_teacher_basic_information') }}
                        </p>

                    </div>

                </div>



                {{-- NAME --}}

                <div class="admin-form-group">

                    <label>

                        {{ __('messages.teacher_name') }}

                        <span>*</span>

                    </label>


                    <div class="admin-input-wrapper">

                        <i class="fas fa-user"></i>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $teacher->name) }}"
                            placeholder="{{ __('messages.enter_teacher_name') }}"
                            class="@error('name') admin-input-error @enderror"
                            required>

                    </div>


                    @error('name')

                        <div class="admin-form-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                {{-- EMAIL --}}

                <div class="admin-form-group">

                    <label>

                        {{ __('messages.email') }}

                        <span>*</span>

                    </label>


                    <div class="admin-input-wrapper">

                        <i class="fas fa-envelope"></i>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $teacher->email) }}"
                            placeholder="example@email.com"
                            class="@error('email') admin-input-error @enderror"
                            required>

                    </div>


                    @error('email')

                        <div class="admin-form-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>

            </div>



            {{-- =================================================
                 CONTACT
            ================================================== --}}

            <div class="admin-form-section">

                <div class="admin-form-section-title">

                    <div class="admin-form-section-icon green">

                        <i class="fas fa-phone"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.contact_information') }}
                        </h4>

                        <p>
                            {{ __('messages.update_teacher_phone') }}
                        </p>

                    </div>

                </div>



                <div class="admin-form-group">

                    <label>
                        {{ __('messages.phone_number') }}
                    </label>


                    <div class="admin-input-wrapper">

                        <i class="fas fa-phone"></i>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $teacher->phone) }}"
                            placeholder="{{ __('messages.phone_example') }}">

                    </div>

                    @error('phone')

                        <div class="admin-form-error">

                            <i class="fas fa-circle-exclamation"></i>

                            {{ $message }}

                        </div>

                    @enderror

                </div>

            </div>



            {{-- =================================================
                 NOTE
            ================================================== --}}

            <div class="admin-create-note">

                <div class="admin-create-note-icon">

                    <i class="fas fa-circle-info"></i>

                </div>

                <div>

                    <strong>
                        {{ __('messages.note') }}
                    </strong>

                    <p>
                        {{ __('messages.teacher_edit_note') }}
                    </p>

                </div>

            </div>



            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="admin-create-actions">

                <a
                    href="/admin/teachers"
                    class="admin-create-cancel-btn">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.back_to_teachers') }}

                </a>


                <button
                    type="submit"
                    class="admin-create-save-btn edit-teacher-save-btn">

                    <i class="fas fa-save"></i>

                    {{ __('messages.save_changes') }}

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
