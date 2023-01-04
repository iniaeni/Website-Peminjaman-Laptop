@extends('layout')

@section('content')

  <!-- ======= Header ======= -->
  
      <!-- .navbar -->

  

      <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Peminjaman Laptop</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Sign Up</h2><br>
          
          <form data-aos="fade-up" data-aos-delay="400"  action="{{route('register.createAccount')}}" method="POST">
              @csrf
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
              @endif
            <div class="row mb-3">
              <div class="col-9 ">
              <input name="email" class="form-control" placeholder="Masukan Email" type="text" ><br>
            </div>
            <div class="col-9 ">
              <input name="username" class="form-control" placeholder="Masukan Username" type="text" ><br>
            </div>
            <div class="col-9">
                <input name="password" class="form-control" placeholder="Masukan Password" type="password" > 
            </div>
          
          
    
          <!-- <h2 data-aos="fade-up" data-aos-delay="400">Lab. Pengembangan Perangkat Lunak dan Gim</h2> -->
    </div>
          <!-- <div class="nav">
      <ul class="links">
        <li class="signin-active"><a class="btn">Sign in</a></li>
        <li class="signup-inactive"><a class="btn">Sign up </a></li>
      </ul>
    </div> -->
  
          <div data-aos="fade-up" data-aos-delay="600">
          
            <div class="text-center text-lg-start">
              <button type="submit" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                Sign Up
                <i class="bi bi-arrow-right"></i>
    </button><br><br>
        </form>
        <div>
            <h6>Sudah Punya Akun?<a href="{{ route('login') }}"> Sign In</a> </h6>
            </div>
            </div><br>
            
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  


  
  <script>
        function tampil(){
            var element = document.body;
            
            element.classList.toggle("dark-mode");
        }
    </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

