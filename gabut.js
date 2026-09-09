const Soal6Kondisi = () => {
    let isDarkMode = true;
    const bgMode = isDarkMode ? '#121212' : '#FFFFFF';
    const teksMode = isDarkMode ? 'white' : 'black';
    return (
        <View style={styles.bungkusSoal}>
            <Text>Soal 6 (Theme Mode):</Text>
            <Text>Dark Mode : {isDarkMode ? "Aktif" : "Mati"}</Text>
            <View style={{ backgroundColor: bgMode, paddingHorizontal: 5 }}>
                <Text style={{ color: teksMode }}>Status : Simulasi Layar Mode</Text>
            </View>
        </View>
    );
};

const Soal7Kondisi = () => {
    let passwordReg = "rahas"; 
    return (
        <View style={styles.bungkusSoal}>
            <Text>Soal 7 (Validasi Password):</Text>
            <Text>Password Input : {passwordReg}</Text>
            {passwordReg.length < 6 && (
                <Text style={{ color: 'red' }}>Status : Password terlalu pendek (minimal 6 karakter)</Text>
            )}
        </View>
    );
};

const Soal8Kondisi = () => {
    let jenisKendaraan = "Motor";
    const teksParkir = jenisKendaraan === "Mobil" ? "Tarif Parkir: Rp 5.000 / jam" : "Tarif Parkir: Rp 2.000 / jam";

    return (
        <View style={styles.bungkusSoal}>
            <Text>Soal 8 (Tarif Parkir):</Text>
            <Text>Kendaraan : {jenisKendaraan}</Text>
            <Text>Status : {teksParkir}</Text>
        </View>
    );
};

const Soal9Kondisi = () => {
    let stokBarang = 5;
    let teksStok, warnaStok;
    
    if (stokBarang > 10) {
        teksStok = "Stok Tersedia";
        warnaStok = 'green';
    } else if (stokBarang >= 1 && stokBarang <= 10) {
        teksStok = "Stok Terbatas! Segera Beli";
        warnaStok = 'orange';
    } else {
        teksStok = "Stok Habis";
        warnaStok = 'red';
    }

    return (
        <View style={styles.bungkusSoal}>
            <Text>Soal 9 (Ketersediaan Stok):</Text>
            <Text>Sisa Stok : {stokBarang}</Text>
            <Text style={{ color: warnaStok }}>Status : {teksStok}</Text>
        </View>
    );
};

const Soal10Kondisi = () => {
    let usiaPenonton = 16;
    let teksFilm;
    
    if (usiaPenonton < 13) {
        teksFilm = "Kategori: Semua Umur (SU)";
    } else if (usiaPenonton >= 13 && usiaPenonton <= 17) {
        teksFilm = "Kategori: Remaja (R)";
    } else {
        teksFilm = "Kategori: Dewasa (D)";
    }

    return (
        <View style={styles.bungkusSoal}>
            <Text>Soal 10 (Rekomendasi Film):</Text>
            <Text>Usia Penonton : {usiaPenonton} tahun</Text>
            <Text>Status : {teksFilm}</Text>
        </View>
    );
};