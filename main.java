class Mobil {
    String merk;
    String warna;

    // Konstruktor parametrik (menerima parameter)
    public Mobil(String merk, String warna) {
        this.merk = merk;
        this.warna = warna;
    }
}

public class Main {
    public static void main(String[] args) {
        Mobil mobil1 = new Mobil("Toyota", "Merah"); // Konstruktor parametrik dipanggil
        System.out.println("Merk: " + mobil1.merk + ", Warna: " + mobil1.warna);
    }
}
