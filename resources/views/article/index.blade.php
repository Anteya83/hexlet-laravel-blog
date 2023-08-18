@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    <h5><small><a href="{{ route('articles.create') }}">Создать статью</a></small></h5>
    @foreach ($articles as $article)
        <h2>{{$article->name}}</h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        
        <h2><small><a href="{{ route('articles.edit', $article) }}">Редактировать статью</a></small></h2>
        <h2><small><a href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить статью</a></small></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection

