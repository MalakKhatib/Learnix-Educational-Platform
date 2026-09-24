@extends($layout)

@section('title', __('messages.edit_profile'))

@section('content')

<div class="student-profile-edit-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="profile-edit-header">

        <div class="profile-edit-header-icon">

            <i class="fas fa-user-pen"></i>

        </div>

        <div>

            <div class="profile-small-label">

                <i class="fas fa-sliders"></i>

                {{ __('messages.account_settings') }}

            </div>

            <h2>

                {{ __('messages.edit_profile') }}

            </h2>

            <p>

                {{ __('messages.edit_profile_description') }}

            </p>

        </div>

    </div>



    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="profile-edit-card">

        <form
            method="POST"
            action="/profile/update"
            enctype="multipart/form-data">

            @csrf

            @method('PUT')


            {{-- Profile Image --}}

            <div class="profile-edit-image-section">

                <div class="profile-edit-current-image">

                    @if($user->profile_image)

                        <img
                            src="{{ asset('storage/'.$user->profile_image) }}"
                            id="profileImagePreview"
                            alt="{{ $user->name }}">

                    @else

                        <img
                            src="{{ asset('images/default-avatar.png') }}"
                            id="profileImagePreview"
                            alt="{{ __('messages.profile') }}">

                    @endif

                </div>


                <div class="profile-image-info">

                    <h3>

                        {{ __('messages.profile_image') }}

                    </h3>

                    <p>

                        {{ __('messages.profile_image_description') }}

                    </p>


                    <label
                        for="profileImageInput"
                        class="profile-image-btn">

                        <i class="fas fa-camera"></i>

                        {{ __('messages.change_image') }}

                    </label>


                    <input
                        type="file"
                        id="profileImageInput"
                        name="profile_image"
                        accept="image/*"
                        hidden>

                </div>

            </div>



            <div class="profile-edit-divider"></div>



            {{-- =================================================
                 PERSONAL INFORMATION
            ================================================== --}}

            <div class="profile-edit-section-title">

                <div class="profile-edit-section-icon">

                    <i class="fas fa-user"></i>

                </div>

                <div>

                    <h3>

                        {{ __('messages.personal_information') }}

                    </h3>

                    <span>

                        {{ __('messages.basic_information') }}

                    </span>

                </div>

            </div>



            <div class="profile-edit-form-grid">


                {{-- Name --}}

                <div class="profile-edit-field">

                    <label>

                        {{ __('messages.full_name') }}

                    </label>

                    <div class="profile-input-wrapper">

                        <i class="fas fa-user"></i>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            placeholder="{{ __('messages.full_name_placeholder') }}"
                            required>

                    </div>

                    @error('name')

                        <small class="profile-error">

                            {{ $message }}

                        </small>

                    @enderror

                </div>



                {{-- Phone --}}

                <div class="profile-edit-field">

                    <label>

                        {{ __('messages.phone_number') }}

                    </label>

                    <div class="profile-input-wrapper">

                        <i class="fas fa-phone"></i>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $user->phone) }}"
                            placeholder="{{ __('messages.phone_placeholder') }}">

                    </div>

                    @error('phone')

                        <small class="profile-error">

                            {{ $message }}

                        </small>

                    @enderror

                </div>



                {{-- Address --}}

                <div class="profile-edit-field">

                    <label>

                        {{ __('messages.address') }}

                    </label>

                    <div class="profile-input-wrapper">

                        <i class="fas fa-location-dot"></i>

                        <input
                            type="text"
                            name="address"
                            value="{{ old('address', $user->address) }}"
                            placeholder="{{ __('messages.address_placeholder') }}">

                    </div>

                    @error('address')

                        <small class="profile-error">

                            {{ $message }}

                        </small>

                    @enderror

                </div>



                {{-- University ID --}}

                @if($user->role === 'student')

                    <div class="profile-edit-field">

                        <label>
                            {{ __('messages.university_id') }}
                        </label>

                        <div class="profile-input-wrapper">

                            <i class="fas fa-graduation-cap"></i>

                            <input
                                type="text"
                                name="university_id"
                                value="{{ old(
                                    'university_id',
                                    $user->university_id
                                ) }}"
                                placeholder="{{ __('messages.university_id_placeholder') }}">

                        </div>

                        @error('university_id')

                            <small class="profile-error">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                @endif

            </div>



            {{-- =================================================
                 EMAIL
            ================================================== --}}

            <div class="profile-email-box">

                <div class="profile-email-icon">

                    <i class="fas fa-envelope"></i>

                </div>

                <div>

                    <span>

                        {{ __('messages.email') }}

                    </span>

                    <strong>

                        {{ $user->email }}

                    </strong>

                    <small>

                        {{ __('messages.email_cannot_be_changed') }}

                    </small>

                </div>

            </div>



            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="profile-edit-actions">

                <a
                    href="/profile"
                    class="profile-edit-cancel">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.cancel') }}

                </a>


                <button
                    type="submit"
                    class="profile-save-btn">

                    <i class="fas fa-check"></i>

                    {{ __('messages.save_changes') }}

                </button>

            </div>


        </form>

    </div>

</div>



{{-- =========================================================
     IMAGE PREVIEW
========================================================= --}}

<script>

const profileImageInput =
    document.getElementById('profileImageInput');

const profileImagePreview =
    document.getElementById('profileImagePreview');


if (profileImageInput) {

    profileImageInput.addEventListener(
        'change',
        function(event) {

            const file =
                event.target.files[0];

            if (file) {

                const reader =
                    new FileReader();

                reader.onload =
                    function(e) {

                        profileImagePreview.src =
                            e.target.result;

                    };

                reader.readAsDataURL(file);

            }

        }
    );

}

</script>

@endsection
