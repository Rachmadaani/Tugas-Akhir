<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pembayaran</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">

    <style>
        body {
            background: linear-gradient(135deg, #cfefff, #fbe4ff);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card.card-primary {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
        }

        .btn {
            border-radius: 25px;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        /* --- Perubahan CSS untuk menghilangkan jarak --- */

        /* Ini akan menimpa lebar sidebar default AdminLTE menjadi 0 */
        .main-sidebar {
            width: 0 !important;
            min-width: 0 !important;
            margin-left: -250px;
            /* Sembunyikan sepenuhnya jika perlu */
            transition: margin-left 0.3s ease-in-out;
            /* Animasi transisi */
        }

        /* Menyesuaikan lebar content-wrapper agar mengisi seluruh ruang */
        .content-wrapper,
        .main-footer,
        .main-header {
            margin-left: 0 !important;
            background: linear-gradient(135deg, #cfefff, #fbe4ff);
            min-height: 100vh;
            /* Pastikan tidak ada margin dari sidebar */
        }

        /* Jika ada elemen di dalam header_user_2 yang menyebabkan lebar, ini bisa membantu */
        .main-header .navbar {
            margin-left: 0 !important;
        }

        /* Jika Anda menggunakan body class 'sidebar-mini', 'sidebar-collapse', atau 'sidebar-open' */
        /* Pastikan body tidak memiliki padding-left atau margin-left yang tidak diinginkan */
        .sidebar-mini .wrapper .main-sidebar,
        .sidebar-mini .wrapper .content-wrapper,
        .sidebar-mini .wrapper .main-footer,
        .sidebar-mini .wrapper .main-header {
            margin-left: 0 !important;
        }

        /* Mengatur agar kolom formulir tetap di tengah dan tidak terlalu lebar */
        .content .container-fluid.px-3.px-md-5 {
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        .d-flex.justify-content-center {
            width: 100%;
            /* Pastikan kontainer flex mengambil seluruh lebar */
        }

        .form-group {
            margin-bottom: 1rem;
            /* Default Bootstrap spacing */
            padding-left: 15px;
            /* Add padding to the left */
            padding-right: 15px;
            /* Add padding to the right */
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->include('header_user_2') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 justify-content-center">
                        <div class="col-sm-8 text-center">
                            <h1 class="m-0">Formulir Pendaftaran</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid px-3 px-md-5">
                    <div class="d-flex justify-content-center">
                        <div class="card card-primary w-100" style="max-width: 900px;">
                            <div class="card-header">
                                <h3 class="card-title">Form Pendaftaran Gratis</h3>
                            </div>
                            <form action="<?= site_url(relativePath: 'pendaftaran/storeBerbayar') ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        value="<?= esc(session()->get('username')) ?>" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= esc(session()->get('email')) ?>" required readonly>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="kode_negara" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="form-select" id="kode_negara" name="kode_negara" required style="max-width: 150px;">
                                                <option value="">Kode</option>
                                                <option value="+93">+93 (Afghanistan)</option>
                                                <option value="+355">+355 (Albania)</option>
                                                <option value="+213">+213 (Algeria)</option>
                                                <option value="+376">+376 (Andorra)</option>
                                                <option value="+244">+244 (Angola)</option>
                                                <option value="+54">+54 (Argentina)</option>
                                                <option value="+374">+374 (Armenia)</option>
                                                <option value="+61">+61 (Australia)</option>
                                                <option value="+43">+43 (Austria)</option>
                                                <option value="+994">+994 (Azerbaijan)</option>
                                                <option value="+973">+973 (Bahrain)</option>
                                                <option value="+880">+880 (Bangladesh)</option>
                                                <option value="+32">+32 (Belgium)</option>
                                                <option value="+591">+591 (Bolivia)</option>
                                                <option value="+387">+387 (Bosnia and Herzegovina)</option>
                                                <option value="+267">+267 (Botswana)</option>
                                                <option value="+55">+55 (Brazil)</option>
                                                <option value="+673">+673 (Brunei)</option>
                                                <option value="+359">+359 (Bulgaria)</option>
                                                <option value="+226">+226 (Burkina Faso)</option>
                                                <option value="+257">+257 (Burundi)</option>
                                                <option value="+855">+855 (Cambodia)</option>
                                                <option value="+237">+237 (Cameroon)</option>
                                                <option value="+1">+1 (Canada / United States)</option>
                                                <option value="+56">+56 (Chile)</option>
                                                <option value="+86">+86 (China)</option>
                                                <option value="+57">+57 (Colombia)</option>
                                                <option value="+506">+506 (Costa Rica)</option>
                                                <option value="+385">+385 (Croatia)</option>
                                                <option value="+420">+420 (Czech Republic)</option>
                                                <option value="+45">+45 (Denmark)</option>
                                                <option value="+20">+20 (Egypt)</option>
                                                <option value="+503">+503 (El Salvador)</option>
                                                <option value="+372">+372 (Estonia)</option>
                                                <option value="+251">+251 (Ethiopia)</option>
                                                <option value="+358">+358 (Finland)</option>
                                                <option value="+33">+33 (France)</option>
                                                <option value="+995">+995 (Georgia)</option>
                                                <option value="+49">+49 (Germany)</option>
                                                <option value="+30">+30 (Greece)</option>
                                                <option value="+852">+852 (Hong Kong)</option>
                                                <option value="+36">+36 (Hungary)</option>
                                                <option value="+91">+91 (India)</option>
                                                <option value="+62" selected>+62 (Indonesia)</option>
                                                <option value="+98">+98 (Iran)</option>
                                                <option value="+964">+964 (Iraq)</option>
                                                <option value="+353">+353 (Ireland)</option>
                                                <option value="+972">+972 (Israel)</option>
                                                <option value="+39">+39 (Italy)</option>
                                                <option value="+81">+81 (Japan)</option>
                                                <option value="+254">+254 (Kenya)</option>
                                                <option value="+7">+7 (Kazakhstan / Russia)</option>
                                                <option value="+965">+965 (Kuwait)</option>
                                                <option value="+371">+371 (Latvia)</option>
                                                <option value="+961">+961 (Lebanon)</option>
                                                <option value="+218">+218 (Libya)</option>
                                                <option value="+60">+60 (Malaysia)</option>
                                                <option value="+960">+960 (Maldives)</option>
                                                <option value="+356">+356 (Malta)</option>
                                                <option value="+52">+52 (Mexico)</option>
                                                <option value="+373">+373 (Moldova)</option>
                                                <option value="+976">+976 (Mongolia)</option>
                                                <option value="+382">+382 (Montenegro)</option>
                                                <option value="+212">+212 (Morocco)</option>
                                                <option value="+95">+95 (Myanmar)</option>
                                                <option value="+977">+977 (Nepal)</option>
                                                <option value="+505">+505 (Nicaragua)</option>
                                                <option value="+31">+31 (Netherlands)</option>
                                                <option value="+64">+64 (New Zealand)</option>
                                                <option value="+234">+234 (Nigeria)</option>
                                                <option value="+389">+389 (North Macedonia)</option>
                                                <option value="+47">+47 (Norway)</option>
                                                <option value="+92">+92 (Pakistan)</option>
                                                <option value="+507">+507 (Panama)</option>
                                                <option value="+595">+595 (Paraguay)</option>
                                                <option value="+51">+51 (Peru)</option>
                                                <option value="+63">+63 (Philippines)</option>
                                                <option value="+48">+48 (Poland)</option>
                                                <option value="+351">+351 (Portugal)</option>
                                                <option value="+974">+974 (Qatar)</option>
                                                <option value="+40">+40 (Romania)</option>
                                                <option value="+966">+966 (Saudi Arabia)</option>
                                                <option value="+221">+221 (Senegal)</option>
                                                <option value="+381">+381 (Serbia)</option>
                                                <option value="+65">+65 (Singapore)</option>
                                                <option value="+421">+421 (Slovakia)</option>
                                                <option value="+386">+386 (Slovenia)</option>
                                                <option value="+27">+27 (South Africa)</option>
                                                <option value="+82">+82 (South Korea)</option>
                                                <option value="+34">+34 (Spain)</option>
                                                <option value="+94">+94 (Sri Lanka)</option>
                                                <option value="+46">+46 (Sweden)</option>
                                                <option value="+41">+41 (Switzerland)</option>
                                                <option value="+886">+886 (Taiwan)</option>
                                                <option value="+66">+66 (Thailand)</option>
                                                <option value="+90">+90 (Turkey)</option>
                                                <option value="+971">+971 (United Arab Emirates)</option>
                                                <option value="+380">+380 (Ukraine)</option>
                                                <option value="+44">+44 (United Kingdom)</option>
                                                <option value="+84">+84 (Vietnam)</option>
                                            </select>
                                            <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="xxxxxxxxxx" required>
                                        </div>
                                        <small class="form-text text-muted">Masukkan nomor tanpa awalan 0 (contoh: 812xxxxxxx)</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_lengkap">Alamat Lengkap:</label>
                                    <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap"></textarea>
                                </div>

                                <!-- Pilihan Event -->
                                <div class="form-group">
                                    <label for="event_name">Event:</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name" value="<?= $event['event_name'] ?>" readonly>
                                    <input type="hidden" name="id_event" value="<?= $event['id'] ?>">
                                </div>

                                <!-- Pilihan Kategori Event -->
                                <div class="form-group">
                                    <label for="kategori_event">Pilih Kategori:</label>
                                    <select name="kategori_event" id="kategori_event" class="form-control">
                                        <option value="">Pilih Kategori Event</option>
                                        <?php if (isset($kategori_events)): ?>
                                            <?php foreach ($kategori_events as $kategori_event): ?>
                                                <option value="<?= $kategori_event['id']; ?>"
                                                    data-biaya="<?= $kategori_event['biaya']; ?>"
                                                    data-rute="<?= $kategori_event['rute']; ?>">
                                                    <?= $kategori_event['nama_kategori']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="rute">Rute:</label>
                                    <input type="text" class="form-control" id="rute" name="rute" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="biaya">Biaya:</label>
                                    <input type="text" class="form-control" id="biaya" name="biaya" readonly>
                                </div>


                                <!-- Pilihan Provinsi -->
                                <div class="form-group">
                                    <label for="id_provinsi">Pilih Provinsi:</label>
                                    <select class="form-control" id="id_provinsi" name="id_provinsi" required>
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $prov): ?>
                                            <option value="<?= $prov['id'] ?>"><?= $prov['nama_provinsi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Pilihan Kabupaten -->
                                <div class="form-group">
                                    <label for="id_kabupaten">Pilih Kabupaten:</label>
                                    <select class="form-control" id="id_kabupaten" name="id_kabupaten" required>
                                        <option value="">Pilih Kabupaten</option>
                                    </select>
                                </div>

                                <!-- Additional Fields -->
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan:</label>
                                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan">
                                </div>

                                <div class="form-group">
                                    <label for="nama_bib">Nama Bib:</label>
                                    <input type="text" class="form-control" id="nama_bib" name="nama_bib">
                                </div>

                                <div class="form-group">
                                    <label for="no_identitas">No Identitas:</label>
                                    <input type="text" class="form-control" id="no_identitas" name="no_identitas">
                                </div>

                                <div class="form-group">
                                    <label for="golongan_darah">Golongan Darah:</label>
                                    <select class="form-control" id="golongan_darah" name="golongan_darah">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                </div>

                                <div class="form-group">
                                    <label for="riwayat_penyakit">Riwayat Penyakit:</label>
                                    <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="ukuran_kaos">Ukuran Kaos:</label>
                                    <select class="form-control" id="ukuran_kaos" name="ukuran_kaos">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kontak_darurat_nama_lengkap">Nama Lengkap Kontak Darurat:</label>
                                    <input type="text" class="form-control" id="kontak_darurat_nama_lengkap" name="kontak_darurat_nama_lengkap">
                                </div>

                                <div class="form-group">
                                    <label for="kontak_darurat_no_hp">No HP Kontak Darurat:</label>
                                    <input type="text" class="form-control" id="kontak_darurat_no_hp" name="kontak_darurat_no_hp">
                                </div>

                                <div class="form-group">
                                    <label for="kontak_darurat_hubungan">Hubungan dengan Kontak Darurat:</label>
                                    <input type="text" class="form-control" id="kontak_darurat_hubungan" name="kontak_darurat_hubungan">
                                </div>

                                <div class="form-group">
                                    <label for="persetujuan_peserta">Persetujuan Peserta:</label>
                                    <input type="checkbox" id="persetujuan_peserta" name="persetujuan_peserta" required>
                                </div>

                                <div class="card-footer d-flex">
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                    <a href="<?= site_url('event/detail/' . $event_id) ?>" class="btn btn-secondary ms-auto">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            // Update biaya and rute when kategori event is selected
            $('#kategori_event').change(function() {
                // Ambil data biaya dan rute dari option yang dipilih
                var selectedOption = $(this).find('option:selected');
                var biaya = selectedOption.data('biaya');
                var rute = selectedOption.data('rute');

                // Isi field biaya dan rute
                $('#biaya').val(biaya);
                $('#rute').val(rute);
            });

            // Mengambil data kabupaten berdasarkan provinsi yang dipilih
            $('#id_provinsi').change(function() {
                var id_provinsi = $(this).val();
                if (id_provinsi) {
                    $.ajax({
                        url: "<?= site_url('pendaftaran/get_kabupaten') ?>/" + id_provinsi,
                        method: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#id_kabupaten').empty();
                            $('#id_kabupaten').append('<option value="">Pilih Kabupaten</option>');
                            $.each(data, function(key, value) {
                                $('#id_kabupaten').append('<option value="' + value.id + '">' + value.nama_kabupaten + '</option>');
                            });
                        }
                    });
                } else {
                    $('#id_kabupaten').empty();
                    $('#id_kabupaten').append('<option value="">Pilih Kabupaten</option>');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#id_event').change(function() {
                var eventId = $(this).val();
                $.ajax({
                    url: '/pendaftaran/getKategoriEventByEvent/' + eventId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var options = '<option value="">Pilih Kategori Event</option>';
                        $.each(data, function(key, val) {
                            options += '<option value="' + val.id + '">' + val.nama_kategori_event + '</option>';
                        });
                        $('#id_kategori_event').html(options);
                    }
                });
            });
        });
    </script>

</body>

</html>