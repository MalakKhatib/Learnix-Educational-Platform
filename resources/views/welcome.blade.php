<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Learnix - منصة التعلّم الذكي</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- Cairo -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">


<style>

/* =====================================================
   COLORS
===================================================== */

:root{

    --primary:#8B5CF6;

    --primary-dark:#7C3AED;

    --secondary:#A855F7;

    --primary-light:#F5F3FF;

    --primary-soft:#EDE9FE;

    --success:#10B981;

    --warning:#F59E0B;

    --dark:#111827;

    --text:#374151;

    --muted:#6B7280;

    --background:#FAF9FF;

    --white:#FFFFFF;

}


/* =====================================================
   GENERAL
===================================================== */

*{

    margin:0;

    padding:0;

    box-sizing:border-box;

}


html{

    scroll-behavior:smooth;

}


body{

    margin:0;

    min-height:100vh;

    font-family:'Cairo',sans-serif;

    color:var(--text);

    background:

        linear-gradient(
            135deg,
            #FAF9FF 0%,
            #F7F3FF 50%,
            #F8FAFC 100%
        );

}


/* =====================================================
   NAVBAR
===================================================== */

.main-navbar{

    position:sticky;

    top:0;

    z-index:1000;

    width:100%;

    background:rgba(255,255,255,.94);

    backdrop-filter:blur(12px);

    border-bottom:

        1px solid #EDE9FE;

    box-shadow:

        0 5px 20px
        rgba(76,29,149,.05);

}


.navbar-inner{

    max-width:1200px;

    min-height:75px;

    margin:auto;

    padding:0 25px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:25px;

}


.brand{

    display:flex;

    align-items:center;

    gap:10px;

    text-decoration:none;

}


.brand-icon{

    width:43px;

    height:43px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:13px;

    color:white;

    background:

        linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

    box-shadow:

        0 7px 18px
        rgba(124,58,237,.20);

}


.brand-icon i{

    font-size:20px;

}


.brand-text{

    color:var(--dark);

    font-size:20px;

    font-weight:800;

}


.brand-text span{

    color:var(--primary);

}


.nav-links{

    display:flex;

    align-items:center;

    gap:28px;

}


.nav-links a{

    color:#4B5563;

    text-decoration:none;

    font-size:15px;

    font-weight:600;

    transition:.25s;

}


.nav-links a:hover{

    color:var(--primary);

}


.nav-buttons{

    display:flex;

    align-items:center;

    gap:10px;

}


.nav-login{

    padding:10px 18px;

    color:var(--primary);

    text-decoration:none;

    border-radius:12px;

    font-size:14px;

    font-weight:700;

    transition:.25s;

}


.nav-login:hover{

    color:var(--primary-dark);

    background:var(--primary-light);

}


.nav-register{

    padding:11px 20px;

    color:white;

    text-decoration:none;

    border-radius:13px;

    font-size:14px;

    font-weight:700;

    background:

        linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

    box-shadow:

        0 7px 18px
        rgba(124,58,237,.15);

    transition:.25s;

}


.nav-register:hover{

    color:white;

    transform:translateY(-2px);

    box-shadow:

        0 10px 22px
        rgba(124,58,237,.22);

}


/* =====================================================
   HERO
===================================================== */

.hero{

    padding:

        70px 20px
        55px;

}


.hero-container{

    max-width:1150px;

    margin:auto;

    display:grid;

    grid-template-columns:
        .85fr
        1.15fr;

    align-items:center;

    gap:60px;

}


.hero-badge{

    display:inline-flex;

    align-items:center;

    gap:8px;

    margin-bottom:20px;

    padding:8px 15px;

    color:var(--primary);

    background:var(--primary-light);

    border:

        1px solid #DDD6FE;

    border-radius:30px;

    font-size:13px;

    font-weight:700;

}


.hero-badge i{

    font-size:13px;

}


.hero-title{

    margin-bottom:20px;

    color:var(--dark);

    font-size:47px;

    line-height:1.45;

    font-weight:800;

}


.hero-title span{

    display:block;

    color:var(--primary);

}


