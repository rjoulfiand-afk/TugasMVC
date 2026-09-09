using System;
using System.Collections.Generic;

class Program {
    class Siswa {
        public string Nama; public int Hadir; public double Tugas, Uts, Uas;
        public List<double> Remed;
    }

    static void Main() {
        var data = new List<Siswa> {
            new Siswa { Nama="Andi", Hadir=80, Tugas=70, Uts=65, Uas=70, Remed=new List<double>{72, 78} },
            new Siswa { Nama="Budi", Hadir=70, Tugas=60, Uts=60, Uas=60, Remed=new List<double>() },
            new Siswa { Nama="Citra", Hadir=100, Tugas=90, Uts=90, Uas=95, Remed=new List<double>() }
        };

        int tuntas = 0, tidak_tuntas = 0;
        double total_kelas = 0;

        foreach (var s in data) {
            double nilai = (0.3 * s.Tugas) + (0.3 * s.Uts) + (0.4 * s.Uas);
            
            if (s.Hadir >= 75 && nilai < 75) {
                int k = 0;
                while (k < 2 && k < s.Remed.Count && nilai < 75) {
                    if (s.Remed[k] > nilai) nilai = s.Remed[k];
                    k++;
                }
            }
            
            if (s.Hadir >= 75 && nilai >= 75) tuntas++;
            else tidak_tuntas++;
            
            total_kelas += nilai;
        }
        
        Console.WriteLine($"Total Siswa: {data.Count}");
        Console.WriteLine($"Tuntas: {tuntas} | Tidak Tuntas: {tidak_tuntas}");
        Console.WriteLine($"Rata-rata Kelas: {total_kelas / data.Count}");
    }
}