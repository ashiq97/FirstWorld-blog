@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	
	<div class="panel-heading text-center">
		<h4>Trashed Posts</h4>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Image</th>
				<th>Title</th>
				<th>Edit</th>
				<th>Restore</th>
				<th>Permanently Delete</th>
			</thead>
		<tbody>

			@if($trashed_data->count() > 0)

			@foreach($trashed_data as $tdata)

				<tr>
					<td><img src="{{$tdata->featured}}" alt="{{$tdata->title}}" height="50px" width="90px"></td>
					{{-- <td>{{$data->featured}}</td> --}}
					<td>{{$tdata->title}}</td>
					<td>Edit</td>
					<td>
						<a href="{{route('post.restore',['id'=>$tdata->id])}}" class="btn btn-success btn-sm">Restore</a>
					</td>
					<td>
						<a href="{{route('post.kill',['id'=>$tdata->id])}}" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>

			@endforeach
		
			@else
				<tr>
					<th colspan="5" class="text-center"><span style="color: red;font-size: 16px">No trashed record</span></th>
				</tr>

			@endif

		</tbody>
	</table>
	
	</div>

</div>



@stop