.hero-description{

    max-width:620px;

    margin-bottom:30px;

    color:var(--muted);

    font-size:17px;

    line-height:2;

}


.hero-buttons{

    display:flex;

    align-items:center;

    gap:13px;

    flex-wrap:wrap;

}


.primary-btn{

    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    padding:14px 25px;

    color:white;

    background:

        linear-gradient(
            135deg,
            var(--primary),
            var(--primary-dark)
        );

    border-radius:15px;

    text-decoration:none;

    font-size:15px;

    font-weight:700;

    box-shadow:

        0 9px 22px
        rgba(124,58,237,.18);

    transition:.3s;

}


.primary-btn:hover{

    color:white;

    transform:translateY(-3px);

    box-shadow:

        0 13px 28px
        rgba(124,58,237,.25);

}


.secondary-btn{

    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    padding:14px 25px;

    color:var(--primary);

    background:white;

    border:

        1px solid #DDD6FE;

    border-radius:15px;

    text-decoration:none;

    font-size:15px;

    font-weight:700;

    transition:.3s;

}


.secondary-btn:hover{

    color:var(--primary-dark);

    background:var(--primary-light);

    transform:translateY(-3px);

}


/* =====================================================
   DASHBOARD PREVIEW
===================================================== */

.dashboard-preview{

    position:relative;

}


.preview-window{

    overflow:hidden;

    background:white;

    border:

        1px solid #EDE9FE;

    border-radius:25px;

    box-shadow:

        0 20px 50px
        rgba(76,29,149,.10);

}


.preview-top{

    height:55px;

    padding:0 20px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    background:#FCFAFF;

    border-bottom:

        1px solid #F1ECFF;

}


.preview-dots{

    display:flex;

    gap:6px;

}


.preview-dots span{

    width:8px;

    height:8px;

    border-radius:50%;

    background:#C4B5FD;

}


.preview-title{

    color:#6B7280;

    font-size:12px;

    font-weight:600;

}


.preview-content{

    padding:25px;

}


.preview-welcome{

    padding:22px;

    margin-bottom:18px;

    color:white;

    background:

        linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

    border-radius:19px;

}


.preview-welcome small{

    display:block;

    margin-bottom:7px;

    font-size:12px;

    opacity:.9;

}


.preview-welcome h4{

    margin:0;

    font-size:18px;

    font-weight:700;

}


.preview-stats{

    display:grid;

    grid-template-columns:
        repeat(3,1fr);

    gap:12px;

    margin-bottom:18px;

}


.preview-stat{

    padding:16px 10px;

    text-align:center;

    background:#FAF9FF;

    border:

        1px solid #F0EAFE;

    border-radius:17px;

}


.preview-stat i{

    display:block;

    margin-bottom:8px;

    color:var(--primary);

    font-size:18px;

}


.preview-stat strong{

    display:block;

    color:var(--dark);

    font-size:20px;

    font-weight:800;

}


.preview-stat span{

    display:block;

    margin-top:3px;

    color:#9CA3AF;

    font-size:11px;

}


.preview-course{

    padding:18px;

    background:#FAFAFF;

    border:

        1px solid #F0EAFE;

    border-radius:17px;

}


.preview-course-top{

    display:flex;

    align-items:center;

    justify-content:space-between;

    margin-bottom:12px;

}


.preview-course-top h6{

    margin:0;

    color:var(--dark);

    font-size:13px;

    font-weight:700;

}


.preview-course-top small{

    color:var(--primary);

    font-size:12px;

    font-weight:700;

}


.preview-progress{

    height:9px;

    overflow:hidden;

    background:#EDE9FE;

    border-radius:20px;

}


.preview-progress span{

    display:block;

    width:72%;

    height:100%;

    background:

        linear-gradient(
            90deg,
            var(--primary),
            var(--secondary)
        );

    border-radius:20px;

}


/* =====================================================
   FLOATING CARDS
===================================================== */

.floating-card{

    position:absolute;

    z-index:5;

    display:flex;

    align-items:center;

    gap:10px;

    padding:13px 15px;

    background:white;

    border:

        1px solid #EDE9FE;

    border-radius:16px;

    box-shadow:

        0 12px 30px
        rgba(76,29,149,.11);

}


