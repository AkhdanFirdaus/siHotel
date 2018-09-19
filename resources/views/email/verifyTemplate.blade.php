
<h2><small>Kode Booking</small> {{ $kode_booking }}</h2>
<h2><small>Kode Verifikasi</small> siHotel</h2>

<div>	
<p>
	<strong>{{ decrypt($kode_verifikasi) }}</strong>
</p>
<hr>
<a href="http://127.0.0.1:8000/{{ $kode_booking }}/verifikasi">Klik disini untuk Konfirmasi pembayaran anda </a>
</div>

<footer>dikirim oleh siHotel</footer>