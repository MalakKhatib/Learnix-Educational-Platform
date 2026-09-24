<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Learnix | تسجيل الدخول</title>


    <!-- Google Font -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">


    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


<style>

/* =====================================================
   GENERAL
===================================================== */

*{

    margin:0;

    padding:0;

    box-sizing:border-box;

}


body{

    min-height:100vh;

    font-family:'Cairo', sans-serif;

    background:

        radial-gradient(
            circle at 15% 20%,
            rgba(168,85,247,.18),
            transparent 30%
        ),

        radial-gradient(
            circle at 85% 80%,
            rgba(124,58,237,.16),
            transparent 30%
        ),

        linear-gradient(
            135deg,
            #FAF9FF,
            #F5F3FF,
            #FFFFFF
        );

    display:flex;

    align-items:center;

    justify-content:center;

    padding:30px;

}


/* =====================================================
   MAIN CONTAINER
===================================================== */

.login-wrapper{

    width:100%;

    max-width:1050px;

    min-height:650px;

    display:grid;

    grid-template-columns:
        1fr
        1.05fr;

    overflow:hidden;

    background:white;

    border-radius:32px;

    border:
        1px solid rgba(255,255,255,.8);

    box-shadow:

        0 30px 80px
        rgba(76,29,149,.13);

    animation:
        fadeUp .7s ease;

}


/* =====================================================
   BRAND SIDE
===================================================== */

.login-brand{

    position:relative;

    overflow:hidden;

    padding:55px 45px;

    display:flex;

    flex-direction:column;

    justify-content:center;

    color:white;

    background:

        linear-gradient(
            145deg,
            #7C3AED,
            #8B5CF6,
            #A855F7
        );

}


/* Decorative Circles */

.login-brand::before{

    content:"";

    position:absolute;

    width:350px;

    height:350px;

    top:-150px;

    left:-150px;

    border-radius:50%;

    background:
        rgba(255,255,255,.08);

}


.login-brand::after{

    content:"";

    position:absolute;

    width:280px;

    height:280px;

    right:-130px;

    bottom:-130px;

    border-radius:50%;

    background:
        rgba(255,255,255,.08);

}


.brand-content{

    position:relative;

    z-index:2;

}


/* =====================================================
   LOGO
===================================================== */

.logo{

    width:78px;

    height:78px;

    margin-bottom:25px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:#7C3AED;

    background:white;

    border-radius:23px;

    box-shadow:

        0 15px 35px
        rgba(0,0,0,.12);

    animation:
        floating 3s ease-in-out infinite;

}


.logo i{

    font-size:34px;

}


/* =====================================================
   LEARNIX NAME
===================================================== */

.brand-name{

    margin-bottom:8px;

    color:white;

    font-size:48px;

    line-height:1;

    font-weight:800;

    letter-spacing:1px;

}


.brand-name span{

    color:#E9D5FF;

}


.brand-subtitle{

    margin-bottom:20px;

    color:rgba(255,255,255,.85);

    font-size:15px;

    font-weight:500;

}


/* =====================================================
   BRAND DESCRIPTION
===================================================== */

.brand-tagline{

    max-width:390px;

    margin-bottom:35px;

    color:rgba(255,255,255,.90);

    font-size:16px;

    line-height:2;

}


/* =====================================================
   BRAND FEATURES
===================================================== */

.brand-features{

    display:flex;

    flex-direction:column;

    gap:15px;

}


.brand-feature{

    display:flex;

    align-items:center;

    gap:12px;

    color:white;

    font-size:14px;

}


.brand-feature-icon{

    width:39px;

    height:39px;

    display:flex;

    align-items:center;

    justify-content:center;

    flex-shrink:0;

    color:white;

    background:
        rgba(255,255,255,.15);

    border:
        1px solid
        rgba(255,255,255,.20);

    border-radius:12px;

}


/* =====================================================
   BRAND FOOTER
===================================================== */

.brand-footer{

    position:absolute;

    z-index:2;

    right:45px;

    bottom:28px;

    left:45px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    color:white;

    font-size:12px;

    opacity:.75;

}


/* =====================================================
   LOGIN SECTION
===================================================== */

.login-section{

    padding:55px 60px;

    display:flex;

    flex-direction:column;

    justify-content:center;

}


/* =====================================================
   LOGIN HEADER
===================================================== */

.login-top{

    margin-bottom:35px;

}


.login-top .small-title{

    margin-bottom:8px;

    color:#8B5CF6;

    font-size:14px;

    font-weight:700;

}


.login-top h1{

    margin-bottom:10px;

    color:#111827;

    font-size:36px;

    font-weight:800;

}


.login-top p{

    color:#6B7280;

    font-size:16px;

    line-height:1.9;

}


/* =====================================================
   ERRORS
===================================================== */

.error-box{

    margin-bottom:22px;

    padding:15px 18px;

    color:#B91C1C;

    background:#FEF2F2;

    border:
        1px solid #FECACA;

    border-radius:14px;

    font-size:14px;

}


/* =====================================================
   INPUTS
===================================================== */

.input-group-custom{

    margin-bottom:21px;

}


.input-label{

    display:block;

    margin-bottom:9px;

    color:#374151;

    font-size:15px;

    font-weight:700;

}


.input-wrapper{

    position:relative;

}


.input-icon{

    position:absolute;

    top:50%;

    left:17px;

    transform:translateY(-50%);

    color:#A78BFA;

    font-size:17px;

    pointer-events:none;

}


.form-control{

    width:100%;

    height:58px;

    padding:
        0 18px
        0 50px;

    color:#111827;

    background:#FAFAFF;

    border:
        1px solid #E5E7EB;

    border-radius:16px;

    outline:none;

    font-family:'Cairo', sans-serif;

    font-size:15px;

    transition:.3s;

}


.form-control::placeholder{

    color:#A1A1AA;

}


.form-control:focus{

    background:white;

    border-color:#8B5CF6;

    box-shadow:

        0 0 0 4px
        rgba(139,92,246,.10);

}


/* =====================================================
   PASSWORD TOGGLE
===================================================== */

.toggle-password{

    position:absolute;

    top:50%;

    right:17px;

    transform:translateY(-50%);

    color:#9CA3AF;

    cursor:pointer;

    transition:.25s;

}


.toggle-password:hover{

    color:#8B5CF6;

}


/* =====================================================
   OPTIONS
===================================================== */

.login-options{

    display:flex;

    align-items:center;

    justify-content:space-between;

    margin:
        5px 0 25px;

    font-size:14px;

}


.remember{

    display:flex;

    align-items:center;

    gap:7px;

    color:#6B7280;

    cursor:pointer;

}


.remember input{

    width:15px;

    height:15px;

    accent-color:#8B5CF6;

}


.forgot-link{

    color:#7C3AED;

    text-decoration:none;

    font-weight:700;

}


.forgot-link:hover{

    text-decoration:underline;

}


/* =====================================================
   LOGIN BUTTON
===================================================== */

.login-btn{

    width:100%;

    height:58px;

    border:none;

    border-radius:16px;

    color:white;

    background:

        linear-gradient(
            135deg,
            #7C3AED,
            #A855F7
        );

    font-family:'Cairo', sans-serif;

    font-size:16px;

    font-weight:800;

    cursor:pointer;

    box-shadow:

        0 10px 25px
        rgba(124,58,237,.20);

    transition:.3s;

}


.login-btn:hover{

    transform:translateY(-3px);

    box-shadow:

        0 15px 30px
        rgba(124,58,237,.28);

}


.login-btn i{

    margin-right:8px;

}


/* =====================================================
   REGISTER DIVIDER
===================================================== */

.register-divider{

    display:flex;

    align-items:center;

    gap:15px;

    margin:30px 0 22px;

    color:#9CA3AF;

    font-size:12px;

}


.register-divider::before,
.register-divider::after{

    content:"";

    height:1px;

    flex:1;

    background:#E5E7EB;

}


/* =====================================================
   REGISTER
===================================================== */

