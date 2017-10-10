@extends('layouts.app', ['title' => 'Create new post'])

@section('scripts')
    <script>
      $(document).ready(function() {
        $('#summernote').summernote({
          height: 300,
          minHeight: null,
          maxHeight: null,
          focus: true,
        });
      });

      function submit() {
        let title = $('#postTitle').val();
        let markupStr = $('#summernote').summernote('code');
        console.log(title, markupStr);
        $('#title').val(title);
        $('#content').val(markupStr);
        $('#hiddenform').submit()
      }
    </script>
@stop

@section('content')
    <div class="container">
        <h1>Create New Blog Post</h1>
        <hr/>
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" class="form-control" id="postTitle" placeholder="Blog title...">
        </div>
        <div class="form-group">
            <label for="text">Content:</label>
            <div name="text" id="summernote"></div>
        </div>
        <button onClick="submit()" class="btn btn-primary">Submit</button>
    </div>
    <form style="display: none;" method="post" action="{{ url('/posts/create') }}" id="hiddenform">
        {!! csrf_field() !!}
        <input type="hidden" name="title" id="title" value="">
        <input type="hidden" name="content" id="content" value="">
    </form>
@stop