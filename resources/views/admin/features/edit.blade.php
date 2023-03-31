@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit feature | ' . env('APP_NAME'))

@section('content')

    <h1>Edit feature</h1>
    @include('admin.errors')

    <form action="{{ route('admin.features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="title" class="form-control" value="{{ $feature->title }}">
        </div>
        <div class="mb-3">
            <label>Icon</label>
            <input type="file" name="icon"  class="form-control">
            <img width="80" src="{{ asset('uploads/features/'.$feature->icon) }}" alt="">
        </div>


        <div class="mb-3">
            <label>Content</label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ $feature->content }}">
        </div>

        <div class="mb-3">
            <label>Work Id</label>
            <input type="text" name="work_id" placeholder="work_id" class="form-control" value="{{ $feature->work_id }}">
        </div>


        <button class="btn btn-success px-5">Update</button>

    </form>

@stop
