<?php

// hapus data
if(isset($_GET['kd_peg'])) {
    $pegawai = simplexml_load_file('pegawai.xml');
    $kd_peg = $_GET['kd_peg'];
    $index = 0;
    $i = 0;

    foreach($pegawai->data as $data) {
        if($data['kd_peg'] == $kd_peg) {
            $index = $i;
            break;
        }
        $i++;
    }

    unset($pegawai->data[$index]);
    file_put_contents('pegawai.xml', $pegawai->asXML());
}

$pegawai = simplexml_load_file('pegawai.xml');
echo '<hr>';
echo '<h2>Data Pegawai</h2>';
echo '<hr>';
?>

<p><a href="tambah.php">Tambah Data</a></p>

<table cellpadding="5" cellspacing="5" border="1" bgcolor="#FFE4C4">
    <tr>
        <th>Kode Pegawai</th>
        <th>Nama Pegawai</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>Operasi</th>
    </tr>

    <?php foreach($pegawai->data as $data): ?>
    <tr>
        <td><?php echo $data['kd_peg']; ?></td>
        <td><?php echo $data->nama; ?></td>
        <td><?php echo $data->umur; ?></td>
        <td><?php echo $data->alamat; ?></td>
        <td>
            <a href="edit.php?kd_peg=<?php echo $data['kd_peg']; ?>">Edit</a> 
            | 
            <a href="index.php?action=delete&kd_peg=<?php echo $data['kd_peg']; ?>" onclick="return confirm('Apakah yakin akan menghapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php 
echo '<hr>';
echo '<br>';
echo "Jumlah pegawai: " . count($pegawai); ?>