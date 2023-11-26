@extends('layouts.base')
@section('title', 'Мои тексты')

@section('main')
<h3>Добро пожаловать, {{ Auth::user()->name }}!</h3>
<p class="text-right"><a href="{{ route('tt.add') }}">Написать новый текст</a></p>
@if (count($tts) > 0)
<table class="table table-striped">
    <thead>
        <tr>
            <th>Название</th>
            <th>Содержание</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tts as $tt)
        <tr>
            <td><h5>{{ $tt->title }}</h5></td>
            <td><h5>{{ $tt->text }}</h5></td>
            <td>
                <a href="{{ route('tt.edit', ['tt' => $tt->id]) }}">Изменить</a>
            </td>
            <td>
                <a href="{{ route('tt.delete', ['tt' => $tt->id]) }}">Удалить</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
