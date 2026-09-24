<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Learnix | إنشاء حساب</title>


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
            circle at 10% 15%,
            rgba(168,85,247,.16),
            transparent 30%
        ),

        radial-gradient(
            circle at 90% 85%,
            rgba(124,58,237,.15),
            transparent 30%
        ),

        linear-gradient(
            135deg,
            #FAF9FF,
            #F5F3FF,
            #FFFFFF
        );

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}


/* =====================================================
   MAIN CARD
===================================================== */

.register-wrapper{

    width:100%;

    max-width:1100px;

    display:grid;

    grid-template-columns:
        .85fr
        1.15fr;

    overflow:hidden;

    background:white;

    border-radius:32px;

    box-shadow:

        0 30px 80px
        rgba(76,29,149,.13);

    animation:
        fadeUp .7s ease;

}


/* =====================================================
   BRAND SIDE
===================================================== */

.register-brand{

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


.register-brand::before{

    content:"";

    position:absolute;

    width:360px;

    height:360px;

    top:-170px;

    left:-160px;

    border-radius:50%;

    background:
        rgba(255,255,255,.08);

}


.register-brand::after{

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


.register-brand-content{

    position:relative;

    z-index:2;

}


/* =====================================================
   LOGO
===================================================== */

.register-logo{

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


.register-logo i{

    font-size:34px;

}


/* =====================================================
   LEARNIX
===================================================== */

.register-brand-name{

    margin-bottom:8px;

    color:white;

    font-size:48px;

    line-height:1;

    font-weight:800;

    letter-spacing:1px;

}


.register-brand-name span{

    color:#E9D5FF;

}


.register-subtitle{

    margin-bottom:22px;

    color:rgba(255,255,255,.85);

    font-size:15px;

    font-weight:500;

}


.register-description{

    max-width:400px;

    margin-bottom:35px;

    color:rgba(255,255,255,.9);

    font-size:16px;

    line-height:2;

}


/* =====================================================
   FEATURES
===================================================== */

.register-features{

    display:flex;

    flex-direction:column;

    gap:15px;

}


.register-feature{

    display:flex;

    align-items:center;

    gap:12px;

    color:white;

    font-size:14px;

}


.register-feature-icon{

    width:40px;

    height:40px;

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
   REGISTER CONTENT
===================================================== */

.register-content{

    padding:45px 55px;

    max-height:90vh;

    overflow-y:auto;

}


.register-header{

    margin-bottom:30px;

}


.register-header .small-title{

    margin-bottom:7px;

    color:#8B5CF6;

    font-size:14px;

    font-weight:700;

}


.register-header h1{

    margin-bottom:9px;

    color:#111827;

    font-size:34px;

    font-weight:800;

}


.register-header p{

    color:#6B7280;

    font-size:15px;

    line-height:1.9;

}


/* =====================================================
   FORM
===================================================== */

.form-group{

    margin-bottom:19px;

}


.form-label{

    display:block;

    margin-bottom:8px;

    color:#374151;

    font-size:14px;

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

    font-size:16px;

    pointer-events:none;

}


.form-control{

    width:100%;

    height:54px;

    padding:
        0 18px
        0 48px;

    color:#111827;

    background:#FAFAFF;

    border:
        1px solid #E5E7EB;

    border-radius:15px;

    outline:none;

    font-family:'Cairo', sans-serif;

    font-size:14px;

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
   TWO COLUMNS
===================================================== */

.form-row{

    display:grid;

    grid-template-columns:
        1fr
        1fr;

    gap:15px;

}


/* =====================================================
   ADDITIONAL INFO
===================================================== */

.info-box{

    margin:
        22px 0;

    padding:20px;

    background:#FAF9FF;

    border:
        1px solid #EDE9FE;

    border-radius:20px;

}


.info-title{

    display:flex;

    align-items:center;

    gap:9px;

    margin-bottom:18px;

    color:#7C3AED;

    font-size:15px;

    font-weight:800;

}


.info-title i{

    width:32px;

    height:32px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:#7C3AED;

    background:#EDE9FE;

    border-radius:10px;

}


/* =====================================================
   TERMS
===================================================== */

.terms{

    display:flex;

    align-items:center;

    gap:9px;

    margin:
        20px 0;

    color:#6B7280;

    font-size:13px;

    cursor:pointer;

}


.terms input{

    width:16px;

    height:16px;

    accent-color:#8B5CF6;

}


/* =====================================================
   REGISTER BUTTON
===================================================== */

.register-btn{

    width:100%;

    height:57px;

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


.register-btn:hover{

    transform:translateY(-3px);

    box-shadow:

        0 15px 30px
        rgba(124,58,237,.28);

}


/* =====================================================
   LOGIN LINK
===================================================== */

.login-divider{

    display:flex;

    align-items:center;

    gap:15px;

    margin:
        25px 0 18px;

    color:#9CA3AF;

    font-size:12px;

}


.login-divider::before,
.login-divider::after{

    content:"";

    height:1px;

    flex:1;

    background:#E5E7EB;

}


.login-text{

    text-align:center;

    color:#6B7280;

    font-size:14px;

}


.login-link{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    width:100%;

    height:51px;

    margin-top:12px;

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


.login-link:hover{

    color:#6D28D9;

    background:#FAF5FF;

    border-color:#C4B5FD;

    transform:translateY(-2px);

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

@media(max-width:900px){

    .register-wrapper{

        grid-template-columns:1fr;

        max-width:650px;

    }


    .register-brand{

        min-height:300px;

        padding:40px;

    }


    .register-features{

        display:none;

    }


    .register-content{

        max-height:none;

        padding:40px;

    }

}


@media(max-width:550px){

    body{

        padding:15px;

    }


    .register-wrapper{

        border-radius:25px;

    }


    .register-brand{

        min-height:250px;

        padding:30px;

    }


    .register-logo{

        width:65px;

        height:65px;

    }


    .register-logo i{

        font-size:27px;

    }


    .register-brand-name{

        font-size:36px;

    }


    .register-description{

        font-size:14px;

    }


    .register-content{

        padding:30px 22px;

    }


    .register-header h1{

        font-size:29px;

    }


    .form-row{

        grid-template-columns:1fr;

        gap:0;

    }

}
/* =====================================================
   REGISTER THEME TOGGLE
===================================================== */

.register-content {
    position: relative;
}


.register-theme-toggle {
    position: absolute;

    top: 20px;
    left: 20px;

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


.register-theme-toggle:hover {
    transform: translateY(-2px);

    background: #EDE9FE;
}


/* =====================================================
   DARK MODE
===================================================== */

body.dark-mode {

    background:

        radial-gradient(
            circle at 10% 15%,
            rgba(168,85,247,.09),
            transparent 30%
        ),

        radial-gradient(
            circle at 90% 85%,
            rgba(124,58,237,.08),
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

body.dark-mode .register-wrapper {
    background: #302A3B;

    border-color: #443B50;

    box-shadow:
        0 30px 80px
        rgba(10,7,15,.25);
}


/* REGISTER SIDE */

body.dark-mode .register-content {
    background: #302A3B;
}


/* HEADER */

body.dark-mode .register-header .small-title {
    color: #C3A6EF;
}


body.dark-mode .register-header h1 {
    color: #F2EDF7;
}


body.dark-mode .register-header p {
    color: #AAA0B0;
}


/* LABELS */

body.dark-mode .form-label {
    color: #D2CAD8;
}


/* INPUTS */

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


/* ADDITIONAL INFO */

body.dark-mode .info-box {
    background: #352E41;

    border-color: #463D52;
}


body.dark-mode .info-title {
    color: #C3A6EF;
}


body.dark-mode .info-title i {
    color: #C3A6EF;

    background: #443650;
}


/* TERMS */

body.dark-mode .terms {
    color: #AAA0B0;
}


/* LOGIN DIVIDER */

body.dark-mode .login-divider {
    color: #8F8598;
}


body.dark-mode .login-divider::before,
body.dark-mode .login-divider::after {
    background: #463D50;
}


/* LOGIN TEXT */

body.dark-mode .login-text {
    color: #AAA0B0;
}


/* LOGIN LINK */

body.dark-mode .login-link {
    color: #C4A6EF;

    background: #302A3B;

    border-color: #554963;
}


body.dark-mode .login-link:hover {
    color: white;

    background: #40364E;

    border-color: #69577A;
}


/* REGISTER BUTTON */

body.dark-mode .register-btn {
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


/* THEME BUTTON */

body.dark-mode .register-theme-toggle {
    color: #F5C968;

    background: #40374E;

    border-color: #51465E;
}


body.dark-mode .register-theme-toggle:hover {
    background: #4A4058;
}
</style>

</head>


<body>


<div class="register-wrapper">


    <!-- =================================================
         BRAND SIDE
    ================================================== -->

    <div class="register-brand">

        <div class="register-brand-content">


            <div class="register-logo">

                <i class="fas fa-graduation-cap"></i>

            </div>


            <div class="register-brand-name">

                Learn<span>ix</span>

            </div>


            <div class="register-subtitle">

                منصة التعلّم الذكي

            </div>


            <div class="register-description">

                انضم إلى Learnix وابدأ رحلة تعليمية
                متكاملة تساعدك على تطوير مهاراتك
                وتحقيق أهدافك التعليمية.

            </div>


            <div class="register-features">


                <div class="register-feature">

                    <div class="register-feature-icon">

                        <i class="fas fa-book-open"></i>

                    </div>

                    <span>

                        تعلّم من خلال كورسات منظمة

                    </span>

                </div>


                <div class="register-feature">

                    <div class="register-feature-icon">

                        <i class="fas fa-chart-line"></i>

                    </div>

                    <span>

                        تابع تقدمك ونتائجك

                    </span>

                </div>


                <div class="register-feature">

                    <div class="register-feature-icon">

                        <i class="fas fa-award"></i>

                    </div>

                    <span>

                        احصل على شهادات إتمام الكورسات

                    </span>

                </div>


            </div>


        </div>

    </div>



    <!-- =================================================
         REGISTER CONTENT
    ================================================== -->

    <div class="register-content">

    <button
        type="button"
        id="registerThemeToggle"
        class="register-theme-toggle"
        aria-label="تبديل الوضع">

        <i class="fas fa-moon"></i>

    </button>


        <div class="register-header">

            <div class="small-title">

                أهلاً بك في Learnix

            </div>


            <h1>

                إنشاء حساب جديد

            </h1>


            <p>

                أنشئ حسابك وابدأ رحلتك التعليمية معنا.

            </p>

        </div>



        <form method="POST"
              action="{{ route('register') }}">

            @csrf


            <!-- Student -->

            <input
                type="hidden"
                name="type"
                value="student">


            <!-- Name -->

            <div class="form-group">

                <label class="form-label">

                    الاسم الكامل

                </label>


                <div class="input-wrapper">

                    <i class="fas fa-user input-icon"></i>


                    <input

                        type="text"

                        name="name"

                        value="{{ old('name') }}"

                        class="form-control"

                        placeholder="أدخل اسمك الكامل"

                        required>

                </div>

            </div>



            <!-- Email -->

            <div class="form-group">

                <label class="form-label">

                    البريد الإلكتروني

                </label>


                <div class="input-wrapper">

                    <i class="fas fa-envelope input-icon"></i>


                    <input

                        type="email"

                        name="email"

                        value="{{ old('email') }}"

                        class="form-control"

                        placeholder="example@email.com"

                        required>

                </div>

            </div>



            <!-- Password -->

            <div class="form-row">


                <div class="form-group">

                    <label class="form-label">

                        كلمة المرور

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-lock input-icon"></i>


                        <input

                            type="password"

                            id="password"

                            name="password"

                            class="form-control"

                            placeholder="كلمة المرور"

                            required>


                        <span

                            class="toggle-password"

                            data-target="password">

                            <i class="fas fa-eye"></i>

                        </span>

                    </div>

                </div>



                <!-- Confirmation -->

                <div class="form-group">

                    <label class="form-label">

                        تأكيد كلمة المرور

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-lock input-icon"></i>


                        <input

                            type="password"

                            id="password_confirmation"

                            name="password_confirmation"

                            class="form-control"

                            placeholder="أعد كلمة المرور"

                            required>


                        <span

                            class="toggle-password"

                            data-target="password_confirmation">

                            <i class="fas fa-eye"></i>

                        </span>

                    </div>

                </div>


            </div>



            <!-- Additional Information -->

            <div class="info-box">


                <div class="info-title">

                    <i class="fas fa-circle-info"></i>

                    معلومات إضافية

                </div>


                <!-- Phone -->

                <div class="form-group">

                    <label class="form-label">

                        رقم الهاتف

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-phone input-icon"></i>


                        <input

                            type="text"

                            name="phone"

                            value="{{ old('phone') }}"

                            class="form-control"

                            placeholder="أدخل رقم الهاتف">

                    </div>

                </div>



                <!-- University ID -->

                <div class="form-group">

                    <label class="form-label">

                        الرقم الجامعي

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-id-card input-icon"></i>


                        <input

                            type="text"

                            name="university_id"

                            value="{{ old('university_id') }}"

                            class="form-control"

                            placeholder="أدخل الرقم الجامعي">

                    </div>

                </div>



                <!-- Birth Date -->

                <div class="form-group mb-0">

                    <label class="form-label">

                        تاريخ الميلاد

                    </label>


                    <div class="input-wrapper">

                        <i class="fas fa-calendar-days input-icon"></i>


                        <input

                            type="date"

                            name="birth_date"

                            value="{{ old('birth_date') }}"

                            class="form-control">

                    </div>

                </div>


            </div>



            <!-- Terms -->

            <label class="terms">

                <input

                    type="checkbox"

                    required>


                أوافق على الشروط والأحكام

            </label>



            <!-- Register -->

            <button

                type="submit"

                class="register-btn">

                إنشاء الحساب

                <i class="fas fa-arrow-left"></i>

            </button>


        </form>



        <!-- Login -->

        <div class="login-divider">

            أو

        </div>


        <div class="login-text">

            لديك حساب بالفعل؟

        </div>


        <a

            href="{{ route('login') }}"

            class="login-link">

            <i class="fas fa-right-to-bracket"></i>

            تسجيل الدخول

        </a>


    </div>


</div>



<script>

/* =====================================================
   PASSWORD TOGGLE
===================================================== */

document
    .querySelectorAll('.toggle-password')
    .forEach(button => {

        button.addEventListener(
            'click',
            function(){

                const target =
                    document.getElementById(
                        this.dataset.target
                    );

                const icon =
                    this.querySelector('i');


                if(
                    target.type === 'password'
                ){

                    target.type = 'text';

                    icon.classList.remove(
                        'fa-eye'
                    );

                    icon.classList.add(
                        'fa-eye-slash'
                    );

                }

                else{

                    target.type = 'password';

                    icon.classList.remove(
                        'fa-eye-slash'
                    );

                    icon.classList.add(
                        'fa-eye'
                    );

                }

            }
        );

    });

</script>
<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const body =
            document.body;

        const toggle =
            document.getElementById(
                'registerThemeToggle'
            );


        if (!toggle) {
            return;
        }


        const savedTheme =
            localStorage.getItem(
                'learnix-theme'
            );


        /* Restore saved theme */

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
