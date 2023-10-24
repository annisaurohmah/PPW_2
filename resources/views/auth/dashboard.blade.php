@extends('auth.layout')
<link rel="stylesheet" href="assets/css/flaticon.css">


@section('menubar')
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav mx-auto py-0 ">
        <a href="#home" class="nav-item nav-link">Portofolio</a>
        <a href="{{ route('landing') }}" class="nav-item nav-link">Back to home</a>
    </div> 
        <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
</div>
@endsection

@section('content')
            <div class="container-xxl bg-white hero-header">
                <div class="container px-lg-5" >
                        <div class="row-g-5 text-center text-lg-center">
                            <h1 class="text-white mb-1 animated slideInDown">Portofolio</h3>
                            <h3 class="text-white sub-title mb-4 animated slideInDown">See Annisa Urohmah's works</h5>
                            <!-- <hr class="px-5 mx-5 mt-5"> -->
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
        
        
        <!-- Features Start -->
        <div class="container-xxl py-5" id="myworks">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">My Works</h5>
                    <h1 class="mb-5">Portofolio</h1>
                </div>
                <div class="row g-4 justify-content-center">
                

                    <a href="#web" class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-eye text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Web Development</h5>
                        </div>
                    </a>
                    <a href="#uiux" class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-layer-group text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">UI/UX Design</h5>
                        </div>
                    </a>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-edit text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Photography</h5>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-shield-alt text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Writing</h5>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fa fa-cloud text-white fs-4"></i>
                            </div>
                            <h5 class="mb-3">Research</h5>
                        </div>
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
       <div class="container-xxl py-5" id="web">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">#1</h5>
                    <h1 class="mb-5">Web Development</h1>
                </div>
                <div class="row justify-content-center gap-3">
                    <div class="card px-0" style="width: 18rem;">
                        <img src="img/berita.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Redesign DetikNews</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="https://ppw-bootstrap.vercel.app/" class="btn btn-primary-gradient">See website</a>
                        </div>
                    </div>
                    <div class="card px-0" style="width: 18rem;">
                        <img src="img/berita1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Simple Landing Page</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="https://ppw-figma.vercel.app/#slide1" class="btn btn-primary-gradient">See website</a>
                        </div>
                    </div>
                    <div class="card px-0" style="width: 18rem;">
                        <img src="img/berita2.png" width="100%" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Responsive Web</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="https://praktikum-pemrograman-web-1-tugas-1.vercel.app/#" class="btn btn-primary-gradient">See website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5" id="uiux">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">#2</h5>
                    <h1 class="mb-5">UI/UX Design</h1>
                </div>
                
                <div class="row gy-5 gx-4 justify-content-center">
                            <div class="col-lg-4 col-sm-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <img src="img/ticket.png" class="img-fluid" alt="daun">
                            </div>
                            <div class="col-lg-4  col-sm-6 text-center wow fadeInUp">
                                <img src="img/wireframe.png" class="img-fluid" alt="matahari">
                            </div>
                            <div class="col-lg-4  col-sm-6 text-center wow fadeInUp">
                                <img src="img/1.png" class="img-fluid" alt="matahari">
                            </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5" id="photo">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">#3</h5>
                    <h1 class="mb-5">Photography</h1>
                </div>
                <div class="row gy-5 gx-4 justify-content-center">
                            <div class="col-lg-4 col-sm-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <img src="img/daun.jpg" class="img-fluid" alt="daun">
                            </div>
                            <div class="col-lg-4  col-sm-6 text-center wow fadeInUp">
                                <img src="img/matahari.jpg" class="img-fluid" alt="matahari">
                            </div>
                            <div class="col-lg-4  col-sm-6 text-center wow fadeInUp">
                                <img src="img/bunga.jpg" class="img-fluid" alt="bunga">
                            </div>
                            <div class="col-lg-4  col-sm-6 text-center wow fadeInUp">
                                <img src="img/jalan.jpg" class="img-fluid" alt="jalan">
                            </div>
                            <div class="col-lg-4  col-sm-6 text-center wow fadeInUp">
                                <img src="img/jembatan.jpg" class="img-fluid" alt="jemabatan">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5" id="writing">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">#4</h5>
                    <h1 class="mb-5">Writing</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="single-profile bg-primary-gradient">
									<div class="profile-txt text-white">
										<a href="https://medium.com/@annisaurohmah"><i class="flaticon-medium "></i></a>
										<div class="profile-icon-name">See on Medium</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href="https://medium.com/@annisaurohmah">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g id="boxes" style="display:none;"> </g> <g id="icons"> <path d="M28,28v456h456V28H28z M406.83,136.04l-24.46,23.45c-2.11,1.61-3.15,4.25-2.72,6.86v172.28c-0.44,2.61,0.61,5.26,2.72,6.86 l23.88,23.45v5.15H286.13v-5.15l24.74-24.02c2.43-2.43,2.43-3.15,2.43-6.86V198.81l-68.79,174.71h-9.3l-80.09-174.71v117.1 c-0.67,4.92,0.97,9.88,4.43,13.44l32.18,39.03v5.15h-91.24v-5.15l32.18-39.03c3.44-3.57,4.98-8.56,4.15-13.44V180.5 c0.38-3.76-1.05-7.48-3.86-10.01l-28.6-34.46v-5.15h88.81l68.65,150.55l60.35-150.55h84.66V136.04z"/> </g> </svg> </a>
											<p class="heading"> Medium</p>
										</div>
									</div>
								</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5 " id="research">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">#5</h5>
                    <h1 class="mb-5">Research</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="wow fadeInUp text-center" data-wow-delay="0.3s">
                            <p>Coming soon! Stay tuned</p>
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
