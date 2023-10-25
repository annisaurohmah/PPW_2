@extends('auth.layout')

@section('menubar')
<div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#myworks" class="nav-item nav-link">My Works</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-reg btn-secondary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block {{ (request()->is('register')) ? 'active' : '' }}">Register</a>
                    <a href="{{ route('login') }}" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-1 d-none d-lg-block {{ (request()->is('register')) ? 'active' : '' }}">Login</a>
                @else    
                    <div class="nav-item text-white dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            </li>
                        </ul>
                    </div>                            
                    @endguest
                </div>
@endsection


@section('content')
            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5" >
                        <div class="row-g-5 text-center text-lg-center">
                            <h1 class="text-white title mb-1 animated slideInDown">Annisa Urohmah</h3>
                            <h3 class="text-white sub-title mb-4 animated slideInDown">as Software Engineering Student</h5>
                            <!-- <hr class="px-5 mx-5 mt-5"> -->
                            <p class="text-white desc pb-3 px-5 mx-lg-5 animated slideInDown">Welcome to my portfolio, where creativity takes center stage. Explore my diverse projects, and let's connect to turn your ideas into reality. Thank you for visiting.</p>
                            <a href="" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill animated slideInRight">Get in Touch</a>
                        </div>
                        <!-- <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                            <div class="owl-carousel screenshot-carousel">
                                <img class="img-fluid" src="img/screenshot-1.png" alt="">
                                <img class="img-fluid" src="img/screenshot-2.png" alt="">
                                <img class="img-fluid" src="img/screenshot-3.png" alt="">
                                <img class="img-fluid" src="img/screenshot-4.png" alt="">
                                <img class="img-fluid" src="img/screenshot-5.png" alt="">
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->   
        
        
        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-primary-gradient fw-medium">About</h5>
                        <h1 class="mb-4">Biography</h1>
                        <p class="mb-4">
                            I am currently pursuing my studies at Gadjah Mada University, specializing in software engineering technologies.
                            My primary focus lies in web development, 
                            so i contribute to both frontend and backend aspects of projects, ensuring a comprehensive understanding of software development.
                            Additionally, I also like to design UI, research UX, copywriting, teaching, and basic photography.
                                            </p>
                        <!-- <div class="row g-4 mb-4">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex">
                                    <i class="fa fa-cogs fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                                    <div class="ms-3">
                                        <h2 class="mb-0" data-toggle="counter-up">1234</h2>
                                        <p class="text-primary-gradient mb-0">Active Install</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="d-flex">
                                    <i class="fa fa-comments fa-2x text-secondary-gradient flex-shrink-0 mt-1"></i>
                                    <div class="ms-3">
                                        <h2 class="mb-0" data-toggle="counter-up">1234</h2>
                                        <p class="text-secondary-gradient mb-0">Clients Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <a href="" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">Read More</a>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow fadeInUp" data-wow-delay="0.5s" src="img/me7.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
        



       <!-- Process Start -->
       <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <!-- <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">How It Works</h5>
                    <h1 class="mb-5">3 Easy Steps</h1>
                </div> -->
                <div class="row gy-5 gx-4 justify-content-center">
                    <div class="row">
                        <div class="col-lg-12 col-sm-6  pt-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                                <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                    <i class="fas fa-user-graduate fa-3x text-white"></i>
                                </div>
                                <h5 class="mt-4 text-center mb-4">Education</h5>
                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Science Major, SMA Taruna Muhammadiyah Gunungpring</p>
                                    <p class="mb-0  heading mb-1"> 2019-2022</p>
                                    <p> During high school, I received a stewardship education that included discipline, responsibility, and time management. I also joined a school organization that honed my leadership and public speaking skills. </p>
                                </div>

                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Software Engineering Technology, Gadjah Mada University</p>
                                    <p class="mb-0  heading mb-1">2022-present</p>
                                    <p> During college I learned a lot about software design and development. I am interested in web development and UI UX design. On the non-academic side, I also joined intra and extra campus organizations. </p>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-12 col-sm-6 pt-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                <i class="fa fa-address-card fa-3x text-white"></i>
                            </div>
                            <h5 class="mt-4 text-center mb-4">Achievement</h5>
                            <div class="content mb-4">
                                <p class="mb-0  heading">1st place in Lomba Penulisan Ide Kreatif Mahasiswa Baru, 2022</p> 
                                <p>PCC SV UGM</p>                            </div>

                            <div class="content mb-4">
                                <p class="mb-0  heading ">3rd place in Musabaqah Fahmil Qur'an, 2023 </p> 
                                <p> MTQ UGM</p>
                            </div>

                            <div class="content mb-4">
                                <p class="mb-0  heading">3rd place in Karya Tulis Ilmiah, 2023</p> 
                                <p> POVVAF SV UGM</p>
                            </div>

                            <div class="content mb-4">
                                <p class="mb-0  heading">1st place in Karya Tulis Ilmiah, 2023</p> 
                                <p>TGES DTEDI SV UGM</p>
                            </div>

                            <div class="content mb-4">
                                <p class="mb-0  heading">1st place in Mathematics Olympicad, 2021</p> 
                                <p> Majelis Dikdasmen Muhammadiyah Jawa Tengah</p>
                            </div>

                            <div class="content mb-4">
                                <p class="mb-0  heading ">2nd runner-up in Mathematics Olympiad and Seminar, 2021</p> 
                                <p> Matematika UAD</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-sm-6  pt-4 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                                <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                    <i class="fa fa-check fa-3x text-white"></i>
                                </div>
                                <h5 class="mt-4 text-center mb-4">Training</h5>

                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Darul Arqam Dasar, 8-10 Februari 2023</p> 
                                    <p> Ikatan Mahasiswa Muhammadiyah UGM </p>
                                </div>

                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Memulai Pemrograman dengan Kotlin, 2 Mei - 3 Juli 2023</p> 
                                    <p> Dicoding Indonesia </p>
                                </div>

                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Training Kepemimpinan 3, Juni 2023</p> 
                                    <p> Jama'ah Vokasi Al 'Alim UGM </p>
                                </div>

                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Training Kepemimpinan 2, 2023</p> 
                                    <p> Jama'ah Vokasi Al 'Alim UGM </p>
                                </div>

                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Pelatihan First Aid Responder Penanganan dan Pencegahan Kekerasan Seksual, 18 November 2022</p> 
                                    <p> Tim Satuan Tugas PPKS UGM </p>
                                </div>

                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Training Kepemimpinan 1, 19 dan 29 November 2022</p> 
                                    <p>Jama'ah Vokasi Al 'Alim UGM </p>
                                </div>
                                <div class="content mb-4">
                                    <p class="mb-0  heading ">Kelas Tahsin Dasar, September-November 2022</p> 
                                    <p> KM INTRO DTEDI SV UGM </p>
                                </div>

                                
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-6  pt-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                                <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                    <i class="fa fa-cog fa-3x text-white"></i>
                                </div>
                                <h5 class="mt-4 text-center mb-4">Organization and Work Experience</h5>          
                                <div class="content mb-4">
                                    <p class="mb-0 heading">Jama'ah Vokasi Al-'Alim, 2022-2023</p>
                                    <p class="mb-0 heading">as Kepala Departemen Eksternal</p>  
                                    <p> Initiating a forum for Indonesian vocational campus da'wah institutions <br>
                                    Organizing comparative studies with vocational faculty da'wah institutions <br>
                                    Coordinating external and internal parties of the organization </p>
                                </div>
                            
                                <div class="content mb-4">
                                    <p class="mb-0 heading">Jama'ah Vokasi Al-'Alim, 2022</p>
                                    <p class="mb-0 heading">as Anggota Departemen Eksternal</p>  
                                    <p> Organization contact person <br>    
                                        Participated in Leadership Training <br>
                                        Coordinating donations for victims of natural disasters </p>
                                </div>

                                <div class="content mb-4">
                                    <p class="mb-0 heading">Ikatan Mahasiswa Muhammadiyah, 2022 - present</p>
                                    <p class="mb-0 heading">as Anggota Bidang Riset dan Kajian Keilmuan</p>  
                                    <p> Organizing scientific discussions on waste management <br>    
                                        Creating educational content on Instagram <br> </p>
                                </div>

                                
                                <div class="content mb-4">
                                    <p class="mb-0 heading">Pimpinan Ranting SMA Taruna Muhammadiyah Gunungpring, 2021-2022</p>
                                    <p class="mb-0 heading">as Sekretaris Umum</p>  
                                    <p> Supervising and coordinating five field secretaries <br>    
                                    Coordinating and planning work programs <br>
                                    Manage the organization's correspondence and administration <br>
                                    Collecting data on the organization's inventory </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Process Start -->

        <!-- Features Start -->
        <div class="container-xxl py-5" id="myworks">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">My Works</h5>
                    <h1 class="mb-5">Portofolio</h1>
                    @guest
                    <p class="text-center mb-4">Login to see my portofolios</p>
                    @else
                    @endguest
                </div>
                <div class="row g-4 justify-content-center">
                

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ route('dashboard') }}#web">    
                        <div  class="feature-item bg-light rounded p-4">
                                <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                    <i class="fa fa-eye text-white fs-4"></i>
                                </div>
                                <h5 class="mb-3">Web Development</h5>
                                <p class="m-0">I contribute both front-end and back-end developer. There are some individuals project and team projects</p>
                            </div>
                    </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ route('dashboard') }}#uiux"> 
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-layer-group text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">UI/UX Design</h5>
                            <p class="m-0">This is my works as UI/UX Designer. Not only about design but also research for software design flow</p>
                        </div>
                    </div> </a>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="{{ route('dashboard') }}#photo"> 
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-edit text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Photography</h5>
                            <p class="m-0">Take a photo is my favourite works. It like make my world in a frame. My photo is my world through my camera</p>
                        </div></a>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('dashboard') }}#writing">     
                    <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-shield-alt text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Writing</h5>
                            <p class="m-0">I love to journaling in the writing. Either software engineering or self-development writing, i write it  </p>
                        </div></a>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="{{ route('dashboard') }}#research"> 
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-cloud text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Research</h5>
                            <p class="m-0">These are some briefs of my research. My research based on my ICT Scientific Paper competition</p>
                        </div></a>
                    
                    </div>
                    <!--<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-mobile-alt text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Fully Responsive</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- Features End -->
        
       <!-- Contact Start -->
       <div class="container-xxl py-5" id="contact">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Contact Us</h5>
                    <h1 class="mb-5">Get In Touch!</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary-gradient rounded-pill py-3 px-5" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        
        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <h4 class="text-white mb-4">Address</h4>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Depok, Sleman, Yogyakarta</p>
                        <p><i class="fa fa-envelope me-3"></i>annisaurohmah@mail.ugm.ac.id</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Quick Link</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Career</a>
                    </div> -->
                    <!-- <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Popular Link</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Career</a>
                    </div> -->
                    <!-- <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary-gradient fs-4"></i></button>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Annisa Urohmah</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        @endsection
