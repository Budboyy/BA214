<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
    <style>
       .tabel {
            width: 100%;
            border: 1px solid black;
       }

       .tabel td, th {
        border: 1px solid black;
       }

       .tabel tr {
        border: 1px solid black;
       }
    </style>
</head>

<body>
    
    <form action="prosesdosen.php" method="post">
        <fieldset>
            <legend>Form input data Dosen</legend>
            <h2>Lengkapi biodata dengan benar</h2>
            <table>
                <tr>
                    <td>NIDN (Nomor Induk Dosen Nasional)</td>
                    <td>:</td>
                    <td><input type="number" name="nidn"></td>
                </tr>
                <tr>
                    <td>Nama Dosen</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><select name="kelas">
                            <option value="1">Online</option>
                            <option value="2">Offline</option> 
                            <option value="3">Hybrid</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="gender" value="1"> laki-laki
                        <input type="radio" name="gender" value="0"> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>:</td>
                    <td><input type="text" name="no_hp"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email"></td>
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
    
    <table style="width: 100%; border: 1px solid black;" >
    <tr>
        <th style="border: 1px solid black;">NIDN</th>
        <th style="border: 1px solid black;">Nama</th>
        <th style="border: 1px solid black;">Kelas</th>
        <th style="border: 1px solid black;">Gender</th>
        <th style="border: 1px solid black;">Alamat</th>
        <th style="border: 1px solid black;">No HP</th>
        <th style="border: 1px solid black;">Email</th>
        <th style="border: 1px solid black;">Tanggal Lahir</th>
        <th style="border: 1px solid black;">act</th>
    </tr>
    <?php
        include "koneksi.php";
        $qry = "SELECT * FROM dosen";
        $exec = mysqli_query($con, $qry); 

        while($data = mysqli_fetch_assoc($exec)){
    ?>
    <tr>
        <td style="border: 1px solid black;"><?= $data['nidn']?></td>
        <td style="border: 1px solid black;"><?= $data['nama']?></td>
        <td style="border: 1px solid black;">
            <select name="kelas">
                <option value="1" <?= $data['kelas'] == 1 ? "selected" : "" ?>> Online</option  readonly>
                <option value="2" <?= $data['kelas'] == 2 ? "selected" : "" ?>> Offline </option>
                <option value="3" <?= $data['kelas'] == 3 ? "selected" : "" ?>> Hybrid </option>
            </select>
        </td>
        <td style="border: 1px solid black;"><?= $data['gender'] == 1? "laki-laki" : "Perempuan" ?></td>
        <td style="border: 1px solid black;"><?= $data['alamat']?></td>
        <td style="border: 1px solid black;"><?= $data['no_hp']?></td>
        <td style="border: 1px solid black;"><?= $data['email']?></td>
        <td style="border: 1px solid black;"><?php echo date('d F Y', strtotime($data['tanggal_lahir'])); ?></td>
        <td style="border: 1px solid black;">

            <a href="editdosen.php?nidn=<?= $data ['nidn'] ?>"><button>Edit</button></a>
            <a href="deletedosen.php?nidn=<?= $data ['nidn'] ?>"><button>Delete</button></a>
        </td>
    </tr>
    <?php } ?>
</table>

    
</body>

</html>

