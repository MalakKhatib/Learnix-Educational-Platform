<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>نسيت كلمة المرور</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

    *{
        font-family: Arial, sans-serif;
    }

    body{

        min-height:100vh;

        display:flex;
        justify-content:center;
        align-items:center;

        padding:20px;

        background:
        linear-gradient(
            135deg,
            #f8fafc,
            #eef4ff,
            #f1f5f9
        );
    }

    .forgot-card{

        width:100%;
        max-width:500px;

        background:white;

        border-radius:28px;

        overflow:hidden;

        border:1px solid #dbeafe;

        box-shadow:
        0 15px 40px rgba(37,99,235,0.10);
    }

    .forgot-header{

        text-align:center;

        padding:45px 25px;

        background:
        linear-gradient(
            135deg,
            #2563eb,
            #3b82f6
        );
    }

    .forgot-icon{

        width:100px;
        height:100px;

        margin:auto;

        border-radius:50%;

        display:flex;
        justify-content:center;
        align-items:center;

        background:
        rgba(255,255,255,0.15);

        border:
        1px solid rgba(255,255,255,0.25);

        animation:float 3s ease-in-out infinite;
    }

    .forgot-header h2{

        color:white;

        margin-top:22px;

        font-weight:bold;

        font-size:32px;
    }

    .forgot-header p{

        color:#e0ecff;

        margin-top:12px;

        line-height:1.9;

        font-size:15px;
    }

    .card-body{
        padding:40px;
    }

    .form-label{

        color:#1e293b;

        font-weight:700;

        margin-bottom:10px;
    }

    .custom-input{

        background:#f8fafc !important;

        border:
        1px solid #cbd5e1 !important;

        color:#0f172a !important;

        padding:14px;

        border-radius:14px !important;
    }

    .custom-input::placeholder{

        color:#94a3b8;
    }

    .custom-input:focus{

        border-color:#3b82f6 !important;

        box-shadow:
        0 0 0 0.25rem rgba(59,130,246,0.18) !important;
    }

    .input-group-text{

        background:#eff6ff !important;

        border:
        1px solid #cbd5e1 !important;

        color:#2563eb !important;

        border-radius:14px !important;
    }

    .reset-btn{

        background:
        linear-gradient(
            135deg,
            #2563eb,
            #3b82f6
        );

        border:none;

        padding:14px;

        border-radius:15px;

        font-weight:bold;

        color:white;

        transition:0.3s;
    }

    .reset-btn:hover{

        transform:translateY(-3px);

        box-shadow:
        0 12px 24px rgba(37,99,235,0.22);
    }

    .success-box{

        background:#ecfdf5;

        border:
        1px solid #bbf7d0;

        color:#15803d;

        padding:14px;

        border-radius:14px;

        margin-bottom:25px;
    }

    .back-link{

        color:#2563eb;

        text-decoration:none;

        font-weight:600;

        transition:0.3s;
    }

    .back-link:hover{

        color:#1d4ed8;
    }

    @keyframes float{

        0%,100%{
            transform:translateY(0);
        }

        50%{
            transform:translateY(-10px);
        }
    }

    @media(max-width:576px){

        .card-body{
            padding:30px 20px;
        }

        .forgot-header h2{
            font-size:26px;
        }
    }

</style>
</head>

<body>

    <div class="forgot-card">

        <!-- Header -->

        <div class="forgot-header">

            <div class="forgot-icon">

                <i class="fas fa-key fa-3x" style="color:#dbeafe"></i>

            </div>

            <h2>
                نسيت كلمة المرور؟
            </h2>

            <p>
                لا تقلق ✨ <br>

                أدخل بريدك الإلكتروني وسنرسل لك رابط
                لإعادة تعيين كلمة المرور
            </p>

        </div>

        <!-- Body -->

        <div class="card-body">

            @if (session('status'))

                <div class="success-box">

                    <i class="fas fa-check-circle me-2"></i>

                    {{ session('status') }}

                </div>

            @endif

            <form method="POST" action="{{ route('password.email') }}">

                @csrf

                <!-- Email -->

                <div class="mb-4">

                    <label class="form-label">

                        البريد الإلكتروني

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="fas fa-envelope"></i>

                        </span>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control custom-input"
                            placeholder="example@email.com"
                            required>

                    </div>

                    @error('email')

                        <small class="text-danger d-block mt-2">

                            {{ $message }}

                        </small>

                    @enderror

                </div>

                <!-- Button -->

                <button type="submit" class="btn reset-btn w-100">

                    <i class="fas fa-paper-plane me-2"></i>

                    إرسال رابط إعادة التعيين

                </button>

            </form>

            <!-- Back -->

            <div class="text-center mt-4">

                <a href="{{ route('login') }}" class="back-link">

                    <i class="fas fa-arrow-right me-2"></i>

                    العودة لتسجيل الدخول

                </a>

            </div>

        </div>

    </div>

</body>

</html>