@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit work | ' . env('APP_NAME'))

@section('content')

    <h1>Edit Work</h1>
    @include('admin.errors')
    <form action="{{ route('admin.works.update', $work->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>title</label>
            <input type="text" name="title" placeholder="title" class="form-control" value="{{ $work->title }}">
        </div>


        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control">
            <img width="80" src="{{ asset('uploads/works/'.$work->image) }}" alt="">
        </div>

        <div class="mb-3">
            <label>content</label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ $work->content }}">
        </div>
        <button class="btn btn-success px-5">Update</button>
    </form>

@stop
