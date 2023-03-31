 @extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Add New Service | ' . env('APP_NAME'))

@section('content')

    <h1>Add new feature</h1>
    @include('admin.errors')

    <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="title" class="form-control">
        </div>
        
        <div class="mb-3">
            <label>Icon</label>
            <input type="file" name="icon"  class="form-control">
        </div>



        <div class="mb-3">
            <label>Content</label>
            <input type="text" name="content" placeholder="content" class="form-control">
        </div>

        <div class="mb-3">
            <label>Work Id</label>
            <input type="text" name="work_id" placeholder="work_id" class="form-control">
        </div>


        <button class="btn btn-success px-5">Add</button>

    </form>

@stop
