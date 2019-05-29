@extends('layouts.dashboard')

@section('title') Welcome dashboard @endsection

@section('dashboard_title') Welcome {{Auth::user()->name}} @endsection

