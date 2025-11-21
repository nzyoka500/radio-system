@extends('frontend.layouts.master')
@section('content')

    @foreach ($page_section->sections ?? [] as $item)
        @if ( $item->section->key == 'about-section')
            @include('frontend.sections.about-section')
        @elseif($item->section->key == 'banner-section')
            @include('frontend.sections.banner-section')
        @elseif($item->section->key == 'testimonial-section')
            @include('frontend.sections.testimonial-section')
         @elseif($item->section->key == 'video-section')
            @include('frontend.sections.video-section')
         @elseif($item->section->key == 'gallery-section')
            @include('frontend.sections.gallery-section')
        @elseif($item->section->key == 'team-section')
            @include('frontend.sections.team-section')
        @elseif($item->section->key == 'contact-section')
            @include('frontend.sections.contact-section')
        @elseif($item->section->key == 'announcement-section')
            @include('frontend.sections.blog-section')
        @elseif($item->section->key == 'daily-schedule-section')
            @include('frontend.sections.show-schedule-section')
        @endif
        
    @endforeach


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    start player
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@include('frontend.sections.player-section')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End player
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection




