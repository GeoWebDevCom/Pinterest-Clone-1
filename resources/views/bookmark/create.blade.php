@extends('layouts.app')
@section('content')

  <div class="container">

    <div class="page-header">
      <h1 class="text-center">Add a new picture</h1>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
  <div class="form-group">
  <form action="/bookmark" method="POST">
    {{csrf_field()}}
  <label for="title">Title</label>
  <input type="text" class="form-control" id="title" name="title" placeholder="title">
  <label for="picture">Picture Url</label>
  <input type="text" class="form-control" id="picture" name="picture" placeholder="picture url">
  @if (session()->has('flash_notification.message'))
      <div class="alert alert-{{ session('flash_notification.level') }}">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {!! session('flash_notification.message') !!}
      </div>
  @endif
  <hr>
    <button class="btn btn-primary">Add</button>


</form>
</div>
</div>
</div>
</div>

@endsection