.floating-card i{

    width:38px;

    height:38px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:11px;

    color:var(--primary);

    background:var(--primary-light);

}


.floating-card strong{

    display:block;

    color:var(--dark);

    font-size:13px;

}


.floating-card small{

    display:block;

    margin-top:2px;

    color:#9CA3AF;

    font-size:11px;

}


.card-one{

    top:30px;

    left:-25px;

}


.card-two{

    right:-25px;

    bottom:25px;

}


/* =====================================================
   STATISTICS
===================================================== */

.stats{

    padding:0 20px;

}


.section-container{

    max-width:1100px;

    margin:auto;

}


.stats-box{

    display:grid;

    grid-template-columns:
        repeat(4,1fr);

    overflow:hidden;

    background:white;

    border:

        1px solid #EDE9FE;

    border-radius:25px;

    box-shadow:

        0 12px 35px
        rgba(76,29,149,.06);

}


.stat{

    padding:25px 15px;

    text-align:center;

    border-left:

        1px solid #F0EAFE;

}


.stat:last-child{

    border-left:none;

}


.stat-icon{

    width:48px;

    height:48px;

    margin:0 auto 10px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:var(--primary);

    background:var(--primary-light);

    border-radius:14px;

}


.stat-number{

    color:var(--primary);

    font-size:31px;

    font-weight:800;

}


.stat-label{

    margin-top:3px;

    color:var(--muted);

    font-size:14px;

}


/* =====================================================
   SECTIONS
===================================================== */

.section{

    padding:

        75px 20px;

}


.section-header{

    max-width:700px;

    margin:0 auto 40px;

    text-align:center;

}


.section-label{

    display:inline-block;

    margin-bottom:10px;

    padding:7px 14px;

    color:var(--primary);

    background:var(--primary-light);

    border-radius:20px;

    font-size:12px;

    font-weight:700;

}


.section-title{

    margin-bottom:12px;

    color:var(--dark);

    font-size:30px;

    line-height:1.5;

    font-weight:800;

}


.section-description{

    margin:0;

    color:var(--muted);

    font-size:15px;

    line-height:2;

}


/* =====================================================
   FEATURES
===================================================== */

.features-section{

    background:transparent;

}


.features-grid{

    display:grid;

    grid-template-columns:
        repeat(4,1fr);

    gap:20px;

}


.feature-card{

    height:100%;

    padding:30px 22px;

    text-align:center;

    background:white;

    border:

        1px solid #EDE9FE;

    border-radius:24px;

    box-shadow:

        0 10px 28px
        rgba(76,29,149,.05);

    transition:.35s;

}


.feature-card:hover{

    transform:translateY(-8px);

    box-shadow:

        0 18px 38px
        rgba(76,29,149,.11);

}


.feature-icon{

    width:70px;

    height:70px;

    margin:

        0 auto 18px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:var(--primary);

    background:var(--primary-light);

    border-radius:20px;

    font-size:26px;

}


.feature-card h4{

    margin-bottom:10px;

    color:var(--dark);

    font-size:18px;

    font-weight:800;

}


.feature-card p{

    margin:0;

    color:var(--muted);

    font-size:14px;

    line-height:2;

}


/* =====================================================
   JOURNEY
===================================================== */

.journey{

    display:grid;

    grid-template-columns:
        repeat(5,1fr);

    gap:15px;

}


.journey-step{

    position:relative;

    padding:25px 18px;

    text-align:center;

    background:white;

    border:

        1px solid #EDE9FE;

    border-radius:22px;

    box-shadow:

        0 8px 25px
        rgba(76,29,149,.05);

    transition:.3s;

}


.journey-step:hover{

    transform:translateY(-5px);

    box-shadow:

        0 15px 30px
        rgba(76,29,149,.09);

}


.journey-number{

    width:48px;

    height:48px;

    margin:

        0 auto 16px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:white;

    background:

        linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

    border-radius:15px;

    font-size:18px;

    font-weight:800;

}


