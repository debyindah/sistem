<?php 
session_start();
// membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","inventaris");

//Menambah barang baru
if(isset($_POST['addnewbarang'])){
	$namabarang = $_POST['namabarang'];
	$merek = $_POST['merek'];
	$kategori = $_POST['kategori'];
	$tahun = $_POST['tahun'];
	$ruang = $_POST['ruang'];
	$jumlah = $_POST['jumlah'];
	$kondisi = $_POST['kondisi'];

	$addtotable = mysqli_query($conn,"insert into barang (idbarang, namabarang, merek, kategori, tahun, ruang, jumlah, kondisi) values('$namabarang','$merek','$kategori','$tahun','$ruang','$jumlah','$kondisi')");
	if($addtotable){
		echo '
        <script>alert("Data Berhasil Ditambahkan");
        window.location.href="barang.php"
        </script>
        ';
	} else {
		echo 'Gagal';
		header('location:barang.php');
	}
}

//menambah ruang
if(isset($_POST['addnewruang'])){
	$namaruang = $_POST['namaruang'];

	$addtoruang = mysqli_query($conn,"insert into ruang (idruang, namaruang) values('$idruang','$namaruang')");
	if($addtoruang){
		echo '
        <script>alert("Data Ruang Berhasil Ditambahkan");
        window.location.href="ruang.php"
        </script>
        ';
	} else {
		echo 'Gagal';
		header('location:ruang.php');
	}
}

// menambah kategori
if(isset($_POST['addnewkategori'])){
	$namakategori = $_POST['namakategori'];

	$addtokategori = mysqli_query($conn,"insert into kategori (idkategori, namakategori) values('$idkategori','$namakategori')");
	if($addtokategori){
		echo '
        <script>alert("Data Kategori Berhasil Ditambahkan");
        window.location.href="kategori.php"
        </script>
        ';
	} else {
		echo 'Gagal';
		header('location:kategori.php');
	}
}


//update info barang
if(isset($_POST['updatebarang'])){
	$idb = $_POST['idb'];
	$namabarang = $_POST['namabarang'];
	$merek = $_POST['merek'];
	$kategori = $_POST['kategori'];
	$tahun = $_POST['tahun'];
	$ruang = $_POST['ruang'];
	$jumlah = $_POST['jumlah'];
	$kondisi = $_POST['kondisi'];

	$update = mysqli_query($conn,"update barang set namabarang='$namabarang', merek='$merek', kategori='$kategori', tahun='$tahun', ruang='$ruang', jumlah='$jumlah', kondisi='$kondisi' where idbarang ='$idb'");
	if($update){
		echo '
        <script>alert("Data Barang Berhasil Diupdate");
        window.location.href="barang.php"
        </script>
        ';
	} else {
		echo 'Gagal';
		header('location:barang.php');
	}
}

//menghapus barang inventaris
if(isset($_POST['hapusbarang'])){
	$idb = $_POST['idb'];

	$hapus = mysqli_query($conn, "delete from barang where idbarang='$idb'");
	if($hapus){
		header('location:barang.php');
	} else {
		echo 'Gagal';
		header('location:barang.php');
	}
}


//update info Ruang
if(isset($_POST['updateruang'])){
	$idr = $_POST['idr'];
	$namaruang = $_POST['namaruang'];

	$updateru = mysqli_query($conn,"update ruang set namaruang='$namaruang' where idruang ='$idr'");
	if($updateru){
		echo '
        <script>alert("Data Ruang Berhasil Diupdate");
        window.location.href="ruang.php"
        </script>
        ';
	} else {
		echo 'Gagal';
		header('location:ruang.php');
	}
}

//menghapus ruang inventaris
if(isset($_POST['hapusruang'])){
	$idr = $_POST['idr'];

	$hapus = mysqli_query($conn, "delete from ruang where idruang='$idr'");
	if($hapus){
		header('location:ruang.php');
	} else {
		echo 'Gagal';
		header('location:ruang.php');
	}
}


//update info kategori
if(isset($_POST['updatekategori'])){
	$idk = $_POST['idk'];
	$namakategori = $_POST['namakategori'];

	$updateru = mysqli_query($conn,"update kategori set namakategori='$namakategori' where idkategori ='$idk'");
	if($updateru){
		echo '
        <script>alert("Data Kategori Berhasil Diupdate");
        window.location.href="kategori.php"
        </script>
        ';
	} else {
		echo 'Gagal';
		header('location:kategori.php');
	}
}

//menghapus kategori inventaris
if(isset($_POST['hapuskategori'])){
	$idk = $_POST['idk'];

	$hapus = mysqli_query($conn, "delete from kategori where idkategori='$idk'");
	if($hapus){
		header('location:kategori.php');
	} else {
		echo 'Gagal';
		header('location:kategori.php');
	}
}


 ?>