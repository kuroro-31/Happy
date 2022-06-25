@extends('app')

@section('title', $chapter->name)

@section('content')
  @include('atoms.nav')

  <div class="flex flex-col mx-auto max-w-md">
    <update-chapter :chapter-name='@json($chapter->name ?? old('name'))' :chapter-body='@json($chapter->body ?? old('body'))'>
    </update-chapter>
  </div>
@endsection
