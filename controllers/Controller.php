<?php
require '../models/Model.php';

if (isset($_POST['simpan'])) {

    if(empty($_POST['id_mapel']) || empty($_POST['id_guru']) || empty($_POST['kelas']) || empty($_POST['bulan'])) {
         echo "<script>
                alert('Peringatan: Data Kelas, Mapel, Guru, atau Bulan tidak boleh kosong!');
                window.history.back();
              </script>";
         exit; 
    }

    $id_mapel = $_POST['id_mapel'];
    $kelas    = $_POST['kelas'];
    $id_guru  = $_POST['id_guru'];
    

    $bulan    = $_POST['bulan']; 

    // Simpan sampul absen baru
    $id_jadwal_baru = simpanJadwal($id_mapel, $id_guru, $kelas, $bulan);
    
    // Proses simpan rekapan absen 1-30
    $data_absen = $_POST['absen']; 
    foreach ($data_absen as $id_murid => $tanggal_absen) {
        foreach ($tanggal_absen as $hari => $status) {
            
            if ($status !== '-') {
                // Biar angka 1 jadi "01", angka 2 jadi "02"
                $hari_format = str_pad($hari, 2, "0", STR_PAD_LEFT);
                
                $tanggal_full = $bulan . "-" . $hari_format; 

                // Lempar ke Model buat disimpan ke Database
                simpanAbsen($id_jadwal_baru, $id_murid, $tanggal_full, $status);
            }
            
        }   
    }
    echo "<script>
            alert('Mantap Rixsan! Data absensi berhasil direkam ke Database.');
            localStorage.removeItem('draft_absensi_rixsan');
            window.location.href = 'Controller.php';
          </script>";
}

// Tarik semua data master
$murid = getMurid();
$guru  = getGuru();
$mapel = getMapel();

// Panggil Tampilan
require '../view/view.php';
?>