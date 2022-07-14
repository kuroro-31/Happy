@extends('app')

@section('title', $chapter->name)

@section('content')
  @include('_patials._nav')

  <div class="max-w-md flex flex-col mx-auto container">
    <a href="{{ URL::previous() }}" class="inline-block text-xs cursor-pointer hover:text-primary mb-8">
      本のトップへ
    </a>
    <update-chapter :id='@json($chapter->id)' :name='@json($chapter->name ?? old('name'))'
      :body='@json($chapter->body ?? old('body'))'>
    </update-chapter>
  </div>
@endsection
