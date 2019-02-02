@if(Session::has('success'))
	<div class="alert alert-success">
		<strong class="mr-2">Berhasil: </strong> {{Session::get('success') }}
	</div>

@elseif(Session::has('fail'))
	<div class="alert alert-danger">
		<strong>Gagal: </strong> {{Session::get('fail') }}
	</div>

@elseif(Session::has('cancel'))
	<div class="alert alert-danger">
		<strong>Berhasil: </strong> {{Session::get('fail') }}
	</div>

@elseif(Session::has('tanggal'))
	<div class="alert alert-danger">
		<strong>Tanggal </strong> {{Session::get('tanggal') }}
	</div>

@elseif(count($errors) > 0)
<div class="container">
	<h1>Ada yang salah nihh...</h1>
	@foreach($errors->all() as $error)
		<div class="alert alert-danger">
			<li>{{ $error }}</li>
		</div>
	@endforeach
</div>
@endif