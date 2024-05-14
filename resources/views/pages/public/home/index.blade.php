@extends('layouts.frontend')

@section('content')
<section id="hero">
    <div class="container-fluid ps-md-0">
        <div class="row">
            <div class="col-md-6">
                <div class="screen-image-hero">
                    <img src="https://images.unsplash.com/photo-1519069060891-f8c50519bf39?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
            </div>
            <div class="col-md-6 p-4 px-md-5 d-flex flex-column justify-content-center py-5">
                <h1 class="fw-bold">
                    Broadcast WhatsApp by <br> Tiga Teknologi Persada. <br> Tingkatkan pelayanan bisnis <br> dan datangkan customer sebanyak-banyaknya.
                </h1>
                <p class="my-3">
                    Bangun chatbot yang interaktif hanya dalam 3 menit <br> <b> tanpa coding </b> di sosial media Anda.
                </p>
                <div class="mt-3 d-flex flex-wrap gap-3">
                    <a href="#pricing" class="btn w-auto px-4 py-2 rounded-pill btn-dark"><i class="fas fa-gift fa-fw"></i> Lihat Paket</a>
                    <a href="#faq" class="btn w-auto px-4 py-2 rounded-pill btn-outline-dark"><i class="fas fa-fw fa-arrow-down"></i> Pelajari Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="short-info">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="text-desc">
                    <h2 class="mb-3 fw-bold">Maksimalkan Bisnis Anda dengan Digitalisasi</h2>
                    <p>Pesan diterima langsung oleh pengguna aktif WhatsApp. Dengan menggunakan layanan broadcast WhatsApp by Tiga Teknologi Persada, informasi kamu dijamin langsung diterima oleh pengguna aktif WhatsApp.</p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center img-desc">
                <div class="card card-body p-0 border-0 img-desc-content">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-desc mb-5">
                    <h2 class="mb-2 fw-bold fs-1 text-warning">Harga Paket</h2>
                    <p class="text-light">Dapatkan Penawaran Spesial Untuk-mu.</p>
                </div>

                <ul class="list-group package-list gap-2">
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <label class="form-check-label py-md-3 d-flex flex-column">
                            <span class="fs-3 fw-bold">1 - 10</span>
                            <small class="text-dark">Kuota Broadcast</small>
                        </label>
                        <div class="d-flex align-items-center gap-2">
                            <small>Rp. 0/Pesan</small>
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="0" data-price="0" data-min-quota="0" data-max-quota="10" id="firstRadio" checked>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <label class="form-check-label py-md-3 d-flex flex-column">
                            <span class="fs-3 fw-bold">1.000 - 99.000</span>
                            <small class="text-dark">Kuota Broadcast</small>
                        </label>
                        <div class="d-flex align-items-center gap-2">
                            <small>Rp. 250/Pesan</small>
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="250" data-price="250" data-min-quota="1000" data-max-quota="99000" id="secondRadio">
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <label class="form-check-label py-md-3 d-flex flex-column">
                            <span class="fs-3 fw-bold">100.000 - 499.999</span>
                            <small class="text-dark">Kuota Broadcast</small>
                        </label>
                        <div class="d-flex align-items-center gap-2">
                            <small>Rp. 230/Pesan</small>
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="230" data-price="230" data-min-quota="100000" data-max-quota="499999" id="thirdRadio">
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <label class="form-check-label py-md-3 d-flex flex-column">
                            <span class="fs-3 fw-bold">500.000 - 999.999</span>
                            <small class="text-dark">Kuota Broadcast</small>
                        </label>
                        <div class="d-flex align-items-center gap-2">
                            <small>Rp. 220/Pesan</small>
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="220" data-price="220" data-min-quota="500000" data-max-quota="999999" id="fourRadio">
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <label class="form-check-label py-md-3 d-flex flex-column">
                            <span class="fs-3 fw-bold">1.000.000 - 2.000.000</span>
                            <small class="text-dark">Kuota Broadcast</small>
                        </label>
                        <div class="d-flex align-items-center gap-2">
                            <small>Rp. 200/Pesan</small>
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="200" data-price="200" data-min-quota="1000000" data-max-quota="2000000" id="fiveRadio">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 d-flex align-items-end px-md-5">
                <div class="card card-body mt-3 mt-md-0 p-5 border-0 card-form-order">
                    <div>
                        <h5 class="fs-4 mb-0 fw-bold">Data Pemesan</h5>
                        <p class="text-secondary">Silakan isi data pemesan berikut ini dengan lengkap</p>

                        <div class="mb-2">
                            <label for="buyer_name" class="form-label fw-medium">Nama Lengkap</label>
                            <input type="text" class="form-control" name="buyer_name" id="buyer_name" required>
                        </div>
                        <div class="mb-2">
                            <label for="buyer_telp" class="form-label fw-medium">Nomor WhatsApp</label>
                            <input type="text" class="form-control" name="buyer_telp" id="buyer_telp" required>
                        </div>
                        <div class="mb-2">
                            <label for="buyer_email" class="form-label fw-medium">Email</label>
                            <input type="text" class="form-control" name="buyer_email" id="buyer_email" required>
                        </div>

                    </div>

                    <div class="mt-4">
                        <h5 class="fs-4 mb-0 fw-bold">Jumlah Broadcast</h5>
                        <p class="text-secondary">Sesuaikan jumlah Broadcast yang kamu butuhkan</p>

                        <div class="input-group mb-3">
                            <span class="input-group-text bg-transparent">
                                <button class="btn btn-secondary"><i class="fas fa-minus"></i></button>
                            </span>
                            <input type="number" id="qtyRequest" name="qty_request" min="0" value="0" class="form-control border-end-0 border-start-0 text-center" readonly required>
                            <span class="input-group-text bg-transparent">
                                <button class="btn btn-warning"><i class="fas fa-plus"></i></button>
                            </span>
                        </div>

                        <div class="text-center my-4">
                            <input type="hidden" class="form-control" name="price_amount" id="price_amount">
                            <div id="totalPriceAmount" class="fs-2 mb-3 text-success text-center fw-bold">
                                Rp 0
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-warning fw-bold px-3 py-3 rounded-pill shadow-sm">Lanjutkan Pemesanan <i class="fas fa-arrow-right-long fa-fw"></i></button>

                </div>
            </div>
        </div>
    </div>
