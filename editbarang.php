<style>
  body{
        background-color: lightblue;
        font-family: 'Times New Roman', Times, serif;
      }
</style>

<?php
$kodebrg = $_GET['kodebrg'];
include "koneksi.php";

$qry = "SELECT * FROM barang WHERE kodebrg = '$kodebrg'";
$exec = mysqli_query($con, $qry);
$data = mysqli_fetch_assoc($exec);

?>


<form action="updatebarang.php" method="post">
      <center>
      <h1>Form Input Barang</h1>
      <hr width=1000>
        <table>
                <tr>
                    <td>Kode Barang</td>
                    <td>:</td>
                    <td><input name="kodebrg"></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td>:</td>
                    <td><input name="namabrg"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><input name="harga"></td>
                </tr>
                <tr>
                    <td>Stok Barang</td>
                    <td>:</td>
                    <td><input name="stokbrg"></td>
                </tr>
                <tr>
                    <td>Tanggal Input</td>
                    <td>:</td>
                    <td>
                      <select name="tanggal_input">
                        <?php
                        for ($i=1; $i<=31 ; $i++) {
                          if ($i == substr($data['tanggal_input'],8,2)) {
                            echo '<option value="' . $i . '" selected>' . $i . '</option>';
                          } else {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                          }
                        }
                        ?>
                      </select>
                      <select name="bulan">
                        <?php
                        $bulan = [
                          '01' => 'Januari',
                          '02' => 'Februari',
                          '03' => 'Maret',
                          '04' => 'April',
                          '05' => 'Mei',
                          '06' => 'Juni',
                          '07' => 'Juli',
                          '08' => 'Agustus',
                          '09' => 'September',
                          '10' => 'Oktober',
                          '11' => 'November',
                          '12' => 'Desember'
                        ];

                      foreach ($bulan as $key => $value) {
                        $selected = ($key == date('m', strtotime($data['tanggal_input']))) ? 'selected' : '';
                        echo "<option value=\"$key\" $selected>$value</option>";
                      }
                      ?>
                    </select>
                    <select name="tahun">
                        <?php
                        $tahun = date('Y');
                        for ($i=$tahun; $i>=($tahun-50) ; $i--) {
                          $selected = ($i == substr($data['tanggal_input'],0,4)) ? 'selected' : '';
                          echo "<option value=\"$i\" $selected>$i</option>";
                        }
                        ?>
                    </select>
                  </td>
                </tr>              
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="submit" name="submit"></td>
                    <td><input type="reset" value="Reset"></td>                    
                </tr>
                </table>
                <hr width=1000>
</form>