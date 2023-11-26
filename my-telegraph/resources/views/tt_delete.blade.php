@extends('layouts.base')
@section('title', 'Удаление текста :: Мои тексты')

@section('main')
    <h5>Автор >> {{ $tt->user->name }}</h5>
    <h3>Название >> {{ $tt->title }}</h3>
    <p>{{ $tt->text }}</p>
    <p>Последнее изменение >> {{ $tt->updated_at }}</p>

    <form action="{{ route('tt.destroy', ['tt' => $tt->id]) }}"
        method="POST">
      @csrf
      @method('DELETE')
      <input type="submit" class="btn btn-danger" value="Удалить">
  </form>
@endsection