.journey-step h5{

    margin-bottom:8px;

    color:var(--dark);

    font-size:16px;

    font-weight:800;

}


.journey-step p{

    margin:0;

    color:var(--muted);

    font-size:13px;

    line-height:1.9;

}


/* =====================================================
   CTA
===================================================== */

.cta{

    position:relative;

    overflow:hidden;

    padding:55px 25px;

    text-align:center;

    color:white;

    background:

        linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

    border-radius:30px;

    box-shadow:

        0 20px 45px
        rgba(124,58,237,.18);

}


.cta::before{

    content:"";

    position:absolute;

    width:250px;

    height:250px;

    left:-100px;

    top:-120px;

    border-radius:50%;

    background:

        rgba(255,255,255,.07);

}


.cta h2{

    position:relative;

    z-index:2;

    margin-bottom:12px;

    font-size:30px;

    font-weight:800;

}


.cta p{

    position:relative;

    z-index:2;

    margin-bottom:25px;

    opacity:.9;

    font-size:15px;

}


.cta-btn{

    position:relative;

    z-index:2;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:9px;

    padding:14px 28px;

    color:var(--primary);

    background:white;

    border-radius:15px;

    text-decoration:none;

    font-size:15px;

    font-weight:800;

    transition:.3s;

}


.cta-btn:hover{

    color:var(--primary-dark);

    transform:translateY(-3px);

}


/* =====================================================
   FOOTER
===================================================== */

.footer{

    margin-top:0;

    padding:

        35px 20px;

    background:white;

    border-top:

        1px solid #EDE9FE;

}


.footer-container{

    max-width:1100px;

    margin:auto;

    text-align:center;

}


.footer-brand{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:10px;

    margin-bottom:10px;

}


.footer-brand-icon{

    width:38px;

    height:38px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:white;

    background:

        linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

    border-radius:12px;

}


.footer-brand span{

    color:var(--dark);

    font-size:16px;

    font-weight:800;

}


.footer p{

    margin:5px 0;

    color:#94A3B8;

    font-size:13px;

}


/* =====================================================
   ANIMATION
===================================================== */

@keyframes float{

    0%,100%{

        transform:translateY(0);

    }

    50%{

        transform:translateY(-8px);

    }

}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:1000px){

    .hero-container{

        grid-template-columns:1fr;

        text-align:center;

    }


    .hero-description{

        margin-left:auto;

        margin-right:auto;

    }


    .hero-buttons{

        justify-content:center;

    }


    .dashboard-preview{

        max-width:850px;

        margin-top:25px;

    }


    .features-grid{

        grid-template-columns:
            repeat(2,1fr);

    }


    .journey{

        grid-template-columns:
            repeat(3,1fr);

    }

}


@media(max-width:768px){

    .navbar-inner{

        min-height:68px;

    }


    .nav-links{

        display:none;

    }


    .hero{

        padding:
            55px 20px
            45px;

    }


    .hero-title{

        font-size:38px;

    }


    .hero-description{

        font-size:16px;

    }


    .stats-box{

        grid-template-columns:
            repeat(2,1fr);

    }


    .stat{

        border-bottom:
            1px solid #F0EAFE;

    }


    .stat:nth-child(even){

        border-left:none;

    }


    .features-grid{

        grid-template-columns:1fr;

    }


    .journey{

        grid-template-columns:
            repeat(2,1fr);

    }


    .card-one{

        left:10px;

    }


    .card-two{

        right:10px;

    }

}


@media(max-width:520px){

    .navbar-inner{

        padding:0 15px;

    }


    .brand-text{

        font-size:17px;

    }


    .nav-buttons{

        gap:5px;

    }


    .nav-login{

        padding:8px 10px;

        font-size:12px;

    }


    .nav-register{

        padding:9px 12px;

        font-size:12px;

    }


    .hero-title{

        font-size:31px;

    }


    .hero-description{

        font-size:15px;

    }


    .primary-btn,
    .secondary-btn{

        width:100%;

    }


    .hero-buttons{

        width:100%;

    }


    .preview-stats{

        grid-template-columns:1fr;

    }


    .floating-card{

        display:none;

    }


    .journey{

        grid-template-columns:1fr;

    }


    .section-title{

        font-size:25px;

    }


    .cta h2{

        font-size:25px;

    }

}
/* =========================
   Welcome Dashboard Animation
========================= */

.dashboard-preview{

    animation:
        dashboardFloat
        4s
        ease-in-out
        infinite;

}


@keyframes dashboardFloat{

    0%,100%{

        transform:translateY(0);

    }

    50%{

        transform:translateY(-10px);

    }

}


/* =========================
   Floating Small Cards
========================= */

.card-one{

    animation:
        cardFloatOne
        3s
        ease-in-out
        infinite;

}


.card-two{

    animation:
        cardFloatTwo
        3.5s
        ease-in-out
        infinite;

}


@keyframes cardFloatOne{

    0%,100%{

        transform:translateY(0);

    }

    50%{

        transform:translateY(-10px);

    }

}


@keyframes cardFloatTwo{

    0%,100%{

        transform:translateY(0);

    }

    50%{

        transform:translateY(10px);

    }



}
/* =====================================================
   WELCOME THEME TOGGLE
===================================================== */

.welcome-theme-toggle {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: var(--primary);

    background: var(--primary-light);

    border: 1px solid #DDD6FE;

    border-radius: 12px;

    font-size: 15px;

    cursor: pointer;

    transition: .25s ease;
}

.welcome-theme-toggle:hover {
    transform: translateY(-2px);

    background: #EDE9FE;

    box-shadow:
        0 7px 18px rgba(124,58,237,.12);
}


/* =====================================================
   WELCOME DARK MODE
===================================================== */

body.dark-mode {
    --dark: #F3EEF8;
    --text: #D8D0DF;
    --muted: #AAA0B0;
    --background: #252130;
    --white: #302A3B;

    background:
        linear-gradient(
            135deg,
            #252130 0%,
            #2B2536 50%,
            #241F2D 100%
        );
}


/* NAVBAR */

body.dark-mode .main-navbar {
    background: rgba(43,37,54,.94);

    border-bottom-color: #443B50;

    box-shadow:
        0 5px 20px rgba(10,7,15,.18);
}

body.dark-mode .brand-text {
    color: #F3EEF8;
}

body.dark-mode .nav-links a {
    color: #C8C0CF;
}

body.dark-mode .nav-links a:hover {
    color: #C3A6EF;
}

body.dark-mode .nav-login {
    color: #C7A8F0;
}

body.dark-mode .nav-login:hover {
    color: white;

    background: #3F354D;
}

body.dark-mode .welcome-theme-toggle {
    color: #F5C968;

    background: #40374E;

    border-color: #51465E;
}

body.dark-mode .welcome-theme-toggle:hover {
    background: #4A4058;
}


/* HERO */

body.dark-mode .hero-title {
    color: #F3EEF8;
}

body.dark-mode .hero-description {
    color: #AAA0B0;
}

body.dark-mode .hero-badge {
    color: #C6A8EE;

    background: #433650;

    border-color: #554663;
}

body.dark-mode .secondary-btn {
    color: #C8A9EF;

    background: #302A3B;

    border-color: #554963;
}

body.dark-mode .secondary-btn:hover {
    color: white;

    background: #40364E;
}


/* DASHBOARD PREVIEW */

body.dark-mode .preview-window {
    background: #302A3B;

    border-color: #4A4054;

    box-shadow:
        0 20px 50px rgba(10,7,15,.18);
}

body.dark-mode .preview-top {
    background: #282330;

    border-bottom-color: #41384B;
}

body.dark-mode .preview-title {
    color: #B2A8B9;
}

body.dark-mode .preview-content {
    background: #302A3B;
}

body.dark-mode .preview-stat {
    background: #352E41;

    border-color: #463D52;
}

body.dark-mode .preview-stat strong {
    color: #EEE8F4;
}

body.dark-mode .preview-stat span {
    color: #9F95A7;
}

body.dark-mode .preview-course {
    background: #352E41;

    border-color: #463D52;
}

