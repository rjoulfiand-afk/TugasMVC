siswa = [
    {"nama": "Andi", "hadir": 80, "tugas": 70, "uts": 65, "uas": 70, "remed": [72, 78]},
    {"nama": "Budi", "hadir": 70, "tugas": 60, "uts": 60, "uas": 60, "remed": []},
    {"nama": "Citra", "hadir": 100, "tugas": 90, "uts": 90, "uas": 95, "remed": []}
]

tuntas = 0; tidak_tuntas = 0; total_kelas = 0

for s in siswa:
    nilai = (0.3 * s["tugas"]) + (0.3 * s["uts"]) + (0.4 * s["uas"])
    
    if s["hadir"] >= 75 and nilai < 75:
        k = 0
        while k < 2 and k < len(s["remed"]) and nilai < 75:
            if s["remed"][k] > nilai:
                nilai = s["remed"][k]
            k += 1
            
    if s["hadir"] >= 75 and nilai >= 75:
        tuntas += 1
    else:
        tidak_tuntas += 1
        
    total_kelas += nilai

print(f"Total Siswa: {len(siswa)}")
print(f"Tuntas: {tuntas} | Tidak Tuntas: {tidak_tuntas}")
print(f"Rata-rata Kelas: {total_kelas / len(siswa):.2f}")