@extends('app')

@section('title', $chapter->name)

@section('content')
  @include('atoms.nav')

  <div class="flex flex-col mx-auto max-w-md">
    <div class="my-8 text-3xl">
      <input type="text" value="{{ $chapter->name ?? old('name') }}">
    </div>
    <div class="p-8 bg-white rounded shadow whitespace-pre-line">
      <textarea name="" id="" cols="30" rows="10" value="{{ $chapter->body ?? old('body') }}"></textarea>
    </div>
  </div>
@endsection
