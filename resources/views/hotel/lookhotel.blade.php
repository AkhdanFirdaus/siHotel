<section class="container">
	<div class="card shadow">
		<div class="card-body">
			<div class="row text-center">
				<div class="col-md-4">
					<i class="fas fa-swimming-pool fa-2x"></i>
					<p class="lead"><strong>Kolam Renang</strong></p>
				</div>
				<div class="col-md-4">
					<i class="fas fa-wifi fa-2x"></i>
					<p class="lead"><strong>Free WiFi</strong></p>
				</div>
				<div class="col-md-4">
					<i class="fas fa-utensils fa-2x"></i>
					<p class="lead"><strong>Restaurant</strong></p>
				</div>
			</div>			
		</div>		
	</div>
</section>

<section class="container my-4">
	<div class="card shadow">
		<div class="row">
			<div class="col">
				<table class="table table-strip">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Kode Kamar</th>						
							<th scope="col">Fasilitas</th>						
							<th scope="col">Status</th>
						</tr>
					</thead>
					@foreach($hotel->kamar as $index => $kamar)
						@if($kamar->status == 'Terisi')
						<tr class="bg-danger text-light" data-toggle="collapse" href="#terproses{{ $kamar->id }}" role="button" aria-expanded="false" aria-controls="terproses">
						@else
						<tr>
						@endif
							<th scope="row">{{ $index+1 }}</th>
							<td>{{ $kamar->kode_kamar }}</td>
							<td>{{ $kamar->fasilitas->tipe }}</td>							
							<td>{{ $kamar->status }}</td>							
						</tr>
						<tr class="collapse bg-info text-light" id="terproses{{ $kamar->id }}">
							<th scope="row">#</th>
							<td class="col" scope="col" colspan="3">
								@foreach($kamar->reservasi as $index => $reser)
								<dl class="row mb-0">
									<dd class="col-2">Atas Nama</dd>
									<dt class="col">{{$reser->guest['nama']}} {{ $reser->user['name'] }}</dt>
								</dl>
								<dl class="row mb-0">
									<dd class="col-2">Check In</dd>
									<dt class="col">{{$reser['check_in']}}</dt>
								</dl>
								<dl class="row mb-0">
									<dd class="col-2">Check Out</dd>
									<dt class="col">{{$reser['check_out']}}</dt>
								</dl>
								<dl class="row mb-0">
									<dd class="col-6">Kode Verifikasi</dd>					
									<dt class="col">{{ decrypt($reser->pembayaran['kode_booking']) }}</dt>
								</dl>
								@endforeach
							</td>
						</tr>

					@endforeach
				</table>		
			</div>
		</div>
	</div>
</section>