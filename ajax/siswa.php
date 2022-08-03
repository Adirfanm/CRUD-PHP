<?php
// sleep(1);
usleep(500000);
require '../function.php';
$keyword = $_GET["keyword"];
$query =  "SELECT * FROM siswa
            WHERE
        nama LIKE '%$keyword%' OR
        nis LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
";;

$siswa =  query($query);
?>

<table class="table table-responsive table-striped">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Foto</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i = 1;  ?>
    <?php foreach ($siswa as $row) : ?>

        <tr>
            <td><?= $i  ?></td>
            <td class="aksi">
                <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-outline-info">Ubah</a>
                <a href="hapus.php?id=<?= $row["id"];  ?>" class="btn btn-outline-secondary" onclick="return confirm('yakin ingin menghapus?');">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="100px"></td>
            <td><?= $row["nis"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach;  ?>

</table>