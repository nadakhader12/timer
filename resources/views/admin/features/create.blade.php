@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Add New Features | ' . env('APP_NAME'))

@section('content')

    <h1>Add new Features</h1>
    @include('admin.errors')
    <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="title" class="form-control">
        </div>


        <div class="mb-3">
            <label>icon</label>
            <input type="file" name="icon"  class="form-control">
        </div>

        <div class="mb-3">
            <label>content</label>
            <input type="text" name="content" placeholder="content" class="form-control">
        </div>
        <div class="mb-3">
            <label>Work</label>
            <input type="text" name="work" placeholder="work" class="form-control">
        </div>
        <button class="btn btn-success px-5">Add</button>
    </form>

@stop
