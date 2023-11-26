@extends('layouts.base')

@section('title', 'Корректировка текста :: Мои тексты')

@section('main')
<form action="{{ route('tt.update', ['tt' => $tt->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="txtTitle">Название</label>
        <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $tt->title) }}">
        @error('title')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group my-3">
        <label for="txtText">Содержание</label>
        <textarea name="text" id="txtText" class="form-control @error('text') is-invalid @enderror" row="3">{{ old('text', $tt->text) }}</textarea>
        @error('text')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Сохранить">
</form>
@endsection
