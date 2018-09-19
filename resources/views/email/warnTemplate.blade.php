<h2>Kode Booking</h2>

<div>	
<p>
	Pesanan atas nama: {{ $nama }} <br>
	<strong>{{ $kode_booking }}</strong>
</p>
<hr>
<p>Mohon lunasi pembayaran anda sebelum tanggal {{ \Carbon\Carbon::parse($check_in)->yesterday() }}</p>
</div>

<footer>dikirim oleh siHotel</footer>