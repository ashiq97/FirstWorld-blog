@extends('layouts.app')

@section('content')

<div class="panel panel-body">
	
	<div class="panel-heading text-center">
		All Posts
	</div>

	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Image</th>
				<th>Title</th>
				<th>Edit</th>
				<th>Trash</th>
			</thead>
		<tbody>
			@if($post_data->count()>0)
			@foreach($post_data as $data)

				<tr>
					<td><img src="{{$data->featured}}" alt="{{$data->title}}" height="50px" width="90px"></td>
					{{-- <td>{{$data->featured}}</td> --}}
					<td>{{$data->title}}</td>
					<td><a href="{{route('post.edit',['id'=>$data->id])}}" class="btn btn-info btn-xs">Edit</a></td>
					<td>
						<a href="{{route('post.delete',['id'=>$data->id])}}" class="btn btn-danger btn-xs">Trash</a>
					</td>
				</tr>

			@endforeach
			
			@else
				<tr>
					<th colspan="5" class="text-center"><span style="color: red;font-size: 16px">No published Posts</span></th>
				</tr>
			@endif



		</tbody>
	</table>
	
	</div>

</div>



@stop