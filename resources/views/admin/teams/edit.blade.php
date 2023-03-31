@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit team | ' . env('APP_NAME'))

@section('content')

    <h1>Edit team</h1>
    @include('admin.errors')
    <form action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>name</label>
            <input type="text" name="name" placeholder="name" class="form-control" value="{{ $team->title }}">
        </div>


        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control">
            <img width="80" src="{{ asset('uploads/teams/'.$team->image) }}" alt="">
        </div>
        <div class="mb-3">
            <label>job</label>
            <input type="text" name="job" placeholder="job" class="form-control" value="{{ $team->content }}">
        </div>
        <div class="mb-3">
            <label>content</label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ $team->content }}">
        </div>
        <button class="btn btn-success px-5">Update</button>
    </form>

@stop
