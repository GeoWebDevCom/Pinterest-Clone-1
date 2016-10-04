@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1>Bootstrap Tutorial</h1>
      <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
      responsive, mobile-first projects on the web.</p>
      <a href="/bookmark/create" class="btn btn-success btn-lg">Share A Picture</a>
    </div>
  </div>
  <hr>
<div class="container" id="app">
  <div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 col-md-4" v-for="bookmark in bookmarks">
      <div class="thumbnail">
        <img v-bind:src="bookmark.url" class="img-responsive">
        <div class="caption">
          <h3>@{{bookmark.title}}</h3>
          <p><a href="#" class="btn btn-primary" role="button"
              {{{ (!Auth::check())? "disabled": ""}}}
            v-on:click="addLike(bookmark.id)"
            >Likes
            <span class="badge">@{{bookmark.likes}}</span></a>
            <a href="#" class="btn btn-danger" role="button" {{{ (!Auth::check())? "disabled": ""}}} >Dislikes</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>




@endsection



@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      bookmarks: []
    },
    ready: function(){
      this.fetchLikes();
    },
    methods: {
      fetchLikes: function(){
        this.$http.get('/api/bookmark/likes/all').then((response) => {
          this.bookmarks = response.body;
        }, (error)=> {
          console.log("cant get all likes");
        });
      },
      addLike: function(id){
        this.$http.post('/api/bookmark/'+id).then((response)=>{
          console.log(response.body);
          console.log("done");
          this.fetchLikes();
        }, (error) => {
          console.log("something wrong");
        });
      }

    }
  })
  </script>

@endsection
