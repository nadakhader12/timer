@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Edit offer | ' . env('APP_NAME'))

@section('content')

    <h1>Edit offer</h1>
    @include('admin.errors')
    <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label>title</label>
            <input type="text" name="title" placeholder="title" class="form-control" value="{{ $offer->title }}">
        </div>


        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control">
            <img width="80" src="{{ asset('uploads/offers/'.$offer->image) }}" alt="">
        </div>

        <div class="mb-3">
            <label>content</label>
            <input type="text" name="content" placeholder="content" class="form-control" value="{{ $offer->content }}">
        </div>
        <button class="btn btn-success px-5">Update</button>
    </form>

@stop
