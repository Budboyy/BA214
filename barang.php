<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <style>
      body{
        background-color: lightblue;
        font-family: 'Times New Roman', Times, serif;
      }
    </style>
</head>

<body>
    
    <form action="prosesbarang.php" method="post">
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
                    <td><input type=reset value=Reset></td>                    
                </tr>
                </table>
                <hr width=1000>
    </form>

    <h2 style="text-align: center">DATA HASIL INPUT</h2>

    <table style="width: 70%; border: 1px solid black;" >
    <tr style="background-color:#2A72BA">
        <th style="border: 1px solid black;">Kode Barang</th>
        <th style="border: 1px solid black;">Nama Barang</th>
        <th style="border: 1px solid black;">Harga</th>
        <th style="border: 1px solid black;">Stok Barang</th>
        <th style="border: 1px solid black;">Tanggal Input</th>
        <th style="border: 1px solid black;">act</th>
    </tr>
    <?php
        include "koneksi.php";
        $qry = "SELECT * FROM barang";
        $exec = mysqli_query($con, $qry); 

        while($data = mysqli_fetch_assoc($exec)){
    ?>
    <tr>
        <td style="border: 1px solid black;"><?= $data['kodebrg']?></td>
        <td style="border: 1px solid black;"><?= $data['namabrg']?></td>
        <td style="border: 1px solid black;"><?= $data['harga']?></td>
        <td style="border: 1px solid black;"><?= $data['stokbrg']?></td>
        <td style="border: 1px solid black;"><?php echo date('d F Y', strtotime($data['tanggal_input'])); ?></td>
        <td style="border: 1px solid black;">

            <a href="editbarang.php?nidn=<?= $data ['kodebrg'] ?>"><button>Edit</button></a>
            <a href="deletebarang.php?kodebrg=<?= $data ['kodebrg'] ?>"><button>Delete</button></a>
</td>
    </tr>
    <?php } ?>
</table>

    
</body>

</html>

