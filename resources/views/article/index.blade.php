@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2>{{$article->name}}</h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        {{$article->id}}
        <h2><small><a href="{{ route('articles.edit', $article) }}">Редактировать статью</a></small></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection

