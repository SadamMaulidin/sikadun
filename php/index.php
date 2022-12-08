<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <div class="container">
    <center>
      <h2>
        Daftar Mahasiswa
      </h2>
    </center>
    <a href="create_barang.php" class="btn btn-success btn-lg " tabindex="-1" role="button" aria-disabled="true">Tambah Data</a>
    <table class="table table-hover-dark">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Dosen Wali</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require '../connection/conn.php';
        $hasil = mysqli_query($conn, "SELECT * FROM mahasiswa")
        ?>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_array($hasil)) {
          echo "<tr>";
          echo "<th>" . $no . "</th>";
          echo "<td>" . $data['nim_mhs'] . "</td>";
          echo "<td>" . $data['nama_mhs'] . "</td>";
          echo "<td>" . $data['email_mhs'] . "</td>";
          echo "<td>" . $data['tgl_lahir'] . "</td>";
          echo "<td>" . $data['id_dosen'] . "</td>";
        //   echo "<td>
        //     <a href='edit_barang.php?id_barang=$data[id_barang]' class='btn btn-warning btn-sm' style='font-weight: 600;'>Edit</a>|
        //     <a href='delete_barang.php?id_barang=$data[id_barang] ' class='btn btn-danger btn-sm' style='font-weight: 600;'>Delete</a>
        //     </td>";
        //   echo "</tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>