@extends('layouts.app')

@section('title')
    About
@endsection

@section('content')
<div class="page-content-about" id="zoom-default" style="min-height:40.5vh;"> 
        {{-- <div class="d-flex justify-content-around container-fluid"  data-aos-delay="100">
            <img src="/images/logotaxcenter.png" class="img-fluid" alt="Loading...">
            <img src="/images/Logo-DJP.png" class="img-fluid" alt="Loading...">
        </div> --}}
        <div class="container">
            <h4 class="Header-About" data-aos="fade-right" data-aos-delay="100">Latar Belakang Belilo</h4>
            
            <h5 class="content-about" data-aos="fade-right" data-aos-delay="200">
                Di Indonesia Usaha Mikro, kecil, dan Menengah (UMKM) memiliki kontribusi maupun peranan yang cukup besar
               
            </h5>
            <h5 class="content-about" data-aos="fade-right" data-aos-delay="300">
                UMKM kurang memiliki ketahanan dan fleksibilitas dalam menghadapi Pandemi COVID-19 dikarenakan beberapa hal seperti tingkat digitalisasi yang masih rendah, kesulitan dalam mengakses teknologi dan kurangnya pemahaman tentang strategi bertahan dalam bisnis (OECD, 2020).
                UMKM karena biaya yang terbilang murah dan mudah untuk mengaplikasikannya.
            </h5>
            <h5 class="content-about" data-aos="fade-right" data-aos-delay="400"> 
                e-marketing sangatlah berpengaruh pada pemasaran secara tradisional UMKM yang ingin mempertahankan 
                serta mengembangkan usahanya di tengah persaingan ekonomi dan di masa Pandemi COVID-19 dengan 
                memaksimalkan penggunaan teknologi dalam bisnis usahanya. Melalui urgensi kebutuhan UMKM 
                akan fasilitas pemasaran digital dan konsultasi keuangan, serta ketersediaan SDM di 
                Universitas Gunadarma yang dapat memenuhi kebutuhan tersebut, terbentuklah 
                kegiatan pengabdian masyarakat untuk pelayanan  pendampingan kebutuhan 
                UMKM di wilayah Kota Depok pada bulan April 2021 hingga Juli 2021.
            </h5>
        </div>
        <div class="d-flex justify-content-center" data-aos="fade-right" data-aos-delay="400">
        <a href="https://taxcenter.gunadarma.ac.id"><button type="button" class="btn rounded-pill shadow-lg">Jelajahi Selengkapnya</button></a>
        </div>
    </div>
@endsection