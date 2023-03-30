<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\s;

class EncryptionController extends Controller
{
    public function index()
    {
        return view('rsa.index');
    }

    public function Keys(Request $request)
    {
        // Ambil nilai p dan q dari input form
        $p = $request->input('p');
        $q = $request->input('q');

        // Generate kunci
        $keys = $this->generateKeys($p, $q);

        // Tampilkan hasil kunci pada view
        return view('rsa', [
            'public_key' => implode(",", $keys['public']),
            'private_key' => implode(",", $keys['private']),
        ]);
    }


    public function encrypt(Request $request)
    {
        // Ambil plaintext dari input form
        $plaintext = $request->input('plaintext');

        // Simpan plaintext ke database
        DB::table('plaintexts')->insert([
            'plaintext' => $plaintext
        ]);

        // Ambil public key dari input form
        $public_key = explode(',', $request->input('public_key'));

        // Enkripsi plaintext
        $ciphertext = $this->rsaEncrypt($plaintext, $public_key);

        // Tampilkan hasil enkripsi
        return view('encrypt', [
            'plaintext' => $plaintext,
            'ciphertext' => $ciphertext,
        ]);
    }

    public function decrypt(Request $request)
    {
        // Ambil ciphertext dari input form
        $ciphertext = $request->input('ciphertext');

        // Ambil private key dari input form
        $private_key = explode(',', $request->input('private_key'));

        // Dekripsi ciphertext
        $plaintext = $this->rsaDecrypt($ciphertext, $private_key);

        // Tampilkan hasil dekripsi
        return view('decrypt', [
            'ciphertext' => $ciphertext,
            'plaintext' => $plaintext,
        ]);
    }
    //Mendefinisikan fungsi publik gcd untuk menghitung FPB (Faktor Persekutuan Terbesar) dari dua bilangan $a dan $b.
    //a dan b adalah bilangan yang akan dihitung FPB-nya.
    public function gcd($a, $b)
    {
        //Jika $a sama dengan 0, maka kembalikan nilai $b. Jika tidak, panggil fungsi gcd dengan argumen ($b % $a, $a).
        if ($a == 0)
            return $b;
        return $this->gcd($b % $a, $a);
    }

    //Mendefinisikan fungsi publik modInverse untuk menghitung invers modulo dari bilangan $a modulo $m.
    public function modInverse($a, $m)
    {
        //Lakukan perulangan dari 1 hingga $m - 1, jika ditemukan nilai $x yang memenuhi ($a * $x) % $m == 1, kembalikan nilai $x tersebut.
        //m merepresentasikan teks yang akan dienkripsi atau didekripsi dalam algoritma kriptografi RSA.
        for ($x = 1; $x < $m; $x++)
            if (($a * $x) % $m == 1)
                return $x;
        return 1;
    }

    //untuk menghasilkan pasangan kunci publik dan privat RSA berdasarkan dua bilangan prima $p dan $q.
    public function generateKeys($p, $q)
    {
        //Nilai n digunakan sebagai modulo dalam operasi enkripsi dan dekripsi.
        $n = $p * $q;
        $phi = ($p - 1) * ($q - 1);

        //Cari nilai $e$ yang memenuhi FPB($e, \phi) = 1.
        //e eksponen enkripsi dalam algoritma kriptografi RSA. 
        //Eksponen enkripsi digunakan untuk mengenkripsi teks dengan kunci publik. Nilai e biasanya dipilih sedemikian rupa sehingga memiliki faktor persekutuan terbesar (FPB) 1 dengan nilai phi (FPB(e, phi) = 1).
        for ($e = 2; $e < $phi; $e++)
        //phi (Φ) adalah fungsi Euler totient, yang menghitung jumlah bilangan bulat yang lebih kecil dari suatu bilangan dan koprima (relatif prima) dengan bilangan tersebut.
            if ($this->gcd($e, $phi) == 1)
                break;
        //Menghitung nilai $d$ sebagai invers dari $e$ modulo $\phi$.
        $d = $this->modInverse($e, $phi);

        return [
            //d eksponen dekripsi dalam algoritma kriptografi RSA. 
            //Eksponen dekripsi digunakan untuk mendekripsi teks yang telah dienkripsi dengan kunci publik. Nilai d dihitung sebagai invers dari e modulo phi (d ≡ e^(-1) mod phi).
            'public' => [$e, $n],
            'private' => [$d, $n]
        ];
    }

    //blok 2 dimulai dari str_split
    public function rsaEncrypt($plaintext, $public_key)
    {
        list($e, $n) = $public_key;
        $ciphertext = [];

        //plaintext dipecah menjadi blok-blok karakter
        foreach (str_split($plaintext) as $char) {
            //Mengubah karakter menjadi kode ASCII.
            $m = ord($char);
            //Mengenkripsi karakter dengan rumus RSA $c = m^e \pmod{n}$.
            $ciphertext[] = bcpowmod($m, $e, $n);
        }

        return $ciphertext;
    }

    public function rsaDecrypt($ciphertext, $private_key)
    {
        list($d, $n) = $private_key;
        $plaintext = '';
        //ciphertext dipecah menjadi blok-blok yang dipisahkan oleh tanda koma
        $ciphertext_array = explode(",", $ciphertext);

        foreach ($ciphertext_array as $cipher) {
            //Mendekripsi elemen teks terenkripsi dengan rumus RSA $m = c^d \pmod{n}$.
            $m = bcpowmod($cipher, $d, $n);
            //Mengubah kode ASCII kembali menjadi karakter dan menyambungkannya ke teks yang telah didekripsi.
            $plaintext .= chr($m);
        }

        return $plaintext;
    }
}
