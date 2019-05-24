<?php
if(isset($_POST['simpan'])) {
    $pegawai = simplexml_load_file('pegawai.xml');
    $data = $pegawai->addChild('data');
    $data->addAttribute('kd_peg', $_POST['kd_peg']);
    $data->addChild('nama', $_POST['nama']);
    $data->addChild('umur', $_POST['umur']);
    $data->addChild('alamat', $_POST['alamat']);
    file_put_contents('pegawai.xml', $pegawai->asXML());
    header("location: index.php");
}
?>

<form method="post">
    <table>
        <tr>
            <td>Kode pegawai</td>
            <td><input type="text" name="kd_peg"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><input type="text" name="umur"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="simpan" value="Simpan"> | <input type="reset" name="reset" value="Bersihkan"> | <input type="button" value="Batal" onclick="history.back(-1)" /></td>
        </tr>
    </table>
</form>