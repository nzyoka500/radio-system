@extends('frontend.layouts.master')
@section('content')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Team Details
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@include('frontend.sections.team-details-section',['team_member' => $team_member,'lang' => $lang,'default' => $default])
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Team Details
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->



<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    start player
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@include('frontend.sections.player-section')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End player
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


@endsection
