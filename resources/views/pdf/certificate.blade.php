<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Learnix Certificate</title>

    <style>

        @page {
            size: A4 landscape;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #ffffff;
            font-family: DejaVu Sans, sans-serif;
            color: #30243D;
        }

        /* =====================================================
           CERTIFICATE
        ====================================================== */

        .certificate {
            width: 297mm;
            height: 210mm;
            position: relative;
            overflow: hidden;
            background: #FCFAF7;
        }

        /* =====================================================
           BACKGROUND
        ====================================================== */

        .left-panel {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 31mm;
            background: #2E1557;
        }

        .right-panel {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 18mm;
            background: #351863;
        }

        .left-gold-line {
            position: absolute;
            top: 0;
            left: 31mm;
            bottom: 0;
            width: 2px;
            background: #C9A64E;
        }

        .right-gold-line {
            position: absolute;
            top: 0;
            right: 18mm;
            bottom: 0;
            width: 2px;
            background: #C9A64E;
        }

        .bg-circle-one {
            position: absolute;
            width: 145mm;
            height: 145mm;
            border: 1px solid #EEE6F8;
            border-radius: 50%;
            top: -105mm;
            right: -45mm;
        }

        .bg-circle-two {
            position: absolute;
            width: 115mm;
            height: 115mm;
            border: 1px solid #F0E8F8;
            border-radius: 50%;
            bottom: -83mm;
            left: 18mm;
        }

        .bg-circle-three {
            position: absolute;
            width: 75mm;
            height: 75mm;
            border: 1px solid #F3EDF9;
            border-radius: 50%;
            top: 75mm;
            left: 85mm;
        }

        /* =====================================================
           DECORATIVE GOLD CURVES
        ====================================================== */

        .gold-curve {
            position: absolute;
            width: 90mm;
            height: 90mm;
            border: 3px solid #C9A64E;
            border-radius: 50%;
            opacity: .85;
        }

        .gold-curve.left-top {
            top: -58mm;
            left: -56mm;
        }

        .gold-curve.left-bottom {
            bottom: -58mm;
            left: -56mm;
        }

        .gold-curve.right-top {
            top: -58mm;
            right: -58mm;
        }

        .gold-curve.right-bottom {
            bottom: -58mm;
            right: -58mm;
        }

        /* =====================================================
           FRAMES
        ====================================================== */

        .outer-frame {
            position: absolute;
            top: 6mm;
            left: 6mm;
            right: 6mm;
            bottom: 6mm;
            border: 2px solid #C9A64E;
            z-index: 10;
        }

        .inner-frame {
            position: absolute;
            top: 10mm;
            left: 10mm;
            right: 10mm;
            bottom: 10mm;
            border: 1px solid #DCCBEE;
            z-index: 10;
        }

        .inner-frame-two {
            position: absolute;
            top: 14mm;
            left: 14mm;
            right: 14mm;
            bottom: 14mm;
            border: 1px solid #EEE7F5;
            z-index: 10;
        }

        /* =====================================================
           CORNERS
        ====================================================== */

        .corner {
            position: absolute;
            width: 30px;
            height: 30px;
            z-index: 20;
        }

        .corner:before,
        .corner:after {
            content: "";
            position: absolute;
            background: #C9A64E;
        }

        .corner:before {
            width: 30px;
            height: 2px;
        }

        .corner:after {
            width: 2px;
            height: 30px;
        }

        .corner-tl {
            top: 17mm;
            left: 17mm;
        }

        .corner-tr {
            top: 17mm;
            right: 17mm;
            transform: rotate(90deg);
        }

        .corner-bl {
            bottom: 17mm;
            left: 17mm;
            transform: rotate(-90deg);
        }

        .corner-br {
            bottom: 17mm;
            right: 17mm;
            transform: rotate(180deg);
        }

        /* =====================================================
           LEFT BRAND AREA
        ====================================================== */

        .brand-area {
            position: absolute;
            top: 42mm;
            left: 8mm;
            width: 46mm;
            text-align: center;
            z-index: 30;
            color: #ffffff;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            margin: 0 auto 9px auto;
            border: 2px solid #C9A64E;
            border-radius: 50%;
            position: relative;
            text-align: center;
            padding-top: 8px;
        }

        .brand-mark:before {
            content: "";
            position: absolute;
            top: 6px;
            left: 6px;
            right: 6px;
            bottom: 6px;
            border: 1px solid #E1C879;
            border-radius: 50%;
        }

        .brand-mark-star {
            font-size: 15px;
            color: #E1C879;
        }

        .brand-name {
            font-size: 17px;
            font-weight: bold;
            letter-spacing: 3px;
            margin-bottom: 4px;
        }

        .brand-tagline {
            font-size: 6px;
            line-height: 1.7;
            letter-spacing: 1px;
            color: #D8C9EA;
        }

        .brand-divider {
            width: 35px;
            height: 1px;
            background: #C9A64E;
            margin: 13px auto;
        }

        .side-quote {
            font-size: 7px;
            line-height: 1.8;
            color: #E8DFF1;
            font-style: italic;
        }

        /* =====================================================
           HEADER
        ====================================================== */

        .header {
            position: absolute;
            top: 20mm;
            left: 56mm;
            right: 54mm;
            text-align: center;
            z-index: 30;
        }

        .small-heading {
            font-size: 7px;
            color: #8B5CF6;
            font-weight: bold;
            letter-spacing: 3px;
            margin-bottom: 6px;
        }

        .title {
            font-size: 28px;
            color: #31164F;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 6px;
        }

        .gold-ornament {
            width: 145px;
            height: 1px;
            background: #C9A64E;
            margin: 0 auto;
            position: relative;
        }

        .gold-ornament:before,
        .gold-ornament:after {
            content: "";
            position: absolute;
            width: 7px;
            height: 7px;
            border: 1px solid #C9A64E;
            background: #FCFAF7;
            transform: rotate(45deg);
            top: -4px;
        }

        .gold-ornament:before {
            left: 0;
        }

        .gold-ornament:after {
            right: 0;
        }

        .title-subtitle {
            font-size: 7px;
            color: #94899F;
            letter-spacing: 1px;
            margin-top: 8px;
        }

        /* =====================================================
           MAIN CONTENT
        ====================================================== */

        .main-content {
            position: absolute;
            top: 62mm;
            left: 57mm;
            right: 58mm;
            text-align: center;
            z-index: 30;
        }

        .presented {
            font-size: 9px;
            color: #92889C;
            margin-bottom: 7px;
        }

        .student-name {
            font-size: 28px;
            font-weight: bold;
            color: #6D28D9;
            margin-bottom: 5px;
        }

        .student-line {
            width: 190px;
            height: 1px;
            background: #C9A64E;
            margin: 0 auto 11px auto;
        }

        .completion-text {
            font-size: 8px;
            color: #92889C;
            margin-bottom: 5px;
        }

        .course-name {
            font-size: 19px;
            font-weight: bold;
            color: #34273F;
            max-width: 170mm;
            margin: 0 auto;
        }

        /* =====================================================
           PERFORMANCE BADGE
        ====================================================== */

        .performance-wrapper {
            margin: 12px auto 0 auto;
            width: 112px;
            height: 52px;
            position: relative;
        }

        .performance-badge {
            width: 112px;
            height: 52px;
            border-radius: 12px;
            background: #351863;
            border: 2px solid #C9A64E;
            text-align: center;
            padding-top: 6px;
            position: relative;
        }

        .performance-badge:before {
            content: "";
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border: 1px solid #8B6A2B;
            border-radius: 9px;
        }

        .performance-label {
            position: relative;
            z-index: 2;
            font-size: 6px;
            letter-spacing: 1.5px;
            color: #E4D49B;
            margin-bottom: 2px;
        }

        .performance-value {
            position: relative;
            z-index: 2;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
        }

        .performance-status {
            position: relative;
            z-index: 2;
            font-size: 5px;
            letter-spacing: .7px;
            color: #D8C9EA;
            margin-top: 1px;
        }

        /* =====================================================
           INFORMATION STRIP
        ====================================================== */

        .info-strip {
            position: absolute;
            left: 57mm;
            right: 58mm;
            bottom: 29mm;
            height: 18mm;
            display: table;
            table-layout: fixed;
            width: calc(100% - 115mm);
            z-index: 30;
            border-top: 1px solid #E5DDBD;
            border-bottom: 1px solid #E5DDBD;
        }

        .info-item {
            display: table-cell;
            width: 33.33%;
            text-align: center;
            vertical-align: middle;
        }

        .info-item + .info-item {
            border-left: 1px solid #E4DDEB;
        }

        .info-label {
            font-size: 6px;
            color: #9B91A5;
            letter-spacing: 1px;
            margin-bottom: 3px;
        }

        .info-value {
            font-size: 8px;
            font-weight: bold;
            color: #382B43;
        }

        .info-number {
            font-size: 7px;
            color: #8B5CF6;
            font-weight: bold;
        }

        /* =====================================================
           OFFICIAL SEAL
        ====================================================== */

        .seal {
            position: absolute;
            right: 25mm;
            top: 62mm;
            width: 61px;
            height: 61px;
            border-radius: 50%;
            background: #351863;
            border: 3px solid #C9A64E;
            z-index: 40;
            text-align: center;
            padding-top: 13px;
            color: #ffffff;
        }

        .seal:before {
            content: "";
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border: 1px solid #E1C879;
            border-radius: 50%;
        }

        .seal-star {
            position: relative;
            z-index: 2;
            font-size: 13px;
            color: #E1C879;
            margin-bottom: 2px;
        }

        .seal-text {
            position: relative;
            z-index: 2;
            font-size: 6px;
            font-weight: bold;
            letter-spacing: .8px;
            line-height: 1.6;
        }

        /* =====================================================
           RIGHT QUOTE
        ====================================================== */

        .right-quote {
            position: absolute;
            right: 3mm;
            top: 77mm;
            width: 12mm;
            text-align: center;
            color: #E1D5ED;
            z-index: 30;
            font-size: 6px;
            line-height: 1.7;
            font-style: italic;
        }

        /* =====================================================
           FOOTER SIGNATURES
        ====================================================== */

        .signature-left {
            position: absolute;
            left: 57mm;
            bottom: 17mm;
            width: 48mm;
            text-align: center;
            z-index: 30;
        }

        .signature-right {
            position: absolute;
            right: 58mm;
            bottom: 17mm;
            width: 48mm;
            text-align: center;
            z-index: 30;
        }

        .signature-line {
            width: 43mm;
            height: 1px;
            background: #B9AFBF;
            margin: 0 auto 4px auto;
        }

        .signature-label {
            font-size: 6px;
            color: #9A909F;
            letter-spacing: .7px;
        }

        .signature-name {
            font-size: 8px;
            font-weight: bold;
            color: #392C43;
            margin-bottom: 2px;
        }

        /* =====================================================
           BOTTOM SEAL
        ====================================================== */

        .bottom-seal {
            position: absolute;
            left: 50%;
            bottom: 15mm;
            transform: translateX(-50%);
            width: 39px;
            height: 39px;
            border-radius: 50%;
            background: #6D28D9;
            border: 2px solid #C9A64E;
            z-index: 40;
            text-align: center;
            padding-top: 10px;
            color: #ffffff;
        }

        .bottom-seal:before {
            content: "";
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border: 1px solid #C9A64E;
            border-radius: 50%;
        }

        .bottom-seal-star {
            position: relative;
            z-index: 2;
            font-size: 10px;
            color: #E1C879;
        }

        /* =====================================================
           DECORATIVE LEAVES
        ====================================================== */

        .leaf {
            position: absolute;
            width: 35px;
            height: 15px;
            border: 1px solid #C9A64E;
            border-radius: 100% 0 100% 0;
            z-index: 20;
        }

        .leaf-one {
            left: 24mm;
            bottom: 28mm;
            transform: rotate(-35deg);
        }

        .leaf-two {
            left: 28mm;
            bottom: 35mm;
            transform: rotate(20deg);
        }

        .leaf-three {
            right: 20mm;
            bottom: 28mm;
            transform: rotate(145deg);
        }

        .leaf-four {
            right: 24mm;
            bottom: 35mm;
            transform: rotate(200deg);
        }

    </style>