body.dark-mode .preview-course-top h6 {
    color: #EEE8F4;
}

body.dark-mode .preview-course-top small {
    color: #C0A1EC;
}

body.dark-mode .preview-progress {
    background: #463C50;
}


/* FLOATING CARDS */

body.dark-mode .floating-card {
    background: #302A3B;

    border-color: #4A4054;

    box-shadow:
        0 12px 30px rgba(10,7,15,.20);
}

body.dark-mode .floating-card strong {
    color: #EEE8F4;
}

body.dark-mode .floating-card small {
    color: #9F95A7;
}

body.dark-mode .floating-card i {
    color: #C3A6EF;

    background: #443650;
}


/* STATISTICS */

body.dark-mode .stats-box {
    background: #302A3B;

    border-color: #443B50;

    box-shadow:
        0 12px 35px rgba(10,7,15,.10);
}

body.dark-mode .stat {
    border-left-color: #443B50;
}

body.dark-mode .stat-label {
    color: #A69CAB;
}

body.dark-mode .stat-icon {
    color: #C3A6EF;

    background: #443650;
}


/* SECTIONS */

body.dark-mode .section-title {
    color: #F0EBF5;
}

body.dark-mode .section-description {
    color: #AAA0B0;
}

body.dark-mode .section-label {
    color: #C3A6EF;

    background: #443650;
}


/* FEATURES */

body.dark-mode .feature-card {
    background: #302A3B;

    border-color: #443B50;

    box-shadow:
        0 10px 28px rgba(10,7,15,.08);
}

body.dark-mode .feature-card:hover {
    box-shadow:
        0 18px 38px rgba(10,7,15,.15);
}

body.dark-mode .feature-icon {
    color: #C3A6EF;

    background: #443650;
}

body.dark-mode .feature-card h4 {
    color: #EEE8F4;
}

body.dark-mode .feature-card p {
    color: #A69CAB;
}


/* JOURNEY */

body.dark-mode .journey-step {
    background: #302A3B;

    border-color: #443B50;

    box-shadow:
        0 8px 25px rgba(10,7,15,.08);
}

body.dark-mode .journey-step h5 {
    color: #EEE8F4;
}

body.dark-mode .journey-step p {
    color: #A69CAB;
}


/* CTA */

body.dark-mode .cta {
    box-shadow:
        0 20px 45px rgba(10,7,15,.18);
}


/* FOOTER */

body.dark-mode .footer {
    background: #27222F;

    border-top-color: #443B50;
}

body.dark-mode .footer-brand span {
    color: #EEE8F4;
}

body.dark-mode .footer p {
    color: #9F95A7;
}


/* MOBILE */

@media(max-width:520px){

    .welcome-theme-toggle {
        width: 38px;
        height: 38px;

        font-size: 13px;
    }

}
</style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="main-navbar">

    <div class="navbar-inner">


        <a href="/" class="brand">

            <div class="brand-icon">

                <i class="fas fa-graduation-cap"></i>

            </div>

          <div class="brand-text">
    Learn<span>ix</span>
</div>

        </a>


        <div class="nav-links">

            <a href="#features">
                المميزات
            </a>

            <a href="#journey">
                كيف تعمل المنصة؟
            </a>

            <a href="#about">
                عن المنصة
            </a>

        </div>


        <div class="nav-buttons">

    <button
        type="button"
        id="welcomeThemeToggle"
        class="welcome-theme-toggle"
        aria-label="تبديل الوضع">

        <i class="fas fa-moon"></i>

    </button>

    <a href="{{ route('login') }}"
       class="nav-login">

        تسجيل الدخول

    </a>

    <a href="{{ route('register') }}"
       class="nav-register">

        إنشاء حساب

    </a>

</div>

    </div>

</nav>



<!-- =====================================================
     HERO
===================================================== -->

