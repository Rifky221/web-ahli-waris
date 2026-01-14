@extends('layouts.app')

@section('title', 'Informasi Waris')

@section('content')

    <!-- TITLE SECTION -->
    <section class="info-header">
        <h1>Informasi Waris</h1>
        <p>Kota Administrasi Jakarta Selatan</p>
    </section>

    <!-- BLOK 1 -->
    <section class="info-section">
        <h2>Hak Waris Duda Menurut Hukum Waris Islam</h2>

        <div class="info-row">
            <img src="{{ asset('images/warisduda.png') }}" class="info-img">

            <p>
                Bagaimana kedudukan duda dalam hukum Islam ketika seseorang pula kedudukan
                laki merasa? Menurut Pasal 171 huruf c KHI, waris adalah orang yang pada saat
                meninggal dunia memiliki hubungan darah dan hubungan perkawinan dengan pewaris,
                beragama Islam, serta tidak terhalang karena hukum untuk menjadi ahli waris.
                <br><br>
                Besarnya bagian harta warisan yang diterima ahli waris dapat berbeda-beda
                tergantung hubungan kekerabatan dan adanya penghalang waris. Duda menjadi ahli
                waris apabila istrinya meninggal dunia, dan ia memiliki hak yang ditentukan sesuai
                ketentuan hukum Islam.  <a href="https://www.hukumonline.com/klinik/a/hak-waris-duda-menurut-hukum-waris-islam-lt599f868e9712b/">sumber</a>
            </p>
           
        </div>
    </section>

    <!-- BLOK 2 -->
    <section class="info-section">
        <h2>Cara Menentukan Ahli Waris dalam Islam Jika Tak Ada Keturunan</h2>

        <div class="info-row">
            <img src="{{ asset('images/takpunyaketurunan.png') }}" class="info-img">

            <p>
                Seseorang yang wafat namun tidak memiliki keturunan, pembagian warisnya menjadi lebih
                spesifik. Yang mana ahli waris pengganti adalah orang yang memiliki hubungan garis
                keturunan, atau ahli waris lain yang ditetapkan syariat.
                <br><br>
                Menurut hemat kami, tanah pekarangan tersebut merupakan harta bawaan dari almarhumah.
                Hal ini mengacu pada ketentuan dalam Pasal 35 ayat (2) UU Perkawinan.
                <br><br>
                Kompilasi Hukum Islam (“KHI”) mengatur bahwa seseorang yang wafat tanpa meninggalkan
                anak, maka ahli waris lainnya seperti suami/istri, saudara kandung, serta orang tua 
                menjadi pewaris yang sah menurut hukum Islam. <a href="https://www.hukumonline.com/klinik/a/cara-menentukan-ahli-waris-dalam-islam-jika-tak-ada-keturunan-cl6574/">sumber</a>
            </p>
        </div>
    </section>

    <!-- BLOK 3 -->
    <section class="info-section">
        <h2>Orang-orang yang tak patut menjadi Ahli Waris</h2>

        <div class="info-row">
            <img src="{{ asset('images/tidakpatut.png') }}" class="info-img">

            <p>
                Pasal 173 ayat (1) Undang–Undang nomor 40 Tahun 2007 tentang Perkawinan Islam
                menyatakan bahwa seseorang dapat kehilangan hak warisnya apabila terbukti
                melakukan tindakan pidana terhadap pewaris.
                <br><br>
                Dalam konteks hukum Islam, seseorang yang membunuh pewaris, menganiaya, atau
                mencelakakan secara sengaja dapat terhalang mendapatkan warisan.
                <br><br>
                Dalam praktik waris menurut hukum di Indonesia, hal tersebut merupakan bagian dari
                asas “mencegah kemudharatan”. Artinya, seseorang yang terbukti melakukan tindakan 
                kriminal terhadap pewaris tidak dapat menjadi ahli waris.
                <a href="https://www.hukumonline.com/stories/article/lt690a80d6c6a58/batas-tanggung-jawab-ahli-waris-dalam-kepailitan-pewaris">sumber</a>
            </p>
        </div>
    </section>

@endsection
