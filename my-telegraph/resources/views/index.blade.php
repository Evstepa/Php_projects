@extends('layouts.base')
@section('title', 'Главная')

@section('main')
    @if (count($tts) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Автор</th>
                    <th>Название</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tts as $tt)
                <tr>
                    <td><h5>{{ $tt->user->name }}</h5></td>
                    <td><h5>{{ $tt->title }}</h5></td>
                    <td>
                        <a href="{{ route('detail', ['tt' => $tt->id]) }}">Прочитать...</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
