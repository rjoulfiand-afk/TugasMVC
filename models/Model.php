<?php
require '../config/koneksi.php';

function getGuru() {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM tb_guru");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function getMapel() {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM tb_mapel");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function getMurid() {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM tb_murid");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function simpanJadwal($id_mapel, $id_guru, $kelas, $bulan) {
    global $conn;
    $sql = "INSERT INTO tb_jadwal (id_mapel, id_guru, kelas, bulan) 
            VALUES ('$id_mapel', '$id_guru', '$kelas', '$bulan')";
    mysqli_query($conn, $sql);
    return mysqli_insert_id($conn); 
}

function simpanAbsen($id_jadwal, $id_murid, $tanggal, $status) {
    global $conn;
    $sql = "INSERT INTO tb_absensi (id_jadwal, id_murid, tanggal, status) 
            VALUES ('$id_jadwal', '$id_murid', '$tanggal', '$status')";
    mysqli_query($conn, $sql);
}
?>