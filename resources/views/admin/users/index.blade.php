@extends('layouts.app')

@section('content')

<div class="panel panel-body">
	
	<div class="panel-heading text-center">
		Users
	</div>

	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Image</th>
				<th>Name</th>
				<th>Permissions</th>
				<th>Delete</th>
			</thead>
		<tbody>
			@if($user_data->count() > 0)
			@foreach($user_data as $data)

				<tr>
					<td><img src="{{asset($data->profile['avatar'])}}" alt="" width="60px" height="60px" style="border-radius: 50%;"></td>

					<td>{{$data->name}}</td>
					<td>
						@if($data->admin)
						@if(Auth::id() !== $data->id)
						<a href="{{route('user.not.admin',['id' => $data->id])}}" class="btn btn-xs btn-danger">Remove Permission</a>
						@endif
						@else
						
						<a href="{{route('user.admin',['id' => $data->id])}}" class="btn btn-xs btn-success">Make-Admin</a>
						
						@endif

					</td>
					<td>
						@if(Auth::id() !== $data->id)

						<a href="{{route('user.delete',['id' => $data->id])}}" class="btn btn-xs btn-danger">Delete</a>
						
						@endif
					</td>

				</tr>

			@endforeach
			
			@else
				<tr>
					<th colspan="5" class="text-center"><span style="color: red;font-size: 16px">No Users</span></th>
				</tr>
			@endif



		</tbody>
	</table>
	
	</div>

</div>



@stop