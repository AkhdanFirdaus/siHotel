{!! Form::open(['url' => "", "method" => "POST"]) !!}

<div id="formbook">
	<h3>Akun</h3>
    <section>    	
		<div class="form-row align-items-center">
			<div class="col my-1">
				{{ Form::label('namaDepan', 'Nama Depan') }}
				{{ Form::text('namaDepan', null, ['class' => 'form-control mb-2'])}}
			</div>
			<div class="col my-1">
				{{ Form::label('namaBlk', 'Nama Belakang') }}
				{{ Form::text('namaBlk', null, ['class' => 'form-control mb-2'])}}
			</div>
		</div>
		<div class="form-row align-items-center">
			<div class="col my-1">
				{{ Form::label('email', 'Alamat Email') }}
				{{ Form::text('email', null, ['class' => 'form-control mb-2'])}}
			</div>
		</div>
	</section>
	
	<h3>Detail</h3>
	<section>		
		<div class="form-row">
			<div class="col my-1">
				{{ Form::label('checkin', 'Check In')}}
				{{ Form::date('checkin', null, ['class'=>'form-control'], \Carbon\Carbon::now()) }}
			</div>

			<div class="col my-1">
				{{ Form::label('checkout', 'Check Out')}}
				{{ Form::date('checkout', null, ['class'=>'form-control'], \Carbon\Carbon::now()) }}
			</div>			
		</div>		
		<h3 class="mt-4">Tipe Kamar</h3>
		<div class="form-row">			
			<div class="col">
				<div class="custom-control custom-radio mx-2">
					<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="customRadio1"><i class="fas fa-bed"></i> Single</label>
				</div>
				<div class="custom-control custom-radio mx-2">
					<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="customRadio2"><i class="fas fa-home"></i> Keluarga</label>
				</div>
				<div class="custom-control custom-radio mx-2">
					<input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="customRadio3"><i class="fas fa-hotel"></i> Bisnis</label>
				</div>
			</div>
			<div class="col my-1">
				{{ Form::label('jml', 'Jumlah Orang') }}
				{{ Form::text('jml', null, ['class' => 'form-control'])}}
			</div>
		</div>				
	</section>
</div>

{!! Form::close() !!}

@section('script')
<script type="text/javascript">
	$("#formbook").steps({
	    headerTag: "h3",
	    bodyTag: "section",
	    transitionEffect: "slideLeft",
	    autoFocus: true,
	    labels: {
	        cancel: "Cancel",
	        current: "current step:",
	        pagination: "Pagination",
	        finish: "Pesan!",
	        next: "Next",
	        previous: "Previous",
	        loading: "Loading ..."
	    }
	});
</script>
@endsection