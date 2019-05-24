<?php

$pegawai = simplexml_load_file('pegawai.xml');
if(isset($_POST['simpan'])) {
    foreach($pegawai->data as $data) {
        if($data['kd_peg'] == $_POST['kd_peg']) {
            $data->nama = $_POST['nama'];
            $data->umur = $_POST['umur'];
            $data->alamat = $_POST['alamat'];
            break;
        }
    }
    file_put_contents('pegawai.xml', $pegawai->asXML());
    header("location: index.php");
}


foreach($pegawai->data as $data) {
    if($data['kd_peg'] == $_GET['kd_peg']) {
        $kd_peg = $data['kd_peg'];
        $nama = $data->nama;
        $umur = $data->umur;
        $alamat = $data->alamat;
        break;
    }
}

?>

<form method="post">
    <table>
        <tr>
            <td>Kode pegawai</td>
            <td><input type="text" name="kd_peg" value="<?php echo $kd_peg; ?>" readonly></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><input type="text" name="umur" value="<?php echo $umur; ?>"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="simpan" value="Update"> | <input type="button" value="Batal" onclick="history.back(-1)" /></td>
        </tr>
    </table>
</form>