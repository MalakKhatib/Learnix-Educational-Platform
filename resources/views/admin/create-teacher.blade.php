@extends('admin.layouts.app')

@section('title', __('messages.add_teacher'))

@section('content')

<div class="admin-create-user-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="admin-create-user-header">

        <div class="admin-create-user-header-content">

            <div class="admin-create-user-icon">

                <i class="fas fa-chalkboard-user"></i>

            </div>

            <div>

                <div class="admin-create-user-label">

                    <i class="fas fa-user-plus"></i>

                    {{ __('messages.teacher_management') }}

                </div>

                <h2>
                    {{ __('messages.add_new_teacher') }}
                </h2>

                <p>
                    {{ __('messages.add_teacher_description') }}
                </p>

            </div>

        </div>


        <div class="admin-create-user-badge">

            <i class="fas fa-user-tie"></i>

            {{ __('messages.teacher_account') }}

        </div>

    </div>



    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="admin-create-user-card">

        <form
            method="POST"
            action="/admin/teachers/store">

            @csrf



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
                            {{ __('messages.teacher_information') }}
                        </h4>

                        <p>
                            {{ __('messages.teacher_information_description') }}
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
                            value="{{ old('name') }}"
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
                            value="{{ old('email') }}"
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
                 ACCOUNT INFORMATION
            ================================================== --}}

            <div class="admin-form-section">

                <div class="admin-form-section-title">

                    <div class="admin-form-section-icon orange">

                        <i class="fas fa-lock"></i>

                    </div>

                    <div>

                        <h4>
                            {{ __('messages.login_information') }}
                        </h4>

                        <p>
                            {{ __('messages.create_teacher_password_description') }}
                        </p>

                    </div>

                </div>



                {{-- PASSWORD --}}

                <div class="admin-form-group">

                    <label>

                        {{ __('messages.password') }}

                        <span>*</span>

                    </label>

                    <div class="admin-input-wrapper">

                        <i class="fas fa-lock"></i>

                        <input
                            type="password"
                            name="password"
                            placeholder="{{ __('messages.enter_strong_password') }}"
                            class="@error('password') admin-input-error @enderror"
                            required>

                    </div>

                    @error('password')

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
                            {{ __('messages.teacher_phone_optional') }}
                        </p>

                    </div>

                </div>



                {{-- PHONE --}}

                <div class="admin-form-group">

                    <label>
                        {{ __('messages.phone_number') }}
                    </label>

                    <div class="admin-input-wrapper">

                        <i class="fas fa-phone"></i>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="{{ __('messages.phone_example') }}">

                    </div>

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
                        {{ __('messages.teacher_creation_note') }}
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
                    class="admin-create-save-btn">

                    <i class="fas fa-user-plus"></i>

                    {{ __('messages.create_account') }}

                </button>

            </div>


        </form>

    </div>

</div>

@endsection
