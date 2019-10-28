@extends('dashboard.dashboard')

@section('dashcontent')
<div class="container my-5">
	<h3>User</h3>
	<table class="table">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama</th>
			<th scope="col">Email</th>
			<th scope="col">Sebagai</th>
			<th scope="col">Hotel</th>
		</tr>
		@foreach($users as $index => $user)
		<tr>
			<th scope="col">{{ $index+1 }}</th>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			@foreach($user->roles as $index => $role)
			<td>{{ $role->nama }}</td>
			@endforeach
			{{-- <td>Bebas</td> --}}
			<td>
				{{Form::open(['route' => ['dashboard.updateUser', $user->id], 'method' => 'PUT'])}}
					{{Form::select('hotelnya', $hotels, null, ['class' => 'form-control', 'placeholder' => 'Pilih Hotel'])}}
					{{Form::submit('Attach', ['class' => 'btn btn-primary btn-block'])}}
				{{Form::close()}}
			</td>
		</tr>
		@endforeach
	</table>
	<hr>
	@include('partials.message')
	<hr>
	<table class="table">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama</th>
			<th scope="col">Email</th>
			<th scope="col">Sebagai</th>
			<th scope="col">Hotel</th>
		</tr>
		@foreach($users as $index => $user)
		<tr>
			<th scope="col">{{ $index+1 }}</th>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			@foreach($user->roles as $index => $role)
			<td>{{ $role->nama }}</td>
			@endforeach			
			<td>
				{{ $user->hotel['nama'] }}
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection