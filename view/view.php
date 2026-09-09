<!DOCTYPE html>
<html>
<head> 
    <title>Daftar Absensi Siswa</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Inter', 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
            background-color: #f4f7fb; /* Sedikit lebih kebiruan/fresh */
            color: #1e293b; 
            padding: 30px 20px;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 { 
            color: #0f172a; 
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 24px; 
            letter-spacing: -0.5px;
        }

        .header-card { 
            background: #ffffff; 
            padding: 24px 28px; 
            border-radius: 12px; 
            border: 1px solid #e2e8f0; 
            margin-bottom: 24px; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03); 
            display: grid; 
            
            /* INI KUNCINYA BRO: Paksa jadi 2 kolom (1fr 1fr), biar gak melar jadi 3 */
            grid-template-columns: repeat(2, 1fr); 
            gap: 20px; 
        }
        @media (max-width: 768px) {
            .header-card { grid-template-columns: 1fr; }
        }

        .form-group { display: flex; flex-direction: column; gap: 8px; }
        .form-group label { 
            font-size: 12px; 
            font-weight: 600; 
            color: #64748b; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
        }
        .form-group select, .form-group input { 
            padding: 12px 16px; 
            border: 1px solid #cbd5e1; 
            border-radius: 8px; 
            background-color: #f8fafc; 
            color: #0f172a;
            font-size: 14px;
            font-weight: 500;
            outline: none; 
            transition: all 0.2s ease; 
        }
        .form-group input::placeholder { color: #94a3b8; font-weight: 400; }
        .form-group select:focus, .form-group input:focus { 
            background-color: #ffffff;
            border-color: #3b82f6; 
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15); 
        }

        .legend-box { display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap; }
        .legend-item { 
            padding: 6px 14px; 
            border-radius: 8px; 
            font-size: 12px; 
            font-weight: 600; 
            display: flex; 
            align-items: center; 
            gap: 6px; 
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }
        
        .legenda-strip { background-color: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; box-shadow: none;}
        .warna-h { background-color: #10b981 !important; color: white !important; border: none !important; } 
        .warna-s { background-color: #f59e0b !important; color: white !important; border: none !important; } 
        .warna-i { background-color: #8b5cf6 !important; color: white !important; border: none !important; } 
        .warna-a { background-color: #ef4444 !important; color: white !important; border: none !important; } 

        .table-wrapper {
            background: #ffffff; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03); 
            border: 1px solid #e2e8f0; 
            overflow: hidden; 
        }
        .table-scroll { 
            overflow-x: auto;
            max-height: 600px; 
            overflow-y: auto;
        }
        
        .table-scroll::-webkit-scrollbar { height: 10px; width: 10px; }
        .table-scroll::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 8px; }
        .table-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 8px; border: 2px solid #f1f5f9; }
        .table-scroll::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        table { border-collapse: collapse; width: max-content; min-width: 100%; }
        th, td { 
            border-bottom: 1px solid #e2e8f0; 
            border-right: 1px solid #e2e8f0;
            padding: 10px 6px; 
            text-align: center; 
        }
        th:last-child, td:last-child { border-right: none; }
        tr:last-child td { border-bottom: none; } 
        
        th { 
            background-color: #f8fafc; 
            color: #334155; 
            font-size: 12px; 
            font-weight: 700;
            text-transform: uppercase; 
            position: sticky; 
            top: 0; 
            z-index: 10;
            box-shadow: inset 0 -1px 0 #e2e8f0; 
        }
        tr:hover td { background-color: #f8fafc; }
        .text-left { text-align: left; padding-left: 20px; white-space: nowrap; font-weight: 500; color: #0f172a;}
        
        .select-absen { 
            padding: 6px; 
            border-radius: 6px; 
            font-weight: 600; 
            cursor: pointer; 
            outline: none; 
            text-align: center; 
            appearance: none; 
            width: 38px; 
            height: 34px; 
            background-color: #f1f5f9; 
            color: #64748b; 
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }
        .select-absen:hover { background-color: #e2e8f0; color: #0f172a; }
        .select-absen option { background-color: #ffffff; color: #0f172a; font-weight: 600; }
        

        button { 
            margin-top: 24px; 
            padding: 12px 28px; 
            cursor: pointer; 
            background-color: #3b82f6; 
            color: white; 
            border: none; 
            border-radius: 8px; 
            font-size: 15px; 
            font-weight: 600; 
            transition: 0.2s ease; 
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2);
        }
        button:hover { background-color: #2563eb; transform: translateY(-2px); box-shadow: 0 6px 10px -1px rgba(59, 130, 246, 0.3); }
    </style>
</head>
<body>
    <div class="main-container">
        <h2>Absensi Kehadiran Murid</h2>
        
        <form method="POST" action="">
            <div class="header-card">
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select name="id_mapel" required>
                        <option value="">-- Pilih Mapel --</option>
                        <?php foreach($mapel as $mp) { ?>
                            <option value="<?= $mp['id_mapel'] ?>"><?= $mp['nama_mapel'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Guru</label>
                    <select name="id_guru" required>
                        <option value="">-- Pilih Guru --</option>
                        <?php foreach($guru as $gr) { ?>
                            <option value="<?= $gr['id_guru'] ?>"><?= $gr['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" placeholder="Misal: XII RPL 1" required>
                </div>
                <div class="form-group">
                    <label>Bulan</label>
                    <input type="month" name="bulan" required>
                </div>
            </div>

            <div class="legend-box">
                <div class="legend-item legenda-strip">- : Belum Diisi</div>
                <div class="legend-item warna-h">H : Hadir</div>
                <div class="legend-item warna-s">S : Sakit</div>
                <div class="legend-item warna-i">I : Izin</div>
                <div class="legend-item warna-a">A : Alpa</div>
            </div>

            <div class="table-wrapper">
                <div class="table-scroll">
                    <table>
                        <tr>
                            <th rowspan="2" style="width: 48px; min-width: 48px;">No</th>
                            <th rowspan="2" class="text-left" style="min-width: 220px;">Nama Murid</th>
                            <th colspan="30">Tanggal</th>
                        </tr>
                        <tr>
                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                                <th style="width: 48px; min-width: 48px; top: 38px;"><?= $i ?></th>
                            <?php } ?>
                        </tr>

                        <?php 
                        $no = 1;
                        foreach ($murid as $m) { 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="text-left"><?= $m['nama_murid'] ?></td>
                            
                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                                <td>
                                    <select name="absen[<?= $m['id_murid'] ?>][<?= $i ?>]" class="select-absen" onchange="ubahWarna(this)">
                                        <option value="-">-</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                        <option value="S">S</option>
                                        <option value="A">A</option>
                                    </select>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            
            <button type="submit" name="simpan">Simpan Absensi</button>
        </form>
    </div>

<script>
        // Fungsi bawaan lu buat ngubah warna
        function ubahWarna(elemen) {
            elemen.classList.remove('warna-h', 'warna-i', 'warna-s', 'warna-a');
            let nilai = elemen.value.toLowerCase();
            if(nilai !== '-') {
                elemen.classList.add('warna-' + nilai);
            }
        }

        // ==========================================
        // FITUR ANTI-HILANG (LOCALSTORAGE) RIXSAN
        // ==========================================
        document.addEventListener("DOMContentLoaded", function() {
            
            // 1. Fungsi buat nge-save otomatis ke LocalStorage
            function simpanDraft() {
                let formDraft = {};
                // Ambil semua kotak input dan dropdown yang ada name-nya
                document.querySelectorAll('input, select').forEach(element => {
                    if (element.name) {
                        formDraft[element.name] = element.value;
                    }
                });
                // Ubah jadi teks JSON dan simpan ke brankas browser
                localStorage.setItem('draft_absensi_rixsan', JSON.stringify(formDraft));
            }

            // 2. Pasang sensor: Tiap kali guru ngetik atau milih kotak, langsung Auto-Save!
            document.querySelectorAll('input, select').forEach(element => {
                element.addEventListener('input', simpanDraft);
                element.addEventListener('change', simpanDraft);
            });

            // 3. Fungsi nge-load data (Jalan otomatis kalau web ter-refresh)
            let dataLama = localStorage.getItem('draft_absensi_rixsan');
            if (dataLama) {
                let formDraft = JSON.parse(dataLama);
                
                document.querySelectorAll('input, select').forEach(element => {
                    // Kalau di brankas ada datanya, masukin balik ke kotaknya
                    if (element.name && formDraft[element.name]) {
                        element.value = formDraft[element.name];
                        
                        // Khusus kotak absen HISA, kita pancing warnanya biar langsung nyala lagi
                        if (element.classList.contains('select-absen')) {
                            ubahWarna(element);
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>