   <style type="text/css">
       #tampil_modal {
           padding-top: 10em;
           background-color: rgba(0, 0, 0, 0.8);
           position: fixed;
           top: 0;
           bottom: 0;
           left: 0;
           right: 0;
           z-index: 10;
           display: block;
       }

       #modal {
           padding: 15px;
           font-size: 16px;
           background: #e74c3c;
           color: #fff;
           width: 30%;
           border-radius: 15px;
           margin: 0 auto;
           margin-bottom: 20px;
           padding-bottom: 50px;
           z-index: 9;
       }

       #modal_sukses {
           padding: 15px;
           font-size: 16px;
           background: #AEBD38;
           color: #fff;
           width: 30%;
           border-radius: 15px;
           margin: 0 auto;
           margin-bottom: 20px;
           padding-bottom: 50px;
           z-index: 9;
       }

       #modal_atas {
           width: 100%;
           background: #c0392b;
           padding: 15px;
           margin-left: -15px;
           font-size: 18px;
           margin-top: -15px;
           border-top-left-radius: 15px;
           border-top-right-radius: 15px;
       }

       #modal_atas_sukses {
           width: 100%;
           background: #598234;
           padding: 15px;
           margin-left: -15px;
           font-size: 18px;
           margin-top: -15px;
           border-top-left-radius: 15px;
           border-top-right-radius: 15px;
       }

       #oke {
           background: #c0392b;
           border: none;
           float: right;
           width: 30%;
           height: 30px;
           font-size: 15px;
           color: #fff;
           margin-right: 5px;
           cursor: pointer;
           border: 1px black;
           border-radius: 10px;
       }

       #oke_sukses {
           background: #598234;
           border: none;
           float: right;
           width: 30%;
           height: 30px;
           font-size: 15px;
           color: #fff;
           margin-right: 5px;
           cursor: pointer;
           border: 1px black;
           border-radius: 10px;
       }
   </style>
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
        $ip = $_POST['ip'];
        // $ip_modem = $_POST['ip_modem'];
        // $ip_router = $_POST['ip_router'];
        $pic = $_POST['pic'];
        $no_hp = $_POST['no_hp'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];

        //sebuah query untuk menginputkan data ke table tb_siswa
        // $query = "INSERT INTO `data_wifi` (`id`, `kelurahan`, `rw`, `alamat`, `lokasi`, `progress`, `status`, 
        // `keterangan`, `platform`, `catatan`, `tambahan`, `olt`, `username_ppoe`, `password_ppoe`, `ip_modem`, 
        // `ip_router`, `pic`, `no_hp`, `longitude`, `latitude`) VALUES
        // (NULL, '$kelurahan', '$rw', '$alamat', '$lokasi', '$progress', '$status', 
        // '$keterangan', '$platform', '$catatan', '$tambahan', '$olt', '$username_ppoe', '$password_ppoe', '$ip_modem', 
        // '$ip_router', '$pic', '$no_hp', '$longitude', '$latitude')";
        $query = "INSERT INTO `data_wifi` (`id`, `kelurahan`, `rw`, `alamat`, `lokasi`, `progress`, `status`, 
        `keterangan`, `platform`, `catatan`, `tambahan`, `olt`, `username_ppoe`, `password_ppoe`, `ip`,
        `pic`, `no_hp`, `longitude`, `latitude`) VALUES
        (NULL, '$kelurahan', '$rw', '$alamat', '$lokasi', '$progress', '$status', 
        '$keterangan', '$platform', '$catatan', '$tambahan', '$olt', '$username_ppoe', '$password_ppoe', '$ip',
        '$pic', '$no_hp', '$longitude', '$latitude')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '
                    <div id="tampil_modal">
                        <div id="modal_sukses">
                            <div id="modal_atas_sukses">Informasi</div>
                            <p>Berhasil di tambahkan!.</p>
                            <a href="../v_datawifi"><button id="oke_sukses">Oke</button></a>
                        </div>
                    </div>';
        } else {
            echo '
           <div id="tampil_modal">
               <div id="modal">
                   <div id="modal_atas">Informasi</div>
                   <p>Gagal di tambahkan!.</p>
                   <a href="../v_datawifi"><button id="oke">Oke</button></a>
               </div>
           </div>';
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
        $ip = $_POST['ip'];
        // $ip_modem = $_POST['ip_modem'];
        // $ip_router = $_POST['ip_router'];
        $pic = $_POST['pic'];
        $no_hp = $_POST['no_hp'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];

        // $query = "UPDATE `data_wifi` SET `kelurahan`='$kelurahan',`rw`='$rw',`alamat`='$alamat',`lokasi`='$lokasi',
        //         `progress`='$progress',`status`='$status',`keterangan`='$keterangan',`platform`='$platform',`catatan`='$catatan',
        //         `tambahan`='$tambahan',`olt`='$olt',`username_ppoe`='$username_ppoe',`password_ppoe`='$password_ppoe',`ip_modem`='$ip_modem',
        //         `ip_router`='$ip_router',`pic`='$pic',`no_hp`='$no_hp',`longitude`='$longitude', `latitude`='$latitude' 
        //         where `id`='$id'";
        $query = "UPDATE `data_wifi` SET `kelurahan`='$kelurahan',`rw`='$rw',`alamat`='$alamat',`lokasi`='$lokasi',
                `progress`='$progress',`status`='$status',`keterangan`='$keterangan',`platform`='$platform',`catatan`='$catatan',
                `tambahan`='$tambahan',`olt`='$olt',`username_ppoe`='$username_ppoe',`password_ppoe`='$password_ppoe',`ip`='$ip',
                `pic`='$pic',`no_hp`='$no_hp',`longitude`='$longitude', `latitude`='$latitude' 
                where `id`='$id'";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '
            <div id="tampil_modal">
                <div id="modal_sukses">
                    <div id="modal_atas_sukses">Informasi</div>
                    <p>Berhasil di ubah!.</p>
                    <a href="../v_datawifi"><button id="oke_sukses">Oke</button></a>
                </div>
            </div>';
        } else {
            echo '
           <div id="tampil_modal">
               <div id="modal">
                   <div id="modal_atas">Informasi</div>
                   <p>Gagal di ubah!.</p>
                   <a href="../v_datawifi"><button id="oke">Oke</button></a>
               </div>
           </div>';
    ?>
   <?php
        }
    } else if (isset($_POST['hapus'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM `data_wifi` WHERE `id`='$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '
            <div id="tampil_modal">
                <div id="modal_sukses">
                    <div id="modal_atas_sukses">Informasi</div>
                    <p>Berhasil Dihapus!.</p>
                    <a href="../v_datawifi"><button id="oke_sukses">Oke</button></a>
                </div>
            </div>';
        }
    }