.register-text{

    text-align:center;

    color:#6B7280;

    font-size:14px;

}


.register-link{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    width:100%;

    height:53px;

    margin-top:14px;

    color:#7C3AED;

    background:white;

    border:
        1px solid #DDD6FE;

    border-radius:15px;

    text-decoration:none;

    font-size:14px;

    font-weight:700;

    transition:.3s;

}


.register-link:hover{

    color:#6D28D9;

    background:#FAF5FF;

    border-color:#C4B5FD;

    transform:translateY(-2px);

}


/* =====================================================
   BACK HOME
===================================================== */

.back-home{

    display:block;

    margin-top:20px;

    text-align:center;

    color:#9CA3AF;

    text-decoration:none;

    font-size:13px;

    transition:.25s;

}


.back-home:hover{

    color:#7C3AED;

}


/* =====================================================
   ANIMATIONS
===================================================== */

@keyframes fadeUp{

    from{

        opacity:0;

        transform:
            translateY(25px);

    }

    to{

        opacity:1;

        transform:
            translateY(0);

    }

}


@keyframes floating{

    0%,100%{

        transform:
            translateY(0);

    }

    50%{

        transform:
            translateY(-7px);

    }

}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:850px){

    .login-wrapper{

        grid-template-columns:1fr;

        max-width:520px;

    }


    .login-brand{

        min-height:310px;

        padding:40px;

    }


    .brand-name{

        font-size:40px;

    }


    .brand-tagline{

        margin-bottom:20px;

    }


    .brand-features{

        display:none;

    }


    .brand-footer{

        display:none;

    }


    .login-section{

        padding:45px 40px;

    }

}


@media(max-width:500px){

    body{

        padding:15px;

    }


    .login-wrapper{

        border-radius:25px;

    }


    .login-brand{

        min-height:270px;

        padding:30px;

    }


    .logo{

        width:65px;

        height:65px;

    }


    .logo i{

        font-size:27px;

    }


    .brand-name{

        font-size:34px;

    }


    .brand-subtitle{

        font-size:13px;

    }


    .brand-tagline{

        font-size:14px;

    }


    .login-section{

        padding:35px 25px;

    }


    .login-top h1{

        font-size:30px;

    }


    .login-top p{

        font-size:14px;

    }


    .login-options{

        font-size:13px;

    }

}
/* =====================================================
   LOGIN THEME TOGGLE
===================================================== */

.login-section {
    position: relative;
}


.login-theme-toggle {
    position: absolute;

    top: 25px;
    left: 25px;

    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #7C3AED;

    background: #F5F3FF;

    border: 1px solid #DDD6FE;

    border-radius: 12px;

    font-size: 15px;

    cursor: pointer;

    transition: .25s;
}


.login-theme-toggle:hover {
    transform: translateY(-2px);

    background: #EDE9FE;
}


/* =====================================================
   DARK MODE
===================================================== */

body.dark-mode {

    background:

        radial-gradient(
            circle at 15% 20%,
            rgba(168,85,247,.10),
            transparent 30%
        ),

        radial-gradient(
            circle at 85% 80%,
            rgba(124,58,237,.09),
            transparent 30%
        ),

        linear-gradient(
            135deg,
            #252130,
            #2B2536,
            #241F2D
        );

}


/* MAIN CARD */

body.dark-mode .login-wrapper {
    background: #302A3B;

    border-color: #443B50;

    box-shadow:
        0 30px 80px
        rgba(10,7,15,.25);
}


/* LOGIN SIDE */

body.dark-mode .login-section {
    background: #302A3B;
}


body.dark-mode .login-top .small-title {
    color: #C3A6EF;
}


body.dark-mode .login-top h1 {
    color: #F2EDF7;
}


body.dark-mode .login-top p {
    color: #AAA0B0;
}


/* ERROR */

body.dark-mode .error-box {
    color: #FFABAB;

    background: #452F35;

    border-color: #604049;
}


/* LABEL */

body.dark-mode .input-label {
    color: #D2CAD8;
}


