import java.util.*;

public class Main {
    static class Siswa {
        String nama; int hadir; double tugas, uts, uas;
        double[] remed;
        Siswa(String n, int h, double t, double ut, double ua, double[] r) {
            nama = n; hadir = h; tugas = t; uts = ut; uas = ua; remed = r;
        }
    }

    public static void main(String[] args) {
        List<Siswa> data = Arrays.asList(
            new Siswa("Andi", 80, 70, 65, 70, new double[]{72, 78}),
            new Siswa("Budi", 70, 60, 60, 60, new double[]{}),
            new Siswa("Citra", 100, 90, 90, 95, new double[]{})
        );

        int tuntas = 0, tidak_tuntas = 0;
        double total_kelas = 0;

        for (Siswa s : data) {
            double nilai = (0.3 * s.tugas) + (0.3 * s.uts) + (0.4 * s.uas);
            
            if (s.hadir >= 75 && nilai < 75) {
                int k = 0;
                while (k < 2 && k < s.remed.length && nilai < 75) {
                    if (s.remed[k] > nilai) nilai = s.remed[k];
                    k++;
                }
            }
            
            if (s.hadir >= 75 && nilai >= 75) tuntas++;
            else tidak_tuntas++;
            
            total_kelas += nilai;
        }
        System.out.println("Total Siswa: " + data.size());
        System.out.println("Tuntas: " + tuntas + " | Tidak Tuntas: " + tidak_tuntas);
        System.out.println("Rata-rata Kelas: " + (total_kelas / data.size()));
    }
}