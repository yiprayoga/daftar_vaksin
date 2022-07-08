<?php 
  session_start();
  //pemeriksaan session
  if (isset($_SESSION['nama'])) {
    } else {
      //session belum ada artinya belum login
      die ("<p style= text-align:center>Anda belum login! Anda tidak berhak masuk ke halaman
      ini.<br> Silahkan login <a href='login.php'>di sini</a></p>");
    }
	
?>

  <?php
    include "koneksi.php";
    $sql = 'SELECT * FROM data_pendaftar';
      
    $query = mysqli_query($con, $sql);

    if (!$query) {
      die ('SQL Error: ' . mysqli_error($con));
    }
  ?>

<html>
<head>
  <title>Menampilkan Data </title>
<!--       <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <!-- Load file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Load file library jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Load file library Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Load file library JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <style type="text/css">
      body {
        
      }
    </style>

</head>
<body>
  <div class="container">
    <br>

    <div class="form-group">
        <a href="index.php"><button class="btn btn-info">Kembali</button></a>
    </div>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
    <div class="form-group">
        <div align="center"><label for="sel1">Pilih Wilayah :</label></div>
        <select class="form-control" name="propinsi">
		<option value="">Pilih Propinsi</option>
            <?php
            //Perintah sql untuk menampilkan semua data pada tabel propinsi
            $sql="select * from propinsi order by name asc";

            $hasil=mysqli_query($con,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            $ket="";
            if (isset($_GET['propinsi'])) {
                $wilayah = trim($_GET['propinsi']);

                if ($wilayah==$data['propinsi'])
                {
                    $ket="selected";
                }
            }
            ?>
            <option <?php echo $ket; ?> value="<?php echo $data['name'];?>"><?php echo $data['name'];?></option>
            <?php
    }
  ?>
        </select>
    </div>
    <div align="center" class="form-group">
        <input type="submit" class="btn btn-info" value="Tampilkan">
    </div>
        
    </form>

    <br>
    <br>

    <?php 
      if (isset($_GET['propinsi'])) {
                ?><h4 align="center">DATA VAKSINASI COVID-19 WILAYAH <?php echo $_GET['propinsi']?> </h4>
                <?php 
            }else{
              $wilayah='-';
            }
     ?>

    <?php
    date_default_timezone_set('Asia/Jakarta');
    ?>
    <div align="center"><?php echo "Per " . date("d F Y H:i:s") . "<br>"; ?></div>
    <div align="center"><?php echo $_SESSION['nama'];?> / <?php echo $_SESSION['nim'];?></div>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Faskes</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Kelamin</th>
            <th>Umur</th>
            <th>No Hp</th>
            <th>Aksi</th>

        </tr>
        </thead>
        <?php


        if (isset($_GET['propinsi'])) {
            $jurusan=trim($_GET['propinsi']);
            $sql="select * from data_pendaftar where wilayah='$wilayah' order by nik asc";
        }else {
            $sql="select * from data_pendaftar order by nik asc";
        }

        $hasil=mysqli_query($con,$sql);
        $no=0;

        if (isset($_GET['propinsi'])) {
                ?>
                <?php
                while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_faskes"]; ?></td>
                <td><?php echo $data["nama_pendaftar"];   ?></td>
                <td><?php echo $data["nik"];   ?></td>
                <td><?php echo $data["kelamin"];   ?></td>
                <td><?php echo $data["umur"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td>
                  <a href="edit.php?nik=<?php echo $data['nik']; ?>"><button class="btn btn-success">EDIT</button></a> &nbsp
                  <a href="hapus.php?nik=<?php echo $data['nik']; ?>"><button class="btn btn-danger">HAPUS</button></a>
                </td>
            </tr>
            </tbody>
            <?php
        }
            }else{
              
            }
        ?>
    </table>
    <?php 
      $sql2=mysqli_query($con,"SELECT * FROM data_pendaftar");
      $data=mysqli_fetch_array($sql2);
    $_SESSION['cetak'] = $data['wilayah'];	
    ?>
     <div align="right" class="form-group">
        <a href="cetak.php?wilayah=<?php echo $_GET['propinsi']; ?>"><button class="btn btn-info">CETAK</button></a>
    </div>

    </div>


</body>
</html>

