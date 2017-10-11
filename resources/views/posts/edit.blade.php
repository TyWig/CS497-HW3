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
        $('#summernote').summernote('pasteHTML', '{!! $post->content !!}');
        $('#postTitle').val('{!! $post->title !!}');
        $('#postTitle').keyup(validateTitle);
      });

      function validateTitle() {
        let title = $('#postTitle').val();
        let element = $('#titleHelper');
        let container = $('#titleContainer');

        if(title.length === 0) {
          element.show();
          container.addClass('has-error');
          return false;
        } else {
          element.hide();
          container.removeClass('has-error');
          return true;
        }
      }

      function submit() {
        if (validateTitle()) {
          let title = $('#postTitle').val();
          let markupStr = $('#summernote').summernote('code');
          $('#title').val(title);
          $('#content').val(markupStr);
          $('#hiddenform').submit();
        }
      }
    </script>
@stop

@section('content')
    <div class="container">
        <h1>Edit post</h1>
        <hr/>
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" class="form-control" id="postTitle" placeholder="Blog title...">
            <span id="titleHelper" class="help-block" style="display: none; color: red">
                <strong>A title is required</strong>
            </span>
        </div>
        <div class="form-group">
            <label for="text">Content:</label>
            <div name="text" id="summernote"></div>
        </div>
        <button onClick="submit()" class="btn btn-primary">Submit</button>
    </div>
    <form style="display: none;" method="post" action="{{ url('/posts/'.$post->id.'/edit') }}" id="hiddenform">
        {!! csrf_field() !!}
        <input type="hidden" name="title" id="title" value="">
        <input type="hidden" name="content" id="content" value="">
    </form>
@stop