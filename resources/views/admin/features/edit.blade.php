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
            <label>title</label>
            <input type="text" name="title" placeholder="title" class="form-control" value="{{ $feature->title }}">
        </div>


        <div class="mb-3">
            <label>icon</label>
            <input type="file" name="icon"  class="form-control">
            <img width="80" src="{{ asset('uploads/featuers/'.$featuer->icon) }}" alt="">
        </div>

        <div class="mb-3">
            <label>content</label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ $feature->content }}">
        </div>
        <div class="mb-3">
            <label>Work</label>
            <input type="text" name="work" placeholder="Work" class="form-control" value="{{ $feature->work_id }}">
        </div>
        <button class="btn btn-success px-5">Update</button>
    </form>

@stop
