 <?php
    require "./koneksi.php";

    if (isset($_POST['simpan'])) {
        $kelurahan = $_POST['kelurahan'];
        $rw = $_POST['rw'];
        $alamat = $_POST['alamat'];
        $lokasi = $_POST['lokasi'];
        $progress = $_POST['progress'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];
        $platform = $_POST['platform'];
        $catatan = $_POST['catatan'];
        $tambahan = $_POST['tambahan'];
        $olt = $_POST['olt'];
        $username_ppoe = $_POST['username_ppoe'];
        $password_ppoe = $_POST['password_ppoe'];
        $ip_modem = $_POST['ip_modem'];
        $ip_router = $_POST['ip_router'];
        $pic = $_POST['pic'];
        $no_hp = $_POST['no_hp'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];

        //sebuah query untuk menginputkan data ke table tb_siswa
        $query = "INSERT INTO `data_wifi` (`id`, `kelurahan`, `rw`, `alamat`, `lokasi`, `progress`, `status`, 
        `keterangan`, `platform`, `catatan`, `tambahan`, `olt`, `username_ppoe`, `password_ppoe`, `ip_modem`, 
        `ip_router`, `pic`, `no_hp`, `longitude`, `latitude`) VALUES
        (NULL, '$kelurahan', '$rw', '$alamat', '$lokasi', '$progress', '$status', 
        '$keterangan', '$platform', '$catatan', '$tambahan', '$olt', '$username_ppoe', '$password_ppoe', '$ip_modem', 
        '$ip_router', '$pic', '$no_hp', '$longitude', '$latitude')";

        $result = mysqli_query($koneksi, $query);

        if ($result) { ?>
 <script language="JavaScript">
alert('Tambah Berhasil !');
setTimeout(function() {
    window.location.href = '../v_datawifi'
}, 10);
 </script><?php
                } else {
                    ?>
 <script language="JavaScript">
alert('Tambah Gagal !');
setTimeout(function() {
    window.location.href = '../v_datawifi'
}, 10);
 </script><?php
                }
            } else if (isset($_POST['ubah'])) {
                $id = $_POST['id'];
                $kelurahan = $_POST['kelurahan'];
                $rw = $_POST['rw'];
                $alamat = $_POST['alamat'];
                $lokasi = $_POST['lokasi'];
                $progress = $_POST['progress'];
                $status = $_POST['status'];
                $keterangan = $_POST['keterangan'];
                $platform = $_POST['platform'];
                $catatan = $_POST['catatan'];
                $tambahan = $_POST['tambahan'];
                $olt = $_POST['olt'];
                $username_ppoe = $_POST['username_ppoe'];
                $password_ppoe = $_POST['password_ppoe'];
                $ip_modem = $_POST['ip_modem'];
                $ip_router = $_POST['ip_router'];
                $pic = $_POST['pic'];
                $no_hp = $_POST['no_hp'];
                $longitude = $_POST['longitude'];
                $latitude = $_POST['latitude'];

                $query = "UPDATE `data_wifi` SET `kelurahan`='$kelurahan',`rw`='$rw',`alamat`='$alamat',`lokasi`='$lokasi',
                `progress`='$progress',`status`='$status',`keterangan`='$keterangan',`platform`='$platform',`catatan`='$catatan',
                `tambahan`='$tambahan',`olt`='$olt',`username_ppoe`='$username_ppoe',`password_ppoe`='$password_ppoe',`ip_modem`='$ip_modem',
                `ip_router`='$ip_router',`pic`='$pic',`no_hp`='$no_hp',`longitude`='$longitude', `latitude`='$latitude' 
                where `id`='$id'";

                $result = mysqli_query($koneksi, $query);

                if ($result) { ?>
 <script language="JavaScript">
alert('Ubah Berhasil !');
setTimeout(function() {
    window.location.href = '../v_datawifi'
}, 10);
 </script><?php
                }
            } else if (isset($_POST['hapus'])) {
                $id = $_POST['id'];

                $query = "DELETE FROM `data_wifi` WHERE `id`='$id'";
                $result = mysqli_query($koneksi, $query);

                if ($result) { ?>
 <script language="JavaScript">
alert('Hapus Berhasil !');
setTimeout(function() {
    window.location.href = '../v_datawifi'
}, 10);
 </script><?php
                }
            }