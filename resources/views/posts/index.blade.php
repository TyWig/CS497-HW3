@extends('layouts.app', ['title' => 'My posts'])

@section('scripts')
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
@stop

@section('content')
    <div class="container container-fluid">
        <h1 class="pull-left">Your Posts</h1>
    </div>
    <div class="container">
        <a class="btn btn-primary" style="float: right; vertical-align: center;" href="{{url('posts/create')}}"><span class="glyphicon glyphicon-plus-sign"></span></a>
    </div>
    <div class="container">
        <hr style="border-color: black"/>
    </div>
    @if(count($posts) == 0)
        <div class="container" style="text-align: center;">
            <h2>You have no posts <i style="font-size: xx-large" class="fa fa-frown-o "></i></h2>
        </div>
    @endif
    @foreach($posts as $post)
        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>{{$post->title}}</h2>
                        <hr/>
                        {!! $post->content !!}
                        <hr/>
                        <div class="pull-left" style="display: inline-flex">
                            <a href="{{ url("posts/{$post->id}/edit") }}">
                                <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit" style="margin-right: 5px">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </button></a>
                            <form action="{{ url("posts/{$post->id}/delete") }}" method="post" class="inline">
                                {!! csrf_field() !!}
                                {!! method_field('delete') !!}
                                <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </form>
                        </div>
                        <p style="font-size: small; vertical-align: bottom" class="pull-right">Created {{date_format($post->created_at, 'g:ia \o\n l jS F Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop