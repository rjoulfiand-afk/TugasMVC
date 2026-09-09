<?php
$siswa = [
    ["nama" => "Andi", "hadir" => 80, "tugas" => 70, "uts" => 65, "uas" => 70, "remed" => [72, 78]],
    ["nama" => "Budi", "hadir" => 70, "tugas" => 60, "uts" => 60, "uas" => 60, "remed" => []],
    ["nama" => "Citra", "hadir" => 100, "tugas" => 90, "uts" => 90, "uas" => 95, "remed" => []]
];

$tuntas = 0; $tidak_tuntas = 0; $total_kelas = 0;

foreach ($siswa as $s) {
    $nilai = (0.3 * $s["tugas"]) + (0.3 * $s["uts"]) + (0.4 * $s["uas"]);
    
    if ($s["hadir"] >= 75 && $nilai < 75) {
        $kesempatan = 0;
        while ($kesempatan < 2 && $nilai < 75) {
            if (isset($s["remed"][$kesempatan]) && $s["remed"][$kesempatan] > $nilai) {
                $nilai = $s["remed"][$kesempatan];
            }
            $kesempatan++;
        }
    }
    if ($nilai >= 90) $predikat = "A";
    elseif ($nilai >= 80) $predikat = "B";
    elseif ($nilai >= 75) $predikat = "C";
    elseif ($nilai >= 60) $predikat = "D";
    else $predikat = "E";
    
    if ($s["hadir"] >= 75 && $nilai >= 75) $tuntas++;
    else $tidak_tuntas++;
    
    $total_kelas += $nilai;
}

echo "Total Siswa: " . count($siswa) . "\n";
echo "Siswa Tuntas: $tuntas | Tidak Tuntas: $tidak_tuntas\n";
echo "Rata-rata Kelas: " . ($total_kelas / count($siswa));
?>