<section class="hero">

    <div class="hero-container">


        <!-- Text -->

        <div>

            <div class="hero-badge">

                <i class="fas fa-sparkles"></i>

                منصة تعليمية متكاملة

            </div>


            <h1 class="hero-title">

                تعلّم اليوم...

                <span>
                    واصنع مستقبلك غداً
                </span>

            </h1>


            <p class="hero-description">

                منصة Learnix التعليمية تمنحك تجربة تعليمية
                متكاملة تجمع بين الكورسات والدروس
                والاختبارات ومتابعة التقدم والشهادات
                في مكان واحد.

            </p>


            <div class="hero-buttons">

                <a href="{{ route('register') }}"
                   class="primary-btn">

                    <i class="fas fa-rocket"></i>

                    ابدأ رحلتك التعليمية

                </a>


                <a href="#features"
                   class="secondary-btn">

                    <i class="fas fa-arrow-down"></i>

                    اكتشف المنصة

                </a>

            </div>

        </div>



        <!-- Dashboard Preview -->

        <div class="dashboard-preview">


            <div class="preview-window">


                <div class="preview-top">

                    <div class="preview-dots">

                        <span></span>
                        <span></span>
                        <span></span>

                    </div>

                    <div class="preview-title">

                      منصة Learnix التعليمية

                    </div>

                </div>


                <div class="preview-content">


                    <div class="preview-welcome">

                        <small>
                            أهلاً بك في رحلتك التعليمية
                        </small>

                        <h4>
                            استمر بالتعلم وحقق أهدافك
                        </h4>

                    </div>


                    <div class="preview-stats">


                        <div class="preview-stat">

                            <i class="fas fa-book-open"></i>

                            <strong>
                                12
                            </strong>

                            <span>
                                كورس
                            </span>

                        </div>


                        <div class="preview-stat">

                            <i class="fas fa-tasks"></i>

                            <strong>
                                35
                            </strong>

                            <span>
                                درس مكتمل
                            </span>

                        </div>


                        <div class="preview-stat">

                            <i class="fas fa-trophy"></i>

                            <strong>
                                96%
                            </strong>

                            <span>
                                متوسط النتائج
                            </span>

                        </div>


                    </div>


                    <div class="preview-course">

                        <div class="preview-course-top">

                            <h6>
                                Laravel Development
                            </h6>

                            <small>
                                72%
                            </small>

                        </div>


                        <div class="preview-progress">

                            <span></span>

                        </div>

                    </div>


                </div>

            </div>


            <!-- Floating Card -->

            <div class="floating-card card-one">

                <i class="fas fa-certificate"></i>

                <div>

                    <strong>
                        شهادة جديدة
                    </strong>

                    <small>
                        تم إتمام الكورس بنجاح
                    </small>

                </div>

            </div>


            <div class="floating-card card-two">

                <i class="fas fa-chart-line"></i>

                <div>

                    <strong>
                        تقدم ممتاز!
                    </strong>

                    <small>
                        لقد حققت 72% من هدفك
                    </small>

                </div>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     STATISTICS
===================================================== -->

<section class="stats">

    <div class="section-container">

        <div class="stats-box">


            <div class="stat">

                <div class="stat-icon">

                    <i class="fas fa-users"></i>

                </div>

                <div class="stat-number">
                 +{{ $studentsCount }}
                </div>

                <div class="stat-label">
                    طالب
                </div>

            </div>


            <div class="stat">

                <div class="stat-icon">

                    <i class="fas fa-chalkboard-user"></i>

                </div>

                <div class="stat-number">
                    +{{ $teachersCount }}
                </div>

                <div class="stat-label">
                    معلم
                </div>

            </div>


            <div class="stat">

                <div class="stat-icon">

                    <i class="fas fa-book"></i>

                </div>

                <div class="stat-number">
                +{{ $coursesCount }}
                </div>

                <div class="stat-label">
                    كورس
                </div>

            </div>


            <div class="stat">

                <div class="stat-icon">

                    <i class="fas fa-star"></i>

                </div>

                <div class="stat-number">
                   +{{ $lessonsCount }}
                </div>

                <div class="stat-label">
                    درس
                </div>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     FEATURES
===================================================== -->

