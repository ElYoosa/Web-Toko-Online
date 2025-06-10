@extends('v_layouts.app')
@section('content')

<!-- Order Summary (Produk) -->
<div class="col-md-12" hidden>
    <div class="order-summary clearfix">
        <div class="section-title">
            <p>PENGIRIMAN</p>
            <h3 class="title">Produk</h3>
        </div>

        @if($order && $order->orderItems->count() > 0)
        <table class="shopping-cart-table table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th></th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalHarga = 0;
                    $totalBerat = 0;
                @endphp
                @foreach($order->orderItems as $item)
                @php
                    $totalHarga += $item->harga * $item->quantity;
                    $totalBerat += $item->produk->berat * $item->quantity;
                @endphp
                <tr>
                    <td class="thumb"><img src="{{ asset('storage/img-produk/thumb_sm_' . $item->produk->foto) }}" alt=""></td>
                    <td class="details">
                        <a>{{ $item->produk->nama_produk }}</a>
                        <ul>
                            <li><span>Berat: {{ $item->produk->berat }} Gram</span></li>
                            <li><span>Stok: {{ $item->produk->stok }} Gram</span></li>
                        </ul>
                    </td>
                    <td class="price text-center"><strong>Rp. {{ number_format($item->harga, 0, ',', '.') }}</strong></td>
                    <td class="qty text-center">{{ $item->quantity }}</td>
                    <td class="total text-center"><strong class="primary-color">Rp. {{ number_format($item->harga * $item->quantity, 0, ',', '.') }}</strong></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Keranjang belanja kosong.</p>
        @endif
    </div>
</div>

<!-- Form Pengiriman -->
<div class="col-md-12">
    <div class="order-summary clearfix">
        <div class="section-title">
            <p>PENGIRIMAN</p>
            <h3 class="title">Pilih Pengiriman</h3>
        </div>

        <form id="shippingForm">
            @csrf
            <input type="hidden" id="city_origin" name="city_origin" value="">
            <input type="hidden" id="city_origin_name" name="city_origin_name" value="">
            <input type="hidden" name="weight" id="weight" value="{{ $totalBerat }}">
            <input type="hidden" name="province_name" id="province_name">
            <input type="hidden" name="city_name" id="city_name">

            <div class="form-group">
                <label for="province">Provinsi Tujuan:</label>
                <select name="province" id="province" class="input">
                    <option value="">Pilih Provinsi Tujuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="city">Kota Tujuan:</label>
                <select name="city" id="city" class="input">
                    <option value="">Pilih Kota Tujuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="courier">Kurir:</label>
                <select name="courier" id="courier" class="input">
                    <option value="">Pilih Kurir</option>
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS Indonesia</option>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea class="input" name="alamat" id="alamat">{{ Auth::user()->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" class="input" name="kode_pos" id="kode_pos" value="{{ Auth::user()->pos ?? '' }}">
            </div>

            <button type="submit" class="primary-btn" id="cekOngkirBtn">Cek Ongkir</button>
        </form>

        <br>
        <div id="result">
            <table class="shopping-cart-table table">
                <thead>
                    <tr>
                        <th>Layanan</th>
                        <th>Biaya</th>
                        <th>Estimasi</th>
                        <th>Total Berat</th>
                        <th>Total Harga</th>
                        <th>Bayar</th>
                    </tr>
                </thead>
                <tbody id="shippingResults"></tbody>
            </table>
        </div>
    </div>
</div>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const originCityCode = 115; // Depok
    const originCityName = 'Depok';
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.getElementById('city_origin').value = originCityCode;
    document.getElementById('city_origin_name').value = originCityName;

    // Load provinces
    fetch('/provinces')
        .then(res => res.json())
        .then(data => {
            if (data.rajaongkir.status.code === 200) {
                let provinceSelect = document.getElementById('province');
                data.rajaongkir.results.forEach(province => {
                    let option = document.createElement('option');
                    option.value = province.province_id;
                    option.textContent = province.province;
                    provinceSelect.appendChild(option);
                });
            }
        });

    // Load cities based on selected province
    document.getElementById('province').addEventListener('change', function() {
        let provinceId = this.value;
        let provinceName = this.options[this.selectedIndex].text;
        document.getElementById('province_name').value = provinceName;

        fetch(`/cities?province_id=${provinceId}`)
            .then(res => res.json())
            .then(data => {
                if (data.rajaongkir.status.code === 200) {
                    let citySelect = document.getElementById('city');
                    citySelect.innerHTML = '<option value="">Pilih Kota Tujuan</option>';
                    data.rajaongkir.results.forEach(city => {
                        let option = document.createElement('option');
                        option.value = city.city_id;
                        option.textContent = city.city_name;
                        citySelect.appendChild(option);
                    });
                }
            });
    });

    // Set city name
    document.getElementById('city').addEventListener('change', function() {
        document.getElementById('city_name').value = this.options[this.selectedIndex].text;
    });

    // Submit form & fetch shipping cost
    document.getElementById('shippingForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const origin = document.getElementById('city_origin').value;
        const originName = document.getElementById('city_origin_name').value;
        const destination = document.getElementById('city').value;
        const weight = document.getElementById('weight').value;
        const courier = document.getElementById('courier').value;
        const alamat = document.getElementById('alamat').value.trim();
        const kodePos = document.getElementById('kode_pos').value.trim();
        const totalHarga = {{ $totalHarga }};

        if (!alamat || !kodePos || !origin || !destination || !weight || !courier) {
            alert('Harap lengkapi semua kolom sebelum mengecek ongkir.');
            return;
        }

        const btn = document.getElementById('cekOngkirBtn');
        btn.disabled = true;

        fetch('/cost', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ origin, destination, weight, courier })
        })
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            if (data.rajaongkir.status.code === 200) {
                let result = data.rajaongkir.results[0].costs;
                let tableBody = document.getElementById('shippingResults');
                tableBody.innerHTML = '';

                result.forEach(cost => {
                    tableBody.innerHTML += `
                    <tr>
                        <td>${cost.service}</td>
                        <td>${cost.cost[0].value} Rupiah</td>
                        <td>${cost.cost[0].etd} hari</td>
                        <td>${weight} Gram</td>
                        <td>Rp. ${totalHarga.toLocaleString('id-ID')}</td>
                        <td>
                            <form action="{{ route('order.update-ongkir') }}" method="POST">
                                @csrf
                                <input type="hidden" name="province" value="${document.getElementById('province').value}">
                                <input type="hidden" name="city" value="${destination}">
                                <input type="hidden" name="province_name" value="${document.getElementById('province_name').value}">
                                <input type="hidden" name="city_name" value="${document.getElementById('city_name').value}">
                                <input type="hidden" name="kurir" value="${courier}">
                                <input type="hidden" name="alamat" value="${alamat}">
                                <input type="hidden" name="pos" value="${kodePos}">
                                <input type="hidden" name="layanan_ongkir" value="${cost.service}">
                                <input type="hidden" name="biaya_ongkir" value="${cost.cost[0].value}">
                                <input type="hidden" name="estimasi_ongkir" value="${cost.cost[0].etd}">
                                <input type="hidden" name="total_berat" value="${weight}">
                                <input type="hidden" name="city_origin" value="${origin}">
                                <input type="hidden" name="city_origin_name" value="${originName}">
                                <button type="submit" class="primary-btn">Pilih Pengiriman</button>
                            </form>
                        </td>
                    </tr>`;
                });
            }
        })
        .catch(err => {
            btn.disabled = false;
            console.error('Error fetching cost:', err);
        });
    });
});
</script>

@endsection
