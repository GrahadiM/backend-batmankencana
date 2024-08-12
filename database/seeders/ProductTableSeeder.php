<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::create([
        //     'category_id'   => 4,
        //     'name'          => Str::upper('Statistika Deskriptif: untuk Ekonomi dan Bisnis'),
        //     'thumbnail'     => 'mtk1.png',
        //     'price'         => 142650,
        //     'body'          => 'Buku ini disusun sebagai pendamping bagi mahasiswa yang sedang menempuh mata kuliah Statistika. Buku ini membahas ilmu statistika yang diterapkan dalam dunia bisnis dan ekonomi dan dilengkapi dengan contoh kasus dan penyelesaiannya.
        //                         <br>Keunggulan buku ini adalah adanya bab khusus yang membahas cara menggunakan Microsoft Excel sehingga mahasiswa dapat menghitung nilai statistik dengan cepat dan tepat. Selain itu, buku ini juga dilengkapi dengan kumpulan data yang digunakan pada contoh sehingga mahasiswa dapat langsung praktik menggunakan Microsoft Excel.
        //                         <br>Secara lengkap, buku ini memuat 1 1 bab, yaitu:
        //                         <br>Bab 1. Pendahuluan, bab 2. Distribusi Frekuensi, bab 3. Ukuran Nilai Sentral, bab 4. Ukuran Letak, bab 5. Ukuran Penyebaran, bab 6. Ukuran Kecondongan dan Keruncingan, bab 7. Angka Indeks bab, 8. Deret Berkala, bab 9. Regresi dan Korelasi bab 10. Analisis Regresi Ganda dan Korelasi Ganda, dan bab 11. Menggunakan Microsoft Excel.
        //                         <br>
        //                         <br>Tentang Penulis
        //                         <br>Noegroho Boedijoewono lahir di Bogor 14 Desember 1939. Tamat dari Fakultas Ekonomi Agraria (sekarang Ilmu Ekonomi Studi Pembangunan) tahun 1964. Tahun 1961-1964 menjadi asisten statistik pada Fakultas Ekonomi UGM. Pada tahun 1964-1970 bekerja di departemen pertahanan dan keamanan bidang analisa ekonomi diperbantukan di KOTI G5, KOTOE G5, dan MPRS di Jakarta. Tahun 1971-2004 mengajar di Fakultas Ekonomi UGM dan beberapa Perguruan Tinggi Swasta di Yogyakarta. Tahun 1977-1987 menjadi anggota DPRD-DIY, menjabat sekretaris Fraksi Karya Pembangunan, Ketua Komisi B (Keuangan dan Panitia Anggaran). Pada saat ini beliau menjabat sebagai anggota Pembina Yayasan Keluarga Pahlawan Negara (YKPN) Yogyakarta dan Badan Pembina Harian (BPH) pada Sekolah Tinggi Ilmu Manajemen YKPN.
        //                         <br>
        //                         <br>Tri Utomo Prasetyo lahir di Jakarta 18 Maret 1993. Tamat dari program studi Ekonomi Pembangunan Universitas Brawijaya pada tahun 2015 dan Magister Ekonomika Pembangunan dari Universitas Gadjah Mada pada tahun 2019. Saat ini bekerja sebagai dosen tetap di Sekolah Tinggi Ilmu Manajemen YKPN Yogyakarta dan mengampu mata kuliah Statistika Deskriptif dan Induktif, Ekonomi Mikro dan Makro, Komputer Bisnis, serta Pasar Modal. Selain mengajar, aktif sebagai praktisi di bidang pasar modal dan keuangan dengan izin sebagai Wakil Perantara Pedagang Efek dari Otoritas Jasa Keuangan dan Certified Financial Planner® dari Financial Planning Standards Board. Sejak tahun 2022 hingga sekarang, melaksanakan tugas sebagai Kepala Bagian Penjaminan Mutu Internal STIM YKPN.
        //                         <br>
        //                         Tahun Terbit : Cetakan Pertama, Oktober 2023',
        //     'favorite'      => 'false',
        // ]);

        // Product::create([
        //     'category_id'   => 4,
        //     'name'          => Str::upper('Kalkulus Untuk Perguruan Tinggi'),
        //     'thumbnail'     => 'mtk2.png',
        //     'price'         => 110000,
        //     'body'          => 'Buku Kalkulus untuk Perguruan Tinggi ini merupakan buku yang disajikan dalam bentuk yang sangat sederhana. Buku ini ditujukan untuk semua mahasiswa Indonesia yang duduk di Perguruan Tinggi, baik swasta maupun negeri. Materi kalkulus untuk mahasiswa yang kuliah di jurusan IPA (ilmu eksak) pasti senantiasa dijumpai. Dan mata kuliah ini merupakan mata kuliah yang banyak ditakuti oleh mahasiswa dikarenakan dalam mempelajarinya sangat sulit sekali. Kenapa mahasiswa sangat kewalahan dalam belajar kalkulus walaupun mereka sudah belajar ekstra? Jawaban dari pertanyaan ini adalah karena buku-buku referensi yang mereka gunakan untuk belajar belum sesuai dengan yang mereka harapkan. Jika dilihat sekarang ini, buku-buku kalkulus yang ada menyajikan materi dan teori memang sudah sangat lengkap, akan tetapi contoh soal yang bervariasi dan pembahasan yang diberikan tidak terlalu banyak. Hal inilah salah satu yang membuat mahasiswa menjadi tetap bingung dalam belajar kalkulus.
        //                         <br>
        //                         <br>Dikarenakan hal tersebutlah, maka buku ini diterbitkan, yaitu untuk mengatasi dan memenuhi kebutuhan mahasiswa dalam belajar kalkulus. Dalam buku ini, diberikan teori yang sangat mudah yang mendukung dalam pembahasan soal. Kemudian diberikan contoh soal yang sangat banyak yang disertai dengan pembahasan yang sangat detail untuk setiap langkah penyelesaiannya.
        //                         <br>
        //                         <br>Buku ini terdiri dari 9 bab, yang kesemuanya membahas tentang turunan (differensial) dan integral. Bab 1 sampai Bab 5 berisi materi differensial dan Bab 6 sampai Bab 9 berisi materi integral. Sedangkan di bagian akhir dari buku ini diberikan soal-soal latihan untuk memantapkan dalam penguasaan materi yang diberikan di setiap bab.',
        //     'favorite'      => 'false',
        // ]);

        // Product::create([
        //     'category_id'   => 5,
        //     'name'          => Str::upper('About Us'),
        //     'thumbnail'     => 'bhs1.png',
        //     'price'         => 59000,
        //     'body'          => 'About Us merupakan salah satu fiksi sastra jenis novel karangan Adi K. Novel ini bertemakan percintaaan antara dua insan yang ada di bumi. Adi Kusrianto adalah penulis senior yang telah menghasilkan banyak tulisan yang diterbitkan Elex Media Komputindo, Andi Publishing dan beberapa penerbit berskala nasional lain.
        //                         <br>Lahir di Kediri tahun 1952 dan saat ini tinggal di Surabaya. Pendidikan formalnya ditempuh di Akademi Tekstil Surabaya dan Jurusan Ekonomi Pembangunan pada Fakultas Ekonomi Universitas Terbuka. Pendidikan non formalnya membuahkan 32 buah sertifikat dari berbagai macam ketrampilan dan pengetahuan.
        //                         <br>Memiliki pengalaman yang sangat beragam mulai bidang entertainment pada saat ia masih kuliah, 26 tahun dibidang industri tekstil (antara periode 1976-2003), 18 tahun dibidang industri kreatif disektor penulisan dan public speaking (dari 1994 hingga kini). Berkesempatan menjadi salah seorang trainer pada TOT tentang Penulisan Buku Ajar untuk diterbitkan (2006-2008). Trainer dan pembicara seminar di beberapa Perguruan Tinggi.
        //                         <br>Selain sebagai penulis, sejak 2010 hingga kini menjadi Entrepreneur in Resident di Universitas Ciputra, Surabaya mengampu mata kuliah Internasional Entrepreneurship (di Fakultas Entrepreneur dan Humaniora) dan Psychology Innovation Project (di fakultas Psikologi). Mengelola Adi Kusrianto Literary Agent sebuah industri jasa untuk membantu beberapa penulis sebagian besar para dosen untuk menyelesaikan tulisannya sehingga bisa diterbitkan di penerbit-penerbit berskala nasional.
        //                         <br>Sinopsis:
        //                         <br>Luka-lukaku mungkin tak akan sembuh jika aku mencoba merawatnya sendiri. Rasa sakitku mungkin tak akan hilang jika aku selalu menyimpannya sendiri. Aku membutuhkanmu, begitu juga sebaliknya, kau membutuhkanku, untuk bersama-sama menyembuhkan luka-luka kita. Berisikan kalimat-kalimat indah untuk menginspirasi pasangan yang sedang dimabuk cinta. Tidak semua hubungan melulu berisikan cinta, kadang ada benci dan kepedihan di dalamnya. Sebuah hubungan yang baik juga bukan hubungan yang tidak memiliki masalah.',
        //     'favorite'      => 'false',
        // ]);

        // Product::create([
        //     'category_id'   => 5,
        //     'name'          => Str::upper('Kumpulan Puisi Memo Kemanusiaan'),
        //     'thumbnail'     => 'bhs2.png',
        //     'price'         => 79000,
        //     'body'          => 'Puisi menjadi bagian dari hidup saya. Puisi adalah ungkapan dari pikiran, perasaan, dan imajinasi seseorang. Puisi, bagi saya, bukan hanya sebuah karya sastra dari ungkapan dan perasaan saya, tapi lebih dari itu, sudah “mendarah daging". Bicara puisi sama halnya bicara tentang hidup saya karena sepanjang hidup saya yang sekarang sudah setengah abad lebih selalu dipenuhi puisi.
        //                         <br>
        //                         <br>Bahkan, puisi, bagi saya, tak hanya karya ekspresi semata-mata, tapi juga dapat menyampaikan pesan kemanusiaan. Sebagaimana judul yang disandang buku puisi, yakni Memo Kemanusiaan.
        //                         <br>
        //                         <br>Jejak proses kreatif saya dalam menulis puisi bisa dikatakan mewarnai masa-masa indah di sekolah. Masa-masa “kawah candradimuka”, pengemblengan dan pencarian jati diri. Sungguh saya bersyukur bisa menyalurkan bakat dan kemampuan dengan puisi.
        //                         <br>
        //                         <br>Saya mulai menulis puisi sejak duduk di kelas 4 sekolah SD Negeri 03 desa Jatibogor, Suradadi, Tegal. Puisi-puisi awal ini saya kumpulkan dalam buku stensilan berjudul Nyanyian Sebelum Matahari Terpejam yang diketik dengan mesin ketik manual dan kemudian dijilid. Tempat penjilidannya di Percetakan Kejambon Kota Tegal yang letaknya cukup jauh dari desa saya, desa Jatibogor. Waktu itu, tempat untuk jilid tidak seperti sekarang ini yang bisa dilakukan di tempat-tempat fotokopi yang begitu banyak sekali, seperti jamur yang tumbuh subur di musim hujan.
        //                         <br>
        //                         <br>Sinopsis
        //                         <br>
        //                         <br>101 puisi dalam buku ini bisa berubah makna menjadi seribu persepsi, bahkan jutaan persepsi yang berbeda-beda. Berbeda adalah anugerah yang tentu patut kita apresiasi, karena dengan demikian menjadikan "kekayaan”.
        //                         <br>
        //                         <br>Puisi-puisi dalam buku Memo Kemanusiaan ini menyiratkan sikap universal kita untuk memperlakukan manusia sesuai dengan hakikat manusia yang bersifat manusiawi. Puisi-puisi yang terkandung nilai-nilai kemanusiaan (human values) terdiri dari kebenaran, kebajikan, kedamaian, kasih sayang dan tanpa kekerasan, yang merupakan nilai-nilai yang sangat relevan dari zaman dulu sampai sekarang.
        //                         <br>
        //                         <br>Tentang Penulis
        //                         <br>
        //                         <br>Akhmad Sekhu lahir pada 27 Mei 1971 di desa Jatibogor, Kec. Suradadi, Kab. Tegal, Jawa Tengah. Setelah menikah tinggal bersama anak-istri di Dukuh Karangjati, Desa Munjung Agung, Kec. Kramat, Kab. Tegal, Jawa Tengah.
        //                         <br>
        //                         <br>Besar di "Kota Budaya” Yogyakarta, kini hijrah ke “Kota Gelisah” Jakarta, bekerja sebagai wartawan.
        //                         <br>
        //                         <br>Menempuh pendidikan formal di SD Negeri Jatibogor 03 Jatibogor, Suradadi, Tegal, SMP Negeri 2 Kramat-Tegal, SMA Pancasakti Kodia Tegal, LPK Prisma Asri Yogyakarta, Universitas Widya Mataram Yogyakarta.
        //                         <br>
        //                         <br>Judul: Kumpulan Puisi Memo Kemanusiaan
        //                         <br>Penulis: Akhmad Sekhu
        //                         <br>Penerbit: Balai Pustaka
        //                         <br>Tahun Terbit: Cetakan 1, Nov 2022',
        //     'favorite'      => 'false',
        // ]);

        // Product::create([
        //     'category_id'   => 8,
        //     'name'          => Str::upper('Koleksi Terlengkap Tembang Kenangan Dunia Paling Populer'),
        //     'thumbnail'     => 'song1.png',
        //     'price'         => 77500,
        //     'body'          => 'Koleksi Terlengkap Tembang Kenangan Dunia Paling Populer.',
        //     'favorite'      => 'false',
        // ]);

        // Product::create([
        //     'category_id'   => 8,
        //     'name'          => Str::upper('Piano Songs 8 For Beginners'),
        //     'thumbnail'     => 'song2.png',
        //     'price'         => 75000,
        //     'body'          => 'Mempelajari cara bermain piano bukanlah hal yang mengasyikkan. Untuk itu, Anda harus tahu cara belajar piano untuk pemula terlebih dahulu, agar Anda dapat memahami dasar-dasarnya. Anda harus mempelajari not-not musik, mengenal tuts-tuts piano, dan tentu melemaskan jari-jari tangan agar lentur dalam bermain piano. Namun bukanlah hal yang mustahil untuk bisa memainkan piano secara otodidak. Mudah untuk dimainkan for beginners disertai not balok, dan not angka chord.',
        //     'favorite'      => 'false',
        // ]);

        // Product::create([
        //     'category_id'   => 9,
        //     'name'          => Str::upper('Jujutsu Kaisen Vol.01'),
        //     'thumbnail'     => 'komik1.png',
        //     'price'         => 45000,
        //     'body'          => 'Cerita dalam komik ini mengandung materi yang diperuntukkan untuk pembaca 13 tahun keatas. Tidak dianjurkan untuk dibaca anak-anak di bawah umur 13 tahun.
        //                         <br>
        //                         <br>Jujutsu Kaisen adalah sebuah seri manga shōnen asal Jepang yang ditulis dan diilustrasikan oleh Gege Akutami. Manga ini dimuat berseri dalam majalah Weekly Shōnen Jump terbitan Shueisha sejak Maret 2018, dan telah diterbitkan menjadi dua puluh volume tankōbon per Agustus 2022.
        //                         <br>
        //                         <br>Yūji Itadori adalah seorang siswa SMA dengan atletisitas yang tidak wajar yang tinggal di Sendai bersama kakeknya. Ia sering menghindari Klub Lari karena keengganannya pada bidang atletik, meskipun dia memiliki bakat bawaan untuk olahraga tersebut. Sebaliknya, dia memilih untuk bergabung dengan Klub Penelitian Ilmu Gaib, agar dirinya dapat bersantai dan bergaul dengan para seniornya. Setiap hari, Yūji meninggalkan sekolah pada pukul 17.00 untuk mengunjungi kakeknya di rumah sakit. Ketika dia mengunjunginya, kakeknya memberikan dua pesan kuat kepada Yūji, yaitu "selalu membantu orang" dan "mati dikelilingi orang". Setelah kematian kakeknya, Yūji menafsirkan pesan-pesan tersebut sebagai satu pernyataan—bahwa setiap orang berhak mendapatkan "kematian yang layak".',
        //     'favorite'      => 'false',
        // ]);

        // Product::create([
        //     'category_id'   => 9,
        //     'name'          => Str::upper('One Piece 09 (2023)'),
        //     'thumbnail'     => 'komik2.png',
        //     'price'         => 45000,
        //     'body'          => 'Arlong Park, kota yang dikuasai oleh manusia ikan. Dalam perjalanannya mencari Nami, Luffy dan teman-temannya tiba di kota itu. Di sana mereka menghadapi satu kenyataan yang mengejutkan. Apakah pikiran Nami yang terus bertempur sendirian sampai pada teman-temannya?
        //                         <br>
        //                         <br>Di antara jenis buku lainnya, komik memang disukai oleh semua kalangan mulai dari anak kecil hingga orang dewasa. Alasan komik lebih disukai oleh banyak orang karena disajikan dengan penuh dengan gambar dan cerita yang mengasyikan sehingga mampu menghilangkan rasa bosan di kala waktu senggang.
        //                         <br>
        //                         <br>Komik seringkali dijadikan sebagai koleksi dan diburu oleh penggemarnya karena serinya yang cukup terkenal dan kepopulerannya terus berlanjut sampai saat ini. Dalam memilih jenis komik, ada baiknya perhatikan terlebih dahulu ringkasan cerita komik di sampul bagian belakang sehingga sesuai dengan preferensi pribadi pembaca.',
        //     'favorite'      => 'false',
        // ]);

        // Product::create([
        //     'category_id'   => 6,
        //     'name'          => Str::upper('ALBUM NCT GLITCH MODE PHOTOBOOK VER'),
        //     'thumbnail'     => 'album.png',
        //     'price'         => 313500,
        //     'body'          => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
        //     'favorite'      => 'false',
        // ]);
    }
}
