@extends('layouts.app')

@section('content')

	@if(count($errors) > 0 )

		<ul class="list-group">
			@foreach($errors->all() as $error)

				<li class="list-group-item text-danger">
					{{ $error }}
				</li>

			@endforeach 
		</ul>

	@endif	

	<div class="panel panel-default">
		<div class="panel-heading text-center">
			Create a new Post
		</div>
		<div class="panel-body">
			{{-- here if we not declare enctype than it return only image name such as a.jpg  --}}
			<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control">
				</div>

				<div class="form-group">
					<label for="Featured">Featured Image</label>
					<input type="file" name="featured" class="form-control">
				</div>

				<div class="form-group">
					<label for="category">Select a category</label>
					<select name="category_id" id="category" class="form-control">
						@foreach($categories as $category)
							<option value="{{$category->id}}">
								{{$category->name}}
							</option>

						@endforeach
					</select>
				</div>

				<label for="tags">Select tags</label>
					<div class="form-group">
						@foreach($tags as $tag)
						<div class="check-box">
							<label>
								<input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}
							</label>	
						</div>
						@endforeach
					</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="content" rows="5" cols="5" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Store Post
						</button>
					</div>	
				</div>

			</form>
		</div>
	</div>	
@stop

@section('styles')
	
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

@stop

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
    $(document).ready(function() {
        $('#content').summernote();
    });
  </script>

@stop