/* INPUT */

body.dark-mode .form-control {
    color: #EEEAF4;

    background: #292433;

    border-color: #494054;
}


body.dark-mode .form-control::placeholder {
    color: #91879D;
}


body.dark-mode .form-control:focus {
    color: #F2EDF7;

    background: #302A3C;

    border-color: #A78BDA;

    box-shadow:
        0 0 0 4px
        rgba(167,139,218,.10);
}


body.dark-mode .input-icon {
    color: #B79BDD;
}


body.dark-mode .toggle-password {
    color: #A69CAB;
}


body.dark-mode .toggle-password:hover {
    color: #C3A6EF;
}


/* OPTIONS */

body.dark-mode .remember {
    color: #AAA0B0;
}


body.dark-mode .forgot-link {
    color: #C4A6EF;
}


/* LOGIN BUTTON */

body.dark-mode .login-btn {
    color: white;

    background:
        linear-gradient(
            135deg,
            #6D28D9,
            #8B5CF6
        );

    box-shadow:
        0 10px 25px
        rgba(109,40,217,.22);
}


/* DIVIDER */

body.dark-mode .register-divider {
    color: #8F8598;
}


body.dark-mode .register-divider::before,
body.dark-mode .register-divider::after {
    background: #463D50;
}


/* REGISTER */

body.dark-mode .register-text {
    color: #AAA0B0;
}


body.dark-mode .register-link {
    color: #C4A6EF;

    background: #302A3B;

    border-color: #554963;
}


body.dark-mode .register-link:hover {
    color: white;

    background: #40364E;

    border-color: #69577A;
}


/* BACK */

body.dark-mode .back-home {
    color: #8F8598;
}


body.dark-mode .back-home:hover {
    color: #C3A6EF;
}


/* THEME BUTTON */

body.dark-mode .login-theme-toggle {
    color: #F5C968;

    background: #40374E;

    border-color: #51465E;
}


body.dark-mode .login-theme-toggle:hover {
    background: #4A4058;
}
</style>

</head>


<body>


