<section class="collapse warna-hijau" id="collapseExample">
    <div class="container p-5">
        <table class="table table-light">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Review</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservasi as $index => $reserve)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $reserve->created_at->toDateString() }}</td>
                    <td>{{ $reserve->guest['nama'] }}</td>
                    <td>{{ $reserve->feedback['message'] }}</td>
                </tr>
                @endforeach
                {{ $reservasi->links() }}
            </tbody>
        </table>
    </div>
</section>

<section class="collapse warna-hijau" id="collapseExample2">
    <div class="container p-5">
        <table class="table table-light">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rekomendasis as $index => $rekomen)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $rekomen->hotel->lokasi['lokasi'] }}</td>                    
                    <td>{{ $rekomen->hotel['nama'] }}</td>                    
                    <td>{{ $rekomen->kode_kamar }}</td>
                    <td>{{ $rekomen->fasilitas['tipe'] }}</td>
                    <td>{{ $rekomen->harga }}</td>
                </tr>
                @endforeach
                {{ $reservasi->links() }}
            </tbody>
        </table>
    </div>
</section>

<section class="collapse warna-hijau" id="collapseExample3">
    <div class="container p-5">
        <h3 class="text-light">Cek Status Booking Anda</h3>
        {!! Form::open(['route' => 'look.search', 'method' => 'POST']) !!}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukkan kode booking" aria-label="Recipient's username" aria-describedby="button-addon2" name="cari">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                </div>
            </div>        
        {!! Form::close() !!}
    </div>
</section>