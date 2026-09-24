@extends($layout)

@section('title', __('messages.change_password'))

@section('content')

<div class="student-password-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="password-page-header">

        <div class="password-header-icon">

            <i class="fas fa-lock"></i>

        </div>

        <div>

            <div class="profile-small-label">

                <i class="fas fa-shield-halved"></i>

                {{ __('messages.account_security') }}

            </div>

            <h2>

                {{ __('messages.change_password') }}

            </h2>

            <p>

                {{ __('messages.change_password_description') }}

            </p>

        </div>

    </div>



    {{-- =====================================================
         PASSWORD CARD
    ====================================================== --}}

    <div class="password-card">

        <div class="password-card-top">

            <div class="password-security-icon">

                <i class="fas fa-shield-halved"></i>

            </div>

            <div>

                <h3>

                    {{ __('messages.update_password') }}

                </h3>

                <p>

                    {{ __('messages.update_password_description') }}

                </p>

            </div>

        </div>


        <div class="password-divider"></div>


        <form method="POST"
              action="/profile/update-password">

            @csrf

            @method('PUT')


            {{-- Current Password --}}

            <div class="password-field">

                <label>

                    {{ __('messages.current_password') }}

                </label>

                <div class="password-input-wrapper">

                    <i class="fas fa-lock password-field-icon"></i>

                    <input
                        type="password"
                        name="current_password"
                        id="currentPassword"
                        placeholder="{{ __('messages.current_password_placeholder') }}"
                        required>

                    <button
                        type="button"
                        class="password-toggle"
                        data-target="currentPassword">

                        <i class="fas fa-eye"></i>

                    </button>

                </div>

                @error('current_password')

                    <small class="password-error">

                        {{ $message }}

                    </small>

                @enderror

            </div>



            {{-- New Password --}}

            <div class="password-field">

                <label>

                    {{ __('messages.new_password') }}

                </label>

                <div class="password-input-wrapper">

                    <i class="fas fa-key password-field-icon"></i>

                    <input
                        type="password"
                        name="password"
                        id="newPassword"
                        placeholder="{{ __('messages.new_password_placeholder') }}"
                        required>

                    <button
                        type="button"
                        class="password-toggle"
                        data-target="newPassword">

                        <i class="fas fa-eye"></i>

                    </button>

                </div>

                @error('password')

                    <small class="password-error">

                        {{ $message }}

                    </small>

                @enderror

            </div>



            {{-- Confirm Password --}}

            <div class="password-field">

                <label>

                    {{ __('messages.confirm_new_password') }}

                </label>

                <div class="password-input-wrapper">

                    <i class="fas fa-circle-check password-field-icon"></i>

                    <input
                        type="password"
                        name="password_confirmation"
                        id="confirmPassword"
                        placeholder="{{ __('messages.confirm_new_password_placeholder') }}"
                        required>

                    <button
                        type="button"
                        class="password-toggle"
                        data-target="confirmPassword">

                        <i class="fas fa-eye"></i>

                    </button>

                </div>

            </div>



            {{-- Security Note --}}

            <div class="password-security-note">

                <div class="password-note-icon">

                    <i class="fas fa-lightbulb"></i>

                </div>

                <div>

                    <strong>

                        {{ __('messages.security_tip') }}

                    </strong>

                    <p>

                        {{ __('messages.security_tip_description') }}

                    </p>

                </div>

            </div>



            {{-- Actions --}}

            <div class="password-actions">

                <a
                    href="/profile"
                    class="password-cancel-btn">

                    <i class="fas fa-arrow-right"></i>

                    {{ __('messages.cancel') }}

                </a>


                <button
                    type="submit"
                    class="password-save-btn">

                    <i class="fas fa-shield-check"></i>

                    {{ __('messages.update_password') }}

                </button>

            </div>

        </form>

    </div>

</div>



<script>

document.querySelectorAll('.password-toggle')
.forEach(function(button){

    button.addEventListener('click', function(){

        const targetId =
            this.getAttribute('data-target');

        const input =
            document.getElementById(targetId);

        const icon =
            this.querySelector('i');


        if(input.type === 'password'){

            input.type = 'text';

            icon.classList.remove('fa-eye');

            icon.classList.add('fa-eye-slash');

        }else{

            input.type = 'password';

            icon.classList.remove('fa-eye-slash');

            icon.classList.add('fa-eye');

        }

    });

});

</script>

@endsection