</section>

<section id="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <img src="{{asset('assets/fe-page/images/faq.png')}}" class="img-faq" alt="">
            </div>
            <div class="col-md-8 px-3 px-md-4">
                <h2 class="fs-1 fw-bold mb-3 px-3 px-md-4">FAQ</h2>
                <div class="accordion accordion-flush px-3 px-md-4" id="accordionFaq">
                    <div class="accordion-item border shadow-sm overflow-hidden mb-2 rounded">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Apa itu WhatsApp Blast ?
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Pesan yang dikirimkan secara massal ke banyak nomor sekaligus, dimana melalui fitur ini sistem hanya perlu membuat satu pesan lalu secara otomatis dapat dikirim ke banyak nomor secara cepat dan mudah.
                                </li>
                                <li>
                                    Selain Whatsapp Blast kami juga menyediakan layanan OTP (One time Password), yaitu pengiriman informasi dalam bentuk password atau pin, dan Notification, yaitu pengiriman informasi berisi pemberitahuan.
                                </li>
                            </ul>

                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border shadow-sm overflow-hidden mb-2 rounded">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Mengapa Anda harus  menggunakan WhatsApp ?
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Hampir seluruh masyarakat Indonesia menggunakan WhatsApp sebagai aplikasi perpesanan utama mereka, bahkan data menunjukkan bahwa pengguna aplikasi WhatsApp mencapai 92% ) (data Januari 2023) dari populasi pengguna internet di Indonesia. Dengan banyaknya pengguna WhatsApp di Indonesia, WhatsApp Blast bisa sangat membantu dan sangat efektif dalam menyalurkan informasi kepada pelanggan anda.
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border shadow-sm overflow-hidden mb-2 rounded">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          Apa keuntungan menggunakan WhatsApp Blast ?
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Anda dapat mengirim banyak pesan sekaligus secara terjadwal untuk kebutuhan apa pun dengan sangat mudah dan cepat
                                </li>
                                <li>
                                    Mempublikasikan produk anda dengan jangkauan yang luas
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border shadow-sm overflow-hidden mb-2 rounded">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                          Bagaimana cara menggunakan WhatsApp Blast ?
                        </button>
                      </h2>
                      <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Layanan Whatsapp Blast yang kami tawarkan adalah Manage Service yang mana kami memberikan pelayanan terbaik tanpa anda perlu repot untuk melihat serta Monitoring Dashboard dan Upload Contact dengan bantuan Customer Service kami yang selalu Update dalam mengirimkan Report Blasting
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border shadow-sm overflow-hidden mb-2 rounded">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-five" aria-expanded="false" aria-controls="flush-five">
                          Apa saja yang dibutuhkan untuk menggunakan layanan WhatsApp Blast ?
                        </button>
                      </h2>
                      <div id="flush-five" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Hanya dengan menyiapkan isi konten (dapat berupa gambar + teks, video + teks atau hanya teks) dan memiliki kumpulan kontak nomor tujuan, kamu siap untuk memulai pengalaman WhatsApp Blast yang cepat dan praktis!
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border shadow-sm overflow-hidden mb-2 rounded">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-six" aria-expanded="false" aria-controls="flush-six">
                            Kapan saya bisa mendaftar untuk layanan ini ?
                        </button>
                      </h2>
                      <div id="flush-six" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Layanan kami siap melayani setiap saat dan di mana pun kamu inginkan. Kebebasan mendaftar kapan saja memberikan kamu kendali penuh atas pesan-pesan yang akan kamu kirimkan.
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border shadow-sm overflow-hidden mb-2 rounded">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-seven" aria-expanded="false" aria-controls="flush-seven">
                            Berapa lama proses pelaksanaan WhatsApp Blast ?
                        </button>
                      </h2>
                      <div id="flush-seven" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Waktu pelaksanaan broadcast bervariasi. Untuk rincian lebih lanjut, silakan hubungi admin kami untuk mendapatkan estimasi waktu yang pas dan sesuai dengan kebutuhan kamu.
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item border shadow-sm overflow-hidden mb-2 rounded">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-eight" aria-expanded="false" aria-controls="flush-eight">
                            Bagaimana cara mendaftar layanan WhatsApp Blast ?
                        </button>
                      </h2>
                      <div id="flush-eight" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Mendaftar sangat mudah! Silakan hubungi admin kami untuk panduan langkah demi langkah yang jelas. Setelah itu, kamu hanya perlu mengisi formulir, melakukan pembayaran, dan proses blasting akan segera dimulai.
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="reminder">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card border-0">
                    <div class="card-body p-5 pb-0">
                        <div class="row">
                            <div class="col-md-8 pb-5 pb-md-4 d-flex flex-column gap-2 justify-content-center">
                                <div>
                                    <h4 class="fs-1 fw-bold">Ayo Pesan Sekarang Juga !</h4>
                                    <p>
                                        Broadcast WhatsApp by Tiga Teknologi Persada mudah, menyenangkan, dan terbukti membantu mempermudah Anda dalam meningkatkan loyalitas customer Anda.
                                    </p>
                                </div>
                                <div>
                                    <a href="#pricing" class="btn btn-dark rounded-pill px-4 py-2">Menuju Pemesanan <i class="fas fa-arrow-up-long fa-fw"></i></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('assets/fe-page/images/call.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var packageRadios = document.querySelectorAll('input[name="listGroupRadio"]');
            var qtyInput = document.getElementById('qtyRequest');
            var totalPriceDisplay = document.getElementById('totalPriceAmount');
            var priceAmountInput = document.getElementById('price_amount');

            // Fungsi untuk menghitung total harga berdasarkan harga dan jumlah broadcast
            function calculateTotalPrice(price, quantity) {
                return price * quantity;
            }

            // Menggunakan event listener untuk setiap radio button
            packageRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    // Menghapus kelas 'bg-warning' dari semua item
                    packageRadios.forEach(function(radio) {
                        radio.parentElement.parentElement.classList.remove('bg-warning');
                    });

                    // Menambahkan kelas 'bg-warning' pada item yang dipilih
                    this.parentElement.parentElement.classList.add('bg-warning');

                    // Mengecek radio button yang dipilih
                    packageRadios.forEach(function(radio) {
                        radio.checked = false;
                    });
                    this.checked = true;

                    var selectedPrice = parseInt(this.getAttribute('data-price'));
                    var selectedMinQuota = parseInt(this.getAttribute('data-min-quota'));
                    var selectedMaxQuota = parseInt(this.getAttribute('data-max-quota'));
                    var selectedQuantity = selectedMinQuota; // Mengambil data-min-quota sebagai jumlah broadcast

                    qtyInput.value = selectedQuantity; // Set nilai pada input jumlah broadcast

                    var totalPrice = calculateTotalPrice(selectedPrice, selectedQuantity);

                    totalPriceDisplay.textContent = "Rp " + totalPrice.toLocaleString('id-ID'); // Menampilkan total harga
                    priceAmountInput.value = totalPrice; // Set nilai pada input hidden untuk proses selanjutnya (jika ada)
                });
            });

            // Event listener untuk tombol tambah dan kurang
            var plusButton = document.querySelector('.input-group .btn-warning');
            var minusButton = document.querySelector('.input-group .btn-secondary');

            plusButton.addEventListener('click', function() {
                var selectedRadio = document.querySelector('input[name="listGroupRadio"]:checked');
                var selectedMaxQuota = parseInt(selectedRadio.getAttribute('data-max-quota'));

                if (parseInt(qtyInput.value) < selectedMaxQuota) {
                    qtyInput.value = parseInt(qtyInput.value) + 1;
                    updateTotalPrice();
                }
            });

            minusButton.addEventListener('click', function() {
                var selectedRadio = document.querySelector('input[name="listGroupRadio"]:checked');
                var selectedMinQuota = parseInt(selectedRadio.getAttribute('data-min-quota'));

                if (parseInt(qtyInput.value) > selectedMinQuota) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                    updateTotalPrice();
                }
            });

            // Fungsi untuk memperbarui total harga saat jumlah broadcast berubah
            function updateTotalPrice() {
                var selectedRadio = document.querySelector('input[name="listGroupRadio"]:checked');
                var selectedPrice = parseInt(selectedRadio.getAttribute('data-price'));
                var selectedQuantity = parseInt(qtyInput.value);
                var totalPrice = calculateTotalPrice(selectedPrice, selectedQuantity);

                totalPriceDisplay.textContent = "Rp " + totalPrice.toLocaleString('id-ID'); // Menampilkan total harga
                priceAmountInput.value = totalPrice; // Set nilai pada input hidden untuk proses selanjutnya (jika ada)
            }

            // Event listener untuk setiap list-group-item
            var listGroupItems = document.querySelectorAll('.list-group-item');
            listGroupItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    var radio = this.querySelector('input[name="listGroupRadio"]');
                    radio.checked = true;

                    // Trigger event change pada radio button
                    var event = new Event('change');
                    radio.dispatchEvent(event);
                });
            });
        });
    </script>
@endsection
