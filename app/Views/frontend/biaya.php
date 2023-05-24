<?= $this->extend('frontend\layout') ?>
<?= $this->section('content') ?>
<style>
    .table {
        font-size: 14px;
    }
</style>
<div class="container mt-4">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        S1 Reguler
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="accordion-collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pilihan Program Studi</th>
                                <th>Biaya Gemilang ¹</th>
                                <th>Biaya/Semester²</th>
                                <th>Total Biaya 4 Tahun³</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($biayaS1Regular as $k => $value) : ?>
                                <tr>
                                    <td><?= $value['jurusan'] ?></td>
                                    <td><?= rupiah($value['biaya_gemilang']) ?></td>
                                    <td><?= rupiah($value['biaya_per_semester']) ?></td>
                                    <td><?= rupiah($value['total_biaya_4_tahun']) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <p>¹ Apabila Calåon Mahasiswa baru diterima di Program S1 Perguruan Tinggi Negeri (UI, IPB, ITB, UGM, UNPAD, UNDIP, UNBRAW, ITS, UNAIR) melalui jalur SNBP/SNBT Pembayaran Biaya Kuliah yang sudah LUNAS akan dikembalikan setelah dipotong Rp 1.000.000,-</p>
                    <p>² Biaya dengan perhitungan 18 SKS</p>
                    <p>³ Total biaya kuliah belum termasuk wisuda, ujian susulan &amp; semester pendek</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        S1 Kelas Karyawan
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <h4><b>BIAYA KULIAH SEMESTER 1 & CICILAN KE 1 - KELAS KARYAWAN - T.A. 2023/2024</b></h4>
                            <tr>
                                <th>Pilihan Program Studi</th>
                                <th>Semester 1</th>
                                <th>Cicilan 1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($biayaS1KelasKaryawan as $k => $value) : ?>
                                <tr>
                                    <td><?= $value['jurusan'] ?></td>
                                    <td><?= rupiah($value['semester_1']) ?></td>
                                    <td><?= rupiah($value['cicilan_1']) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <h4><b>BIAYA KULIAH SEMESTER 2 & 3 - KELAS KARYAWAN - T.A. 2023/2024</b></h4>
                            <tr>
                                <th>Pilihan Program Studi</th>
                                <th>Semester 2</th>
                                <th>Semester 3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($biayaS1KelasKaryawan as $k => $value) : ?>
                                <tr>
                                    <td><?= $value['jurusan'] ?></td>
                                    <td><?= rupiah($value['semester_2']) ?></td>
                                    <td><?= rupiah($value['semester_3']) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Magister Manajemen
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <?php foreach ($skemaPembayaranManajemen as $k => $value) : ?>
                        <table class="table">
                            <thead>
                                <h4><b>Skema pembayaran cicilan per bulan (<?= $value['banyak_cicilan'] ?> kali)</b></h4>
                                <tr>
                                    <th>Cicilan Ke</th>
                                    <th>Besar Cicilan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cicilanManajemen[$value['banyak_cicilan']] as $kk => $vvalue) : ?>
                                    <tr>
                                        <td><?= $vvalue['cicilan_ke'] ?></td>
                                        <td><?= $vvalue['besar_cicilan'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endforeach ?>
                    <p> Biaya Sudah Termasuk Biaya Daftar Ulang, Jaket Almameter, Registrasi /semester, BPP, Thesis dan Biaya SKS Selama 4 Semester</p>
                    <p> Biaya Belum Termasuk Biaya Wisuda</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Magister Ilmu Komunikasi
                    </button>
                </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <h4><b>Skema pembayaran cicilan per bulan (24 kali)</b></h4>
                            <tr>
                                <th>Cicilan Ke</th>
                                <th>Besar Cicilan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cicilan 1 (Daftar Ulang)</td>
                                <td>Rp3.850.000</td>
                            </tr>
                            <tr>
                                <td>Cicilan 2-24</td>
                                <td>Rp2.050.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <h4><b>Skema pembayaran cicilan per bulan (4 kali)</b></h4>
                            <tr>
                                <th>Cicilan Ke</th>
                                <th>Besar Cicilan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cicilan 1 (Daftar Ulang)</td>
                                <td>RRp10.800.000</td>
                            </tr>
                            <tr>
                                <td>Cicilan 2-24</td>
                                <td>Rp13.400.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <p> Biaya Sudah Termasuk Biaya Daftar Ulang, Jaket Almameter, Registrasi /semester, BPP, Thesis dan Biaya SKS Selama 4 Semester</p>
                    <p> Biaya Belum Termasuk Biaya Wisuda</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>