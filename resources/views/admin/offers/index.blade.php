@extends('admin.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'offers | ' . env('APP_NAME'))

@section('content')

    <h1>All offers</h1>
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
                @foreach ($offers as $offer)
                <td>{{ $offer->id}}</td>
                    <td>{{ $offer->title}}</td>

                    <td><img width="80" src="{{ asset('uploads/offers/'.$offer->image) }}" alt=""></td>
                    <td>
                        {{ $offer->content }}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.offers.edit', $offer->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST">
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
