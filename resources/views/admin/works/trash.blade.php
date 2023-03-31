@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Trashed Works | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed works</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>image</th>
                <th>content</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($works as $work)
                    <td>{{ $work->id }}</td>
                    <td>
                        {{ $work->title }}
                    </td>
                    <td><img width="80" src="{{ asset('uploads/works/'.$work->image) }}" alt=""></td>
                    <td>
                        {{ $work->content }}
                    </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.works.restore', $work->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.works.forcedelete', $work->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
