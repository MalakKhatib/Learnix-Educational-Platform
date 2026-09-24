@extends($layout)

@section('title', __('messages.profile'))

@section('content')

<div class="student-profile-page">


    {{-- =====================================================
         PROFILE HEADER
    ====================================================== --}}

    <div class="profile-hero">

        <div class="profile-hero-content">


            {{-- Avatar --}}

            <div class="profile-avatar-wrapper">

                @if($user->profile_image)

                    <img
                        src="{{ asset('storage/'.$user->profile_image) }}"
                        alt="{{ $user->name }}"
                        class="profile-avatar">

                @else

                    <img
                        src="{{ asset('images/default-avatar.png') }}"
                        alt="{{ $user->name }}"
                        class="profile-avatar">

                @endif


                <div class="profile-avatar-status">

                    <i class="fas fa-check"></i>

                </div>

            </div>


            {{-- User Info --}}

            <div class="profile-hero-info">

                <div class="profile-small-label">

                    <i class="fas fa-user-circle"></i>

                    {{ __('messages.profile') }}

                </div>


                <h2>

                    {{ $user->name }}

                </h2>


                <div class="profile-role">

                    <i class="fas fa-user"></i>

                    @if($user->role === 'student')

                        {{ __('messages.student') }}

                    @elseif($user->role === 'teacher')

                        {{ __('messages.teacher') }}

                    @elseif($user->role === 'admin')

                        {{ __('messages.admin') }}

                    @else

                        {{ ucfirst($user->role) }}

                    @endif

                </div>


                <p>

                    <i class="fas fa-envelope"></i>

                    {{ $user->email }}

                </p>

            </div>

        </div>


        {{-- Edit Button --}}

        <a
            href="/profile/edit"
            class="profile-edit-btn">

            <i class="fas fa-pen"></i>

            {{ __('messages.edit_profile') }}

        </a>

    </div>



    {{-- =====================================================
         INFORMATION CARDS
    ====================================================== --}}

    <div class="profile-section-grid">


        {{-- Account Information --}}

        <div class="profile-info-card">

            <div class="profile-card-header">

                <div class="profile-card-icon purple">

                    <i class="fas fa-id-card"></i>

                </div>

                <div>

                    <h3>
                        {{ __('messages.account_information') }}
                    </h3>

                    <span>
                        {{ __('messages.basic_account_information') }}
                    </span>

                </div>

            </div>


            <div class="profile-info-list">


                <div class="profile-info-row">

                    <div class="profile-row-icon">

                        <i class="fas fa-user-tag"></i>

                    </div>

                    <div>

                        <span>
                            {{ __('messages.account_type') }}
                        </span>

                        <strong>

                            @if($user->role === 'student')

                                {{ __('messages.student') }}

                            @elseif($user->role === 'teacher')

                                {{ __('messages.teacher') }}

                            @elseif($user->role === 'admin')

                                {{ __('messages.admin') }}

                            @else

                                {{ ucfirst($user->role) }}

                            @endif

                        </strong>

                    </div>

                </div>


                <div class="profile-info-row">

                    <div class="profile-row-icon">

                        <i class="fas fa-calendar-plus"></i>

                    </div>

                    <div>

                        <span>
                            {{ __('messages.account_created_at') }}
                        </span>

                        <strong>
                            {{ $user->created_at->format('Y-m-d') }}
                        </strong>

                    </div>

                </div>


            </div>

        </div>



        {{-- Personal Information --}}

        <div class="profile-info-card">

            <div class="profile-card-header">

                <div class="profile-card-icon blue">

                    <i class="fas fa-address-card"></i>

                </div>

                <div>

                    <h3>
                        {{ __('messages.personal_information') }}
                    </h3>

                    <span>
                        {{ __('messages.personal_data') }}
                    </span>

                </div>

            </div>


            <div class="profile-info-list">


                <div class="profile-info-row">

                    <div class="profile-row-icon">

                        <i class="fas fa-phone"></i>

                    </div>

                    <div>

                        <span>
                            {{ __('messages.phone_number') }}
                        </span>

                        <strong>
                            {{ $user->phone ?? __('messages.not_added_yet') }}
                        </strong>

                    </div>

                </div>


                <div class="profile-info-row">

                    <div class="profile-row-icon">

                        <i class="fas fa-location-dot"></i>

                    </div>

                    <div>

                        <span>
                            {{ __('messages.address') }}
                        </span>

                        <strong>
                            {{ $user->address ?? __('messages.not_added_yet') }}
                        </strong>

                    </div>

                </div>


                {{-- University ID : STUDENT ONLY --}}

                @if($user->role === 'student')

                    <div class="profile-info-row">

                        <div class="profile-row-icon">

                            <i class="fas fa-graduation-cap"></i>

                        </div>

                        <div>

                            <span>
                                {{ __('messages.university_id') }}
                            </span>

                            <strong>

                                {{ $user->university_id
                                    ?? __('messages.not_added_yet') }}

                            </strong>

                        </div>

                    </div>

                @endif


            </div>

        </div>

    </div>



    {{-- =====================================================
         ACCOUNT SETTINGS
    ====================================================== --}}

    <div class="profile-settings-card">


        <div class="profile-settings-header">

            <div>

                <div class="profile-small-label">

                    <i class="fas fa-sliders"></i>

                    {{ __('messages.account_settings') }}

                </div>

                <h3>
                    {{ __('messages.manage_account') }}
                </h3>

                <p>
                    {{ __('messages.manage_account_description') }}
                </p>

            </div>


            <div class="profile-settings-icon">

                <i class="fas fa-gear"></i>

            </div>

        </div>


        <div class="profile-settings-actions">


            {{-- Edit Profile --}}

            <a
                href="/profile/edit"
                class="profile-action-btn primary">

                <span class="profile-action-icon">

                    <i class="fas fa-user-pen"></i>

                </span>

                <span>
                    {{ __('messages.edit_profile') }}
                </span>

                <i class="fas fa-arrow-left action-arrow"></i>

            </a>



            {{-- Change Password --}}

            <a
                href="/profile/change-password"
                class="profile-action-btn warning">

                <span class="profile-action-icon">

                    <i class="fas fa-lock"></i>

                </span>

                <span>
                    {{ __('messages.change_password') }}
                </span>

                <i class="fas fa-arrow-left action-arrow"></i>

            </a>



            {{-- Reports according to role --}}

            @if($user->role === 'student')

                <a
                    href="/student/reports"
                    class="profile-action-btn success">

                    <span class="profile-action-icon">

                        <i class="fas fa-chart-pie"></i>

                    </span>

                    <span>
                        {{ __('messages.statistics_reports') }}
                    </span>

                    <i class="fas fa-arrow-left action-arrow"></i>

                </a>

            @elseif($user->role === 'teacher')

                <a
                    href="/teacher/reports"
                    class="profile-action-btn success">

                    <span class="profile-action-icon">

                        <i class="fas fa-chart-pie"></i>

                    </span>

                    <span>
                        {{ __('messages.statistics_reports') }}
                    </span>

                    <i class="fas fa-arrow-left action-arrow"></i>

                </a>

            @elseif($user->role === 'admin')

                <a
                    href="/admin/reports"
                    class="profile-action-btn success">

                    <span class="profile-action-icon">

                        <i class="fas fa-chart-pie"></i>

                    </span>

                    <span>
                        {{ __('messages.statistics_reports') }}
                    </span>

                    <i class="fas fa-arrow-left action-arrow"></i>

                </a>

            @endif


        </div>

    </div>


</div>

@endsection