<section class="section features-section"
         id="features">

    <div class="section-container">


        <div class="section-header">

            <div class="section-label">

              لماذا Learnix؟

            </div>

            <h2 class="section-title">

                كل ما تحتاجه لتعلّم أفضل

            </h2>

            <p class="section-description">

                صممنا المنصة لتجمع الأدوات التعليمية
                التي تحتاجها في تجربة واحدة بسيطة
                ومنظمة وسهلة الاستخدام.

            </p>

        </div>


        <div class="features-grid">


            <div class="feature-card">

                <div class="feature-icon">

                    <i class="fas fa-book-open"></i>

                </div>

                <h4>
                    كورسات ودروس
                </h4>

                <p>

                    محتوى تعليمي منظم يساعدك
                    على التعلم خطوة بخطوة.

                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">

                    <i class="fas fa-clipboard-check"></i>

                </div>

                <h4>
                    اختبارات إلكترونية
                </h4>

                <p>

                    اختبر معلوماتك وتابع نتائجك
                    بطريقة سهلة وسريعة.

                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">

                    <i class="fas fa-chart-line"></i>

                </div>

                <h4>
                    متابعة التقدم
                </h4>

                <p>

                    تعرف دائماً أين وصلت وما الذي
                    تحتاج إلى إكماله.

                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">

                    <i class="fas fa-certificate"></i>

                </div>

                <h4>
                    شهادات الإتمام
                </h4>

                <p>

                    احصل على شهادة عند إتمام
                    متطلبات الكورس.

                </p>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     JOURNEY
===================================================== -->

<section class="section journey-section"
         id="journey">

    <div class="section-container">


        <div class="section-header">

            <div class="section-label">

                رحلتك التعليمية

            </div>

            <h2 class="section-title">

                من التسجيل إلى الإنجاز

            </h2>

            <p class="section-description">

                تجربة تعليمية متكاملة بخطوات واضحة
                تساعدك على الوصول إلى هدفك.

            </p>

        </div>


        <div class="journey">


            <div class="journey-step">

                <div class="journey-number">
                    1
                </div>

                <h5>
                    أنشئ حسابك
                </h5>

                <p>
                    سجل في المنصة وابدأ رحلتك.
                </p>

            </div>


            <div class="journey-step">

                <div class="journey-number">
                    2
                </div>

                <h5>
                    اختر الكورس
                </h5>

                <p>
                    اختر المجال الذي تريد تعلمه.
                </p>

            </div>


            <div class="journey-step">

                <div class="journey-number">
                    3
                </div>

                <h5>
                    تعلم
                </h5>

                <p>
                    ادرس الدروس وتابع تقدمك.
                </p>

            </div>


            <div class="journey-step">

                <div class="journey-number">
                    4
                </div>

                <h5>
                    اختبر نفسك
                </h5>

                <p>
                    حل الاختبارات وتابع نتائجك.
                </p>

            </div>


            <div class="journey-step">

                <div class="journey-number">
                    5
                </div>

                <h5>
                    احصل على الشهادة
                </h5>

                <p>
                    أكمل متطلبات الكورس واحصل على شهادتك.
                </p>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     CTA
===================================================== -->

<section class="section">

    <div class="section-container">

        <div class="cta">

            <h2>

                مستعد تبدأ رحلتك؟

            </h2>

            <p>

انضم إلى منصة Learnix وابدأ التعلم
                بطريقة منظمة وتفاعلية.

            </p>


            <a href="{{ route('register') }}"
               class="cta-btn">

                إنشاء حساب الآن

                <i class="fas fa-arrow-left"></i>

            </a>

        </div>

    </div>

</section>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="footer"
        id="about">

    <div class="footer-container">


        <div class="footer-brand">

            <div class="footer-brand-icon">

                <i class="fas fa-graduation-cap"></i>

            </div>

            <span>
                منصة Learnix التعليمية
            </span>

        </div>


        <p>

            منصة تعليمية متكاملة لإدارة
            وتجربة التعلم الحديثة.

        </p>


        <p>

            © {{ date('Y') }}
Learnix - منصة التعلّم الذكي
        </p>


    </div>

</footer>
<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const body =
            document.body;

        const toggle =
            document.getElementById(
                'welcomeThemeToggle'
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