<div class="login-wrapper">


    <!-- =================================================
         BRAND SIDE
    ================================================== -->

    <div class="login-brand">

        <div class="brand-content">


            <div class="logo">

                <i class="fas fa-graduation-cap"></i>

            </div>


            <div class="brand-name">

                Learn<span>ix</span>

            </div>


            <div class="brand-subtitle">

                منصة التعلّم الذكي

            </div>


            <div class="brand-tagline">

                تجربة تعليمية متكاملة تساعدك
                على التعلّم والتطور وتحقيق أهدافك
                بطريقة سهلة ومنظمة.

            </div>


            <div class="brand-features">


                <div class="brand-feature">

                    <div class="brand-feature-icon">

                        <i class="fas fa-book-open"></i>

                    </div>

                    <span>

                        تعلّم من خلال كورسات ودروس منظمة

                    </span>

                </div>


                <div class="brand-feature">

                    <div class="brand-feature-icon">

                        <i class="fas fa-chart-line"></i>

                    </div>

                    <span>

                        تابع تقدمك ونتائجك التعليمية

                    </span>

                </div>


                <div class="brand-feature">

                    <div class="brand-feature-icon">

                        <i class="fas fa-certificate"></i>

                    </div>

                    <span>

                        أكمل الكورسات واحصل على الشهادات

                    </span>

                </div>


            </div>


        </div>


        <div class="brand-footer">

            <span>

                <i class="fas fa-shield-halved"></i>

                تعلّم بأمان

            </span>

            <span>

                Learnix © {{ date('Y') }}

            </span>

        </div>

    </div>



    <!-- =================================================
         LOGIN SIDE
    ================================================== -->

    <div class="login-section"><div class="login-section">

    <button
        type="button"
        id="loginThemeToggle"
        class="login-theme-toggle"
        aria-label="تبديل الوضع">

        <i class="fas fa-moon"></i>

    </button>


        <div class="login-top">

            <div class="small-title">

                مرحباً بعودتك

            </div>


            <h1>

                تسجيل الدخول

            </h1>


            <p>

                سجّل دخولك للمتابعة والاستمرار
                في رحلتك التعليمية.

            </p>

        </div>



        @if ($errors->any())

            <div class="error-box">

                {{ $errors->first() }}

            </div>

        @endif



        <form method="POST"
              action="{{ route('login') }}">

            @csrf


            <!-- Email -->

            <div class="input-group-custom">

                <label class="input-label">

                    البريد الإلكتروني

                </label>


                <div class="input-wrapper">

                    <i class="fas fa-envelope input-icon"></i>


                    <input

                        type="email"

                        name="email"

                        value="{{ old('email') }}"

                        class="form-control"

                        placeholder="أدخل بريدك الإلكتروني"

                        required

                        autofocus>

                </div>

            </div>



            <!-- Password -->

            <div class="input-group-custom">

                <label class="input-label">

                    كلمة المرور

                </label>


                <div class="input-wrapper">

                    <i class="fas fa-lock input-icon"></i>


                    <input

                        type="password"

                        name="password"

                        id="password"

                        class="form-control"

                        placeholder="أدخل كلمة المرور"

                        required>


                    <span

                        class="toggle-password"

                        onclick="togglePassword()">

                        <i

                            class="fas fa-eye"

                            id="eyeIcon">

                        </i>

                    </span>

                </div>

            </div>



            <!-- Options -->

            <div class="login-options">


                <label class="remember">

                    <input

                        type="checkbox"

                        name="remember">

                    تذكرني

                </label>


                @if (Route::has('password.request'))

                    <a

                        href="{{ route('password.request') }}"

                        class="forgot-link">

                        نسيت كلمة المرور؟

                    </a>

                @endif


            </div>



            <!-- Login -->

            <button

                type="submit"

                class="login-btn">

                تسجيل الدخول

                <i class="fas fa-arrow-left"></i>

            </button>


        </form>



        <!-- Register -->

        <div class="register-divider">

            أو

        </div>


        <div class="register-text">

            ليس لديك حساب؟

        </div>


        <a

            href="{{ route('register') }}"

            class="register-link">

            <i class="fas fa-user-plus"></i>

            إنشاء حساب جديد

        </a>


        <a

            href="/"

            class="back-home">

            <i class="fas fa-arrow-right"></i>

            العودة إلى Learnix

        </a>


    </div>


</div>



<script>

function togglePassword(){

    const password =
        document.getElementById('password');

    const eyeIcon =
        document.getElementById('eyeIcon');


    if(password.type === 'password'){

        password.type = 'text';

        eyeIcon.classList.remove(
            'fa-eye'
        );

        eyeIcon.classList.add(
            'fa-eye-slash'
        );

    }

    else{

        password.type = 'password';

        eyeIcon.classList.remove(
            'fa-eye-slash'
        );

        eyeIcon.classList.add(
            'fa-eye'
        );

    }

}

</script>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const body =
            document.body;

        const toggle =
            document.getElementById(
                'loginThemeToggle'
            );


        if (!toggle) {
            return;
        }


        const savedTheme =
            localStorage.getItem(
                'learnix-theme'
            );


        /* Restore theme */

        if (savedTheme === 'dark') {

            body.classList.add(
                'dark-mode'
            );

            toggle.innerHTML =
                '<i class="fas fa-sun"></i>';

        }


        /* Toggle */

        toggle.addEventListener(
            'click',
            function () {

                body.classList.toggle(
                    'dark-mode'
                );


                const isDark =
                    body.classList.contains(
                        'dark-mode'
                    );


                if (isDark) {

                    localStorage.setItem(
                        'learnix-theme',
                        'dark'
                    );

                    toggle.innerHTML =
                        '<i class="fas fa-sun"></i>';

                } else {

                    localStorage.setItem(
                        'learnix-theme',
                        'light'
                    );

                    toggle.innerHTML =
                        '<i class="fas fa-moon"></i>';

                }

            }
        );

    }

);

</script>
</body>

</html>
