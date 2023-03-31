@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'works | ' . env('APP_NAME'))

@section('content')

    <h1>All features</h1>
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
                <th>icon</th>
                <th>content</th>
                <th>Work</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($features as $feature)
                <td>{{ $feature->id}}</td>
                    <td>{{ $feature->title}}</td>

                    <td><img width="80" src="{{ asset('uploads/features/'.$feature->icon) }}" alt=""></td>
                    <td>
                        {{ $feature->content }}
                    </td>
                    <td>
                        {{ $feature->work_id }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.works.edit', $feature->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.works.destroy', $feature->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
