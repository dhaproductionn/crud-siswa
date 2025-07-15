<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$ mahasiswa = query("SELECT * FROM  mahasiswa ORDER BY nis DESC");

// Membuat nama file
$filename = "data  mahasiswa-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data  mahasiswa.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat dan Tanggal Lahir</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>E-Mail</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nis']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['tmpt_Lahir']; ?>, <?= $row['tgl_Lahir']; ?></td>
                <?php
                $now = time();
                $timeTahun = strtotime($row['tgl_Lahir']);
                $setahun = 31536000;
                $hitung = ($now - $timeTahun) / $setahun;
                ?>
                <td><?= floor($hitung); ?> Tahun</td>
                <td><?= $row['jekel']; ?></td>
                <td><?= $row['jurusan']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['alamat']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>