</head>

<body>

<div class="certificate">

    <!-- Background -->

    <div class="left-panel"></div>
    <div class="right-panel"></div>

    <div class="left-gold-line"></div>
    <div class="right-gold-line"></div>

    <div class="bg-circle-one"></div>
    <div class="bg-circle-two"></div>
    <div class="bg-circle-three"></div>

    <div class="gold-curve left-top"></div>
    <div class="gold-curve left-bottom"></div>
    <div class="gold-curve right-top"></div>
    <div class="gold-curve right-bottom"></div>


    <!-- Frames -->

    <div class="outer-frame"></div>
    <div class="inner-frame"></div>
    <div class="inner-frame-two"></div>


    <!-- Corners -->

    <div class="corner corner-tl"></div>
    <div class="corner corner-tr"></div>
    <div class="corner corner-bl"></div>
    <div class="corner corner-br"></div>


    <!-- Learnix Side Brand -->

    <div class="brand-area">

        <div class="brand-mark">
            <div class="brand-mark-star">
                ★
            </div>
        </div>

        <div class="brand-name">
            LEARNIX
        </div>

        <div class="brand-tagline">
            SMART EDUCATIONAL<br>
            PLATFORM
        </div>

        <div class="brand-divider"></div>

        <div class="side-quote">
            Learn today.<br>
            Build tomorrow.
        </div>

    </div>


    <!-- Header -->

    <div class="header">

        <div class="small-heading">
            OFFICIAL ACHIEVEMENT
        </div>

        <div class="title">
            CERTIFICATE OF COMPLETION
        </div>

        <div class="gold-ornament"></div>

        <div class="title-subtitle">
            IN RECOGNITION OF SUCCESSFUL COURSE COMPLETION
        </div>

    </div>


    <!-- Main Content -->

    <div class="main-content">

        <div class="presented">
            This certificate is proudly presented to
        </div>

        <div class="student-name">
            {{ $user->name }}
        </div>

        <div class="student-line"></div>

        <div class="completion-text">
            For successfully completing the educational course
        </div>

        <div class="course-name">
            {{ $course->title }}
        </div>


        <!-- Performance -->

        <div class="performance-wrapper">

            <div class="performance-badge">

                <div class="performance-label">
                    FINAL PERFORMANCE
                </div>

                <div class="performance-value">

                    @if($averagePerformance !== null)
                        {{ $averagePerformance }}%
                    @else
                        —
                    @endif

                </div>

                <div class="performance-status">

                    @if($averagePerformance !== null)

                        @if($averagePerformance >= 90)
                            OUTSTANDING PERFORMANCE
                        @elseif($averagePerformance >= 80)
                            EXCELLENT PERFORMANCE
                        @elseif($averagePerformance >= 70)
                            VERY GOOD PERFORMANCE
                        @elseif($averagePerformance >= 60)
                            GOOD PERFORMANCE
                        @else
                            COMPLETED SUCCESSFULLY
                        @endif

                    @else
                        COURSE COMPLETED
                    @endif

                </div>

            </div>

        </div>

    </div>


    <!-- Official Seal -->

    <div class="seal">

        <div class="seal-star">
            ★
        </div>

        <div class="seal-text">
            LEARNIX
        </div>

        <div class="seal-text">
            VERIFIED
        </div>

        <div class="seal-text">
            2026
        </div>

    </div>


    <!-- Right Quote -->

    <div class="right-quote">
        Knowledge<br>
        empowers<br>
        better<br>
        futures
    </div>


    <!-- Information -->

    <div class="info-strip">

        <div class="info-item">

            <div class="info-label">
                UNIVERSITY
            </div>

            <div class="info-value">
                Idlib University
            </div>

        </div>


        <div class="info-item">

            <div class="info-label">
                QUIZZES COMPLETED
            </div>

            <div class="info-value">
                {{ $quizCount }}
            </div>

        </div>


        <div class="info-item">

            <div class="info-label">
                DATE OF COMPLETION
            </div>

            <div class="info-value">

                {{ $completionDate
                    ? \Carbon\Carbon::parse($completionDate)->format('Y-m-d')
                    : ''
                }}

            </div>

        </div>

    </div>


    <!-- Left Signature -->

    <div class="signature-left">

        <div class="signature-name">
            Learnix Academic Platform
        </div>

        <div class="signature-line"></div>

        <div class="signature-label">
            ACADEMIC RECOGNITION
        </div>

    </div>


    <!-- Right Signature -->

    <div class="signature-right">

        <div class="signature-name">
            Idlib University
        </div>

        <div class="signature-line"></div>

        <div class="signature-label">
            EDUCATIONAL PARTNERSHIP
        </div>

    </div>


    <!-- Bottom Seal -->

    <div class="bottom-seal">

        <div class="bottom-seal-star">
            ★
        </div>

    </div>


    <!-- Decorative Leaves -->

    <div class="leaf leaf-one"></div>
    <div class="leaf leaf-two"></div>
    <div class="leaf leaf-three"></div>
    <div class="leaf leaf-four"></div>

</div>

</body>

</html>
