<div class="container">	
		@if(Request::is('/'))
		<div class="form-row">			
			<div class="col form-group">
				{{ Form::label('Dimana?') }}
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
					</div>
					{{ Form::select('lokasi', $lokasis, null, ['placeholder' => 'Pilih Tempat...', 'class' => 'custom-select']) }}
				</div>
			</div>
		</div>
		@endif

		<div class="form-row">
			<div class="col-md-5 form-group">
				{{ Form::label('checkin', 'Check-in') }}
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
					</div>
					@if(Request::is('/'))
					{{ Form::date('checkin', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required']) }}
					@else
					{{ Form::date('checkin', $detail['checkin'], ['class' => 'form-control', 'required' => 'required']) }}
					@endif
				</div>					
			</div>

			<div class="col-md-5 form-group">
				{{ Form::label('checkout', 'Check-out') }}
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
					</div>
					@if(Request::is('/'))
					{{ Form::date('checkout', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required']) }}
					@else
					{{ Form::date('checkout', $detail['checkout'], ['class' => 'form-control', 'required' => 'required']) }}
					@endif
				</div>					
			</div>				

			<div class="col-md-2 form-group">
				{{ Form::label('jml', 'Jumlah Tamu') }}
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-friends"></i></span>
					</div>
					@if(Request::is('/'))
					{{ Form::number('jml', 1, ['class' => 'form-control']) }}
					@else
					{{ Form::number('jml', $detail['jml'], ['class' => 'form-control']) }}
					@endif
				</div>					
			</div>
		</div>	

		<div class="form-row">
			<div class="col-md-4">
				{{ Form::submit('Cari Hotel', ['class' => 'btn btn-primary'])}}
				{{ Form::reset('Reset', ['class' => 'btn btn-danger'])}}
			</div>
		</div>			
</div>