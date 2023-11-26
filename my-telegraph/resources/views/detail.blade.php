@extends('layouts.base')
@section('title', $tt->title)

@section('main')
    <h5>Автор >> {{ $tt->user->name }}</h5>
    <h3>Название >> {{ $tt->title }}</h3>
    <p>{{ $tt->text }}</p>
    <p>Последнее изменение >> {{ $tt->updated_at }}</p>
    <p><a href="{{ route('index') }}">К списку текстов</a></p>
@endsection
