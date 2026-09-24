@extends('student.layouts.app')

@section('title', __('messages.courses'))

@section('content')

{{-- =====================================================
     PAGE HEADER
===================================================== --}}

<div class="available-courses-header">

    <div class="available-header-content">

        <div class="available-header-icon">

            <i class="fas fa-compass"></i>

        </div>

        <div>

            <div class="available-header-label">

                <i class="fas fa-sparkles"></i>

                {{ __('messages.discover_and_learn') }}

            </div>

            <h2>

                {{ __('messages.discover_courses') }}

            </h2>

            <p>

                {{ __('messages.choose_course') }}

            </p>

        </div>

    </div>


    <div class="available-count">

        <strong>

            {{ $courses->count() }}

        </strong>

        <span>

            {{ __('messages.available_course') }}

        </span>

    </div>

</div>



{{-- =====================================================
     SEARCH
===================================================== --}}

<div class="course-search-card">

    <form
        method="GET"
        action="/courses"
        class="course-search-form">

        {{-- Search --}}

        <div class="course-search-input">

            <i class="fas fa-search"></i>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="{{ __('messages.search_course_teacher') }}">

        </div>


        {{-- Category --}}

        <div class="course-category-select">

            <i class="fas fa-layer-group"></i>

            <select name="category_id">

                <option value="">

                    {{ __('messages.all_categories') }}

                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>

                        {{ $category->name }}

                    </option>

                @endforeach

            </select>

            <i class="fas fa-chevron-down select-small-arrow"></i>

        </div>


        <button
            type="submit"
            class="course-search-btn">

            <i class="fas fa-search"></i>

            {{ __('messages.search') }}

        </button>


        @if(request('search') || request('category_id'))

            <a
                href="/courses"
                class="course-reset-btn">

                <i class="fas fa-rotate-right"></i>

                {{ __('messages.clear_filter') }}

            </a>

        @endif

    </form>

</div>



{{-- =====================================================
     CATEGORY FILTER
===================================================== --}}

<div class="category-filter-section">

    <div class="category-filter-title">

        <i class="fas fa-filter"></i>

        {{ __('messages.browse_by_category') }}

    </div>


    <div class="category-filter-list">

        <a
            href="/courses"
            class="category-filter-btn
            {{ !request('category_id') ? 'active' : '' }}">

            <span class="category-filter-icon">

                <i class="fas fa-grid-2"></i>

            </span>

            {{ __('messages.all') }}

        </a>


        @foreach($categories as $category)

            <a
                href="/courses?category_id={{ $category->id }}{{ request('search') ? '&search='.urlencode(request('search')) : '' }}"
                class="category-filter-btn
                {{ request('category_id') == $category->id ? 'active' : '' }}">

                <span class="category-filter-icon">

                    <i class="fas {{ $category->icon ?? 'fa-book' }}"></i>

                </span>

                {{ $category->name }}

            </a>

        @endforeach

    </div>

</div>



{{-- =====================================================
     RESULTS HEADER
===================================================== --}}

<div class="courses-results-header">

    <div>

        <h3>

            {{ __('messages.available_courses') }}

        </h3>

        <span>

            {{ $courses->count() }} {{ __('messages.course_count') }}

            @if(request('search'))

                {{ __('messages.search_results_for') }}

                <strong>

                    "{{ request('search') }}"

                </strong>

            @endif

        </span>

    </div>

</div>



{{-- =====================================================
     COURSES
===================================================== --}}

<div class="available-courses-grid">

    @forelse($courses as $course)


        <div class="available-course-card">


            {{-- Image --}}

            <div class="available-course-image">

                @if($course->image)

                    <img
                        src="{{ asset('storage/' . $course->image) }}"
                        alt="{{ $course->title }}">

                @else

                    <div class="available-course-placeholder">

                        <i class="fas fa-book-open"></i>

                    </div>

                @endif


                <div class="available-image-overlay"></div>


                {{-- Category Badge --}}

                @if($course->category)

                    <div class="available-category-badge">

                        <i class="fas {{ $course->category->icon ?? 'fa-book' }}"></i>

                        {{ $course->category->name }}

                    </div>

                @endif

            </div>



            {{-- Body --}}

            <div class="available-course-body">


                {{-- Teacher --}}

                <div class="available-teacher">

                    <div class="available-teacher-avatar">

                        {{ mb_substr(
                            $course->teacher->name,
                            0,
                            1
                        ) }}

                    </div>

                    <div>

                        <span>

                            {{ __('messages.provided_by') }}

                        </span>

                        <strong>

                            {{ $course->teacher->name }}

                        </strong>

                    </div>

                </div>



                {{-- Title --}}

                <h3>

                    {{ $course->title }}

                </h3>



                {{-- Description --}}

                <p class="available-course-description">

                    {{ Str::limit(
                        $course->description,
                        105
                    ) }}

                </p>



                {{-- Info --}}

                <div class="available-course-info">

                    <span>

                        <i class="fas fa-book-open"></i>

                        {{ __('messages.educational_course') }}

                    </span>

                    <span>

                        <i class="fas fa-user-graduate"></i>

                        {{ __('messages.available_for_students') }}

                    </span>

                </div>



                {{-- Enroll --}}

                @if(in_array($course->id, $enrolledCourseIds))

                    <div class="enrolled-course-btn">

                        <span>

                            <i class="fas fa-circle-check"></i>

                            {{ __('messages.enrolled_in_course') }}

                        </span>

                        <span class="enrolled-btn-icon">

                            <i class="fas fa-check"></i>

                        </span>

                    </div>

                @else

                    <form
                        method="POST"
                        action="/courses/{{ $course->id }}/enroll">

                        @csrf

                        <button
                            type="submit"
                            class="enroll-course-btn">

                            <span>

                                {{ __('messages.enroll_course') }}

                            </span>

                            <span class="enroll-btn-icon">

                                <i class="fas fa-arrow-left"></i>

                            </span>

                        </button>

                    </form>

                @endif


            </div>

        </div>


    @empty


        {{-- Empty State --}}

        <div class="courses-empty-state">

            <div class="courses-empty-icon">

                <i class="fas fa-magnifying-glass"></i>

            </div>

            <h3>

                {{ __('messages.no_courses_found') }}

            </h3>

            <p>

                {{ __('messages.no_matching_courses') }}

            </p>

            <a
                href="/courses"
                class="empty-reset-btn">

                <i class="fas fa-rotate-right"></i>

                {{ __('messages.show_all_courses') }}

            </a>

        </div>

    @endforelse

</div>

@endsection
