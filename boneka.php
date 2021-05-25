
<?php

include("koneksi.php");
 
  //jika tombol simpan diklik
   if(isset($_POST['bsimpan']))
   {
     //pengujian apakah data disimpan baru atau di edit
     if($_GET['hal']=="edit")
     {
       //data akan diedit
       $edit = mysqli_query($koneksi, "UPDATE boneka set id_boneka='$_POST[tid_boneka]', id_merk='$_POST[tid_merk]', 
       ukuran='$_POST[tukuran]', warna='$_POST[twarna]',harga='$_POST[tharga]', stok='$_POST[tstok]'
       WHERE id_jam='$_GET[id]'");
 
       if($edit)
       {
         echo "<script>
         alert('Edit Data Sukses!');
         document.location='boneka.php';
         </script>";
       }
       else
       {
         echo "<script>
         alert('Edit Data Gagal!');
         document.location='boneka.php';
         </script>";
       }
 
     }
     else
     {
       //data akan disimpan baru    
       $simpan = mysqli_query($koneksi, "INSERT INTO boneka (id_boneka, id_merk, ukuran, warna, harga, stok)
       VALUES ('$_POST[tid_boneka]', '$_POST[tid_merk]','$_POST[tukuran]', '$_POST[twarna]','$_POST[tharga]','$_POST[tstok]')");
 
       if($simpan)
       {
         echo "<script>
         alert('Simpan Data Sukses!');
         document.location='boneka.php';
         </script>";
       }
       else
       {
         echo "<script>
         alert('Simpan Data Gagal!');
         document.location='boneka.php';
         </script>";
       }
     }
   }
   //jika tombol edit/hapus diklik
   if(isset($_GET['hal']))
   {
     //jika data diedit
     if($_GET['hal']=="edit")
     {
       //tampilkan data yang akan diedit
       $tampil = mysqli_query($koneksi, "SELECT * FROM boneka WHERE id_boneka = '$_GET[id]'");
       $data = mysqli_fetch_array($tampil);
       if($data)
       {
         //jika data ditemukan, maka data ditampung ke dalam variabel
         $vid_boneka= $data['id_boneka'];
         $vid_merk= $data['id_merk'];
         $vukuran= $data['ukuran'];
         $vwarna= $data['warna'];
         $vharga= $data['harga'];
         $vstok= $data['stok'];
       }
     }
     else if($_GET['hal']=="hapus")
     {
       //persipahan hapus data
       $hapus = mysqli_query($koneksi, "DELETE FROM boneka WHERE id_boneka='$_GET[id]' ");
       if($hapus)
       {
         echo "<script>
         alert('Hapus Data Sukses!');
         document.location='boneka.php';
         </script>";
       }
     }
   }
 
?>

<!DOCTYPE html>
<html>
<head>
    <title>DATA TOKO</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">   
</head>
<body id="page-top">
<div class="container">
  <!--Nav bar untuk menu-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top" id="mainNav">
  <div class="container-fluid">
    <a class="navbar-brand" href="page-top">Toko Boneka Aca</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" aria-current="page" href="merk.php">Merk</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active js-scroll-trigger" href="boneka.php">Boneka</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="detail_bayar.php">Detail Bayar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="header_bayar.php">Header Bayar</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link js-scroll-trigger" aria-current="page" href="pemasukan.php">Pemasukan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!--Akhir Nav bar untuk menu-->
<br><br><br>
  <h3 class="text-center">Data Boneka</h3>

<!--Awal Card Form-->
<div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Form Input Data Boneka
  <div class="card-body">
    <form method = "post" action="">
    <div class="form-group">
        <label>ID Boneka</label>
        <input type="text" name="tid_boneka" value="<?=@$vid_boneka?>" class="form-control" placeholder="Input ID Boneka di sini!" required>
    </div>
    <div class="form-group">
        <label>ID Merk</label>
        <input type="text" name="tid_merk" value="<?=@$vid_merk?>" class="form-control" placeholder="Input ID Merk di sini!" required>
    </div>
    <div class="form-group">
        <label>Ukuran</label>
        <input type="text" name="tukuran" value="<?=@$vukuran?>" class="form-control" placeholder="Input Ukuran Boneka di sini!" required>
    </div> 
    <div class="form-group">   
        <label>Warna</label>
        <input type="text" name="twarna" value="<?=@$vwarna?>" class="form-control" placeholder="Input Warna Boneka di sini!" required>
    </div>
    <div class="form-group">   
        <label>Harga</label>
        <input type="text" name="tharga" value="<?=@$vharga?>" class="form-control" placeholder="Input Harga Boneka di sini!" required>
    </div>
    <div class="form-group">   
        <label>Jumlah Stok</label>
        <input type="text" name="tstok" value="<?=@$vstok?>" class="form-control" placeholder="Input Jumlah Stok Boneka di sini!" required>
    </div>
    
    <button type ="submit" class="btn btn-success" name="bsimpan">Simpan</button>
    <button type ="reset" class="btn btn-danger" name="breset">Kosongkan</button>

    </form>
  </div>
</div>
<!--Akhir Card Form-->

<!--Awal Card Table-->
<div class="card mt-3">
  <div class="card-header bg-success text-white">
    Data Toko
  </div>
  <div class="card-body">
    <table class ="table table-bordered table-striped">
      <tr>
        <th>No.</th>
        <th>ID Boneka</th>
        <th>ID Merk</th>
        <th>Ukuran</th>
        <th>Warna Boneka</th>
        <th>Harga</th>
        <th>Jumlah Stok</th>
        <th>Aksi</th>
      </tr>
      <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM boneka order by id_boneka");
        while($data = mysqli_fetch_array($tampil)) :
      ?>
      <tr>
        <td><?=$no++;?></td>
        <td><?=$data['id_boneka'];?></td>
        <td><?=$data['id_merk'];?></td>
        <td><?=$data['ukuran'];?></td>
        <td><?=$data['warna'];?></td>
        <td><?=$data['harga'];?></td>
        <td><?=$data['stok'];?></td>
        <td>
          <a href="boneka.php?hal=edit&id=<?=$data['id_boneka']?>" class ="btn btn-warning">Edit</a>
          <a href="boneka.php?hal=hapus&id=<?=$data['id_boneka']?>" onclick="return confirm('Apakah yakin ingin menghapus data?')" 
          class ="btn btn-danger">Hapus</a>
        </td>
      </tr>

      <?php endwhile; //penutup perulangan while ?>

    </table>

  </div>
</div>
<!--Akhir Card Table-->

</div>


<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>