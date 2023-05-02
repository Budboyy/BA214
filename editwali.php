<?php
$nik = $_GET['nik'];
include "koneksi.php";

$qry = "SELECT * FROM wali WHERE nik = '$nik'";
$exec = mysqli_query($con, $qry);
$data = mysqli_fetch_assoc($exec);

?>


<form action="updatewali.php" method="post">
  <fieldset>
    <legend>Form edit data Wali</legend>
    <h2>Edit biodata Wali</h2>
    <table>
      <tr>
        <td>NIK (Nomor Induk Keluarga)</td>
        <td>:</td>
        <td><input type="number" name="nik" value="<?= $data['nik'] ?>" readonly></td>
      </tr>
      <tr>
        <td>Nama Wali</td>
        <td>:</td>
        <td><input type="text" name="wali" value="<?php echo $data['wali']; ?>"></td>
      </tr>
      <tr>
        <td>Pendidikan</td>
        <td>:</td>
        <td>
          <select name="pendidikan">
            <option value="1" <?php echo $data['pendidikan'] == '1' ? 'selected' : ''; ?>>D3</option>
            <option value="2" <?php echo $data['pendidikan'] == '2' ? 'selected' : ''; ?>>S1</option>
            <option value="3" <?php echo $data['pendidikan'] == '3' ? 'selected' : ''; ?>>S2</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>
          <input type="radio" name="gender" value="1" <?php echo $data['gender'] == '1' ? 'checked' : ''; ?>> laki-laki
          <input type="radio" name="gender" value="0" <?php echo $data['gender'] == '0' ? 'checked' : ''; ?>> Perempuan
        </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>:</td>
                    <td><input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email" value="<?php echo $data['email']; ?>"></td>
                </tr>


                <tr>
  <td>Tanggal Lahir</td>
  <td>:</td>
  <td>
    <select name="tanggal_lahir">
      <?php
      for ($i=1; $i<=31 ; $i++) {
        if ($i == substr($data['tanggal_lahir'],8,2)) {
          echo '<option value="' . $i . '" selected>' . $i . '</option>';
        } else {
          echo '<option value="' . $i . '">' . $i . '</option>';
        }
      }
      ?>
    </select>
  </td>
  <td>
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
        $selected = ($key == date('m', strtotime($data['tanggal_lahir']))) ? 'selected' : '';
        echo "<option value=\"$key\" $selected>$value</option>";
      }
      ?>
    </select>
  </td>
  <td>
    <select name="tahun">
      <?php
      $tahun = date('Y');
      for ($i=$tahun; $i>=($tahun-50) ; $i--) {
        $selected = ($i == substr($data['tanggal_lahir'],0,4)) ? 'selected' : '';
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
                </tr>
            </table>
        </fieldset>
    </form>