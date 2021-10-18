@extends('layouts.article')

@section('main')

    <hi class="font-thin text-4xl">文章 > {{ $article->title }}</hi>
    <p class="text-lg text-gray-700 p-2">
        {{$article -> content}}
    </p>
    <a href="{{ route('articles.index') }}">回首頁</a>
    



    @if($errors->any())
        <div class="errors p-3 bg-red-500 text-red-100 font-thin rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection