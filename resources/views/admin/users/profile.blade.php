@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')	

	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Your Profile
		</div>
		<div class="panel-body">
		
			<form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				
				<div class="form-group">
					<label for="name">User Name</label>
					<input type="text" name="name" value="{{$user->name}}" class="form-control">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" value="{{$user->email}}"class="form-control">
				</div>

				<div class="form-group">
					<label for="password">New password</label>
					<input type="password" name="password" class="form-control">
				</div>

				<div class="form-group">
					<label for="avatar">upload new Avatar</label>
					<input type="file" name="avatar" class="form-control">
				</div>

				<div class="form-group">
					<label for="facebook">Facebook Profile</label>
					<input type="text" name="facebook" value="{{$user->profile->facebook}}"  class="form-control">
				</div>

				<div class="form-group">
					<label for="youtube">youtube Profile</label>
					<input type="youtube" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
				</div>

				<div class="form-group">
					<label for="about">About you</label>
					<textarea name="about" id="about" cols="6" rows="6" class="form-control">{{$user->profile->about}}</textarea>
					{{-- <input type="text" name="about" value="{{$user->profile->about}}"> --}}
				</div>


				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Update Profile 
						</button>
					</div>	
				</div>

			</form>
		</div>
	</div>	
@stop