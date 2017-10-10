@extends('layouts.app', ['title' => 'Home'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Welcome back!</h2>
                    <hr/>
                    <a class="btn btn-primary" href="{{url('posts/create')}}">Add new entry</a>
                </div>
            </div>
        </div>
    </div>
@stop