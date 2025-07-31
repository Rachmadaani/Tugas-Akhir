<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Request Penambahan Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
            font-family: 'Segoe UI', sans-serif;
        }

        .request-card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2.section-title {
            font-weight: 700;
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: 500;
            margin-top: 12px;
        }

        .btn-primary {
            border-radius: 25px;
            padding: 10px 30px;
        }

        .form-control {
            border-radius: 10px;
        }

        .alert {
            border-radius: 12px;
        }

        @media (max-width: 767px) {
            .request-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="request-card">
                    <h2 class="section-title">Form Request Adds New Event</h2>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success text-center">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('event/request/submit') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap Panita Event:</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        value="<?= esc(session()->get('username')) ?>" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <div class="input-group">
                                        <select class="form-select" id="kode_negara" name="kode_negara" required style="max-width: 150px;">
                                            <option value="">Pilih kode negara</option>
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

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="no_hp"
                                            name="no_hp"
                                            placeholder="81234567890"
                                            pattern="\d{6,15}"
                                            title="Masukkan hanya angka tanpa kode negara. Contoh: 81234567890"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= esc(session()->get('email')) ?>" required readonly>
                                </div>

                                <label>Nama Event</label>
                                <input type="text" name="nama_event" class="form-control" required>

                                <label>Tanggal Event</label>
                                <input type="date" name="tanggal_event" class="form-control" required>

                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" required>

                                <label>Deskripsi Event</label>
                                <textarea name="deskripsi_event" rows="3" class="form-control" required></textarea>

                                <label>Gambar Event</label>
                                <input type="file" name="gambar_event" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Nama Kategori</label>
                                <select name="nama_kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="lari">Lari</option>
                                    <option value="marathon">Marathon</option>
                                </select>

                                <label>Deskripsi Kategori</label>
                                <textarea name="deskripsi_kategori" rows="2" class="form-control"></textarea>

                                <label>Biaya (Rp)</label>
                                <input type="number" name="biaya" class="form-control" required>

                                <label>Rute</label>
                                <input type="text" name="rute" class="form-control" placeholder="Gunakan KM" required>

                                <label>Tanggal Dimulai</label>
                                <input type="date" name="tanggal_dimulai" class="form-control" required>

                                <label>Jam Dimulai</label>
                                <input type="time" name="jam_dimulai" class="form-control" required>

                                <label>Cut Off Time</label>
                                <input type="time" name="cut_off_time" class="form-control" required>

                                <label>Keterangan Tambahan</label>
                                <textarea name="keterangan" rows="3" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary" onclick="closeOrBack()">Kembali</button>
                            <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>