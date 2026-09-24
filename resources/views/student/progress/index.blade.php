@extends('student.layouts.app')

@section('title', __('messages.course_progress_page'))

@section('content')

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body p-4">

        <h2 class="fw-bold mb-3">

            {{ $course->title }}

        </h2>

        <p class="text-muted">

            {{ __('messages.follow_course_progress') }}

        </p>

    </div>

</div>


<div class="row mb-4">

    <div class="col-md-4 mb-3">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    {{ __('messages.total_lessons') }}
                </h6>

                <h2 class="fw-bold">

                    {{ $totalLessons }}

                </h2>

            </div>

        </div>

    </div>


    <div class="col-md-4 mb-3">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    {{ __('messages.completed_lessons_label') }}
                </h6>

                <h2 class="fw-bold text-success">

                    {{ $completedLessons }}

                </h2>

            </div>

        </div>

    </div>


    <div class="col-md-4 mb-3">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h6 class="text-muted">
                    {{ __('messages.progress_percentage') }}
                </h6>

                <h2 class="fw-bold text-primary">

                    {{ $percentage }}%

                </h2>

            </div>

        </div>

    </div>

</div>



<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body p-4">

        <h5 class="mb-3">

            {{ __('messages.progress') }}

        </h5>


        <div class="progress rounded-pill"
             style="height:25px;">

            <div class="progress-bar"

                 role="progressbar"

                 style="
                 width: {{ $percentage }}%;
                 "

                 aria-valuenow="{{ $percentage }}"
                 aria-valuemin="0"
                 aria-valuemax="100">

                {{ $percentage }}%

            </div>

        </div>

    </div>

</div>




@if($percentage == 0)

<div class="alert alert-secondary rounded-4">

    {{ __('messages.not_started_course') }}

</div>

@elseif($percentage < 50)

<div class="alert alert-warning rounded-4">

    {{ __('messages.good_start') }}

</div>

@elseif($percentage < 100)

<div class="alert alert-info rounded-4">

    {{ __('messages.great_progress') }}

</div>

@else

<div class="alert alert-success rounded-4">

    {{ __('messages.course_completed_congratulations') }}

</div>

@endif



<div class="text-center mt-4">

    <a href="/courses/{{ $course->id }}"
       class="btn btn-primary rounded-4 px-5">

        {{ __('messages.back_to_course') }}

    </a>

</div>


@endsection
