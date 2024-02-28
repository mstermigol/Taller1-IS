@extends('layouts.app')
@section('title', 'Reviews - Temporal Adventure')
@section('subtitle',  'List of reviews')
@section('content')
<div class="row">
  @if(count($viewData["reviews"]) > 0)
    @foreach ($viewData["reviews"] as $review)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
        <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
        <div class="card-body text-center">
          <a href="{{ route('review.show', ['id'=> $review["id"]]) }}" class="btn bg-primary text-white">{{ $review["title"] }}</a>
        </div>
      </div>
    </div>
    @endforeach
  @else
    <div class="col-12">
      <div class="alert alert-info">
        There are no reviews.
      </div>
    </div>
  @endif
</div>
@endsection
