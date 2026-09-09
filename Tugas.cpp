#include <iostream>
#include <vector>
using namespace std;

struct Siswa {
    string nama; int hadir; double tugas, uts, uas;
    vector<double> remed;
};

int main() {
    vector<Siswa> data = {
        {"Andi", 80, 70, 65, 70, {72, 78}},
        {"Budi", 70, 60, 60, 60, {}},
        {"Citra", 100, 90, 90, 95, {}}
    };
    
    int tuntas = 0, tidak_tuntas = 0;
    double total_kelas = 0;
    
    for (int i = 0; i < data.size(); i++) {
        double nilai = (0.3 * data[i].tugas) + (0.3 * data[i].uts) + (0.4 * data[i].uas);
        
        if (data[i].hadir >= 75 && nilai < 75) {
            int k = 0;
            while (k < 2 && k < data[i].remed.size() && nilai < 75) {
                if (data[i].remed[k] > nilai) nilai = data[i].remed[k];
                k++;
            }
        }
        
        char predikat = (nilai >= 90) ? 'A' : (nilai >= 80) ? 'B' : (nilai >= 75) ? 'C' : (nilai >= 60) ? 'D' : 'E';
        
        if (data[i].hadir >= 75 && nilai >= 75) tuntas++;
        else tidak_tuntas++;
        
        total_kelas += nilai;
    }
    
    cout << "Total Siswa: " << data.size() << "\n";
    cout << "Tuntas: " << tuntas << " | Tidak Tuntas: " << tidak_tuntas << "\n";
    cout << "Rata-rata Kelas: " << (total_kelas / data.size()) << "\n";
    return 0;
}