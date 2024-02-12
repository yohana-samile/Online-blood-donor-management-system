<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Online Blood Donation Management System' }}</title>
    <link rel="stylesheet" href="{{ url('css/obdms.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <nav class="navbar navbar-expand-lg text-white bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ url('/') }}">{{('Obline Blood Donor Management System')}}</a>
            <button class="navbar-toggler text-light btn btn-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-light"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarColor02">
                <ul class="navbar-nav ml-auto justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="{{ url('/') }}" id="home">{{('Home')}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#why_donation">{{('Why Donate Blood')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#become_donor">{{'Become Donor'}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="javascript:void()" data-bs-toggle="modal" data-bs-target="#login_modal">{{('Need Blood')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#new_and_update">{{('News')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contact_us">{{('Contact')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">{{('About')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white btn btn-danger" href="javascript:void()" data-bs-toggle="modal" data-bs-target="#login_modal">{{("Login")}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- img slide -->
    <div class="container my-2">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ url('img/world-blood-donor-day-creative-collage_23-2149378360.avif') }}" class="d-block w-100" alt="news" height="400px">
              </div>
              <div class="carousel-item">
                <img src="{{ url('img/blood_donationcover.jpeg')}}" class="d-block w-100" alt="news"  height="400px">
              </div>
              <div class="carousel-item">
                <img src="{{ url('img/Blood-facts_10-illustration-graphics__canteen.png')}}" class="d-block w-100" alt="news"  height="400px">
              </div>
            </div>
            <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
        </div>
        <hr>
    </div>
    <!-- end img sld -->


    {{-- loader --}}
    {{-- <div style="width:100%;text-align:center;vertical-align:bottom">
		<div class="loader"></div>
    </div> --}}

    <!-- why_donation -->
    <div class="container bg-light" id="why_donation">
        <div class="row my-3">
            <div class="col-md-6">
                <h4>Why Should I Donate Blood ? </h4>
                <p>
                    Blood is the most precious gift that anyone can give to another person — the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components — red cells, platelets and plasma — which can be used individually for patients with specific conditions. Safe blood saves lives and improves health. Blood transfusion is needed for:
                </p>
                <ul>
                    <li>women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.</li>
                    <li>children with severe anaemia often resulting from malaria or malnutrition.</li>
                    <li>people with severe trauma following man-made and natural disasters.</li>
                    <li>many complex medical and surgical procedures and cancer patients.</li>
                </ul>
                <p>
                    It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia. There is a constant need for regular blood supply because blood can be stored for only a limited time before use. Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{url('img/08f2fccc45d2564f74ead4a6d5086871.png')}}" alt="img-donation-reason" height="520" width="547">
            </div>
        </div>
        <!-- up arrow -->
        <a href="#home" class="scroll-to-top text-decoration-none text-dark" style="font-size: 30px; visibility: none; position: fixed; right: 20px; bottom: 20px;">
            <i class="fa fa-arrow-circle-up textprimary"></i>
        </a>
        <hr>
    </div>

    <!-- become_donor -->
    <div class="container mb-3" id="become_donor">
        <div class="row my-3">
            <div class="col-md-6">
                <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>The most common blood type is O, followed by type A. Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.
                    <br><br>
                    For emergency transfusions, blood group type O negative blood is the variety of blood that has the lowest risk of causing serious reactions for most people who receive it. Because of this, it's sometimes called the universal blood donor type.
                </p>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">Free Regratation For Donors</h4>
                <form>
                    <div class="mb-3">
                        <label for="regstrationFull_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="regstrationFull_name" name="full_name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="tell" name="phoneNumber" id="phoneNumber" class="form-control" id="phoneNumber">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="registrationEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="registrationEmail" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text"><small>We'll never share your email with anyone</small></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                              <label for="home_addres" class="form-label">Home Aaddres</label>
                              <input type="text" class="form-control" id="home_addres">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option selected hidden disabled>Choose Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="blood_group" class="form-label">Blood Group</label>
                                <select name="blood_group" id="blood_group" class="form-control">
                                    <option selected hidden disabled>Choose Blood Group</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Register</button>
                </form>
            </div>
        </div>
        <hr>
    </div>

    {{-- news and update --}}
    <div class="container bg-light" id="new_and_update">
        <h4 class="text-center">news and update</h4>
        @php
            $get_news = DB::select("SELECT * FROM `new_and_updates`");
        @endphp
        @if (!empty($get_news))
            <div class="row">
                @foreach ($get_news as $get_new)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <p>{{ $get_new->new_title }}</p>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void()" data-target="#image_preview" data-toggle="modal" aria-hidden="false">
                                    <img src="{{ asset('image/'.$get_new->new_postacl_card) }}" alt="post-card" width="100%" height="100%">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="alert alert-danger my-4">No Records</p>
        @endif
    </div>

    <!-- contact_us -->
    <div class="container my-4 bg-white" id="contact_us"><br>
        <div class="row my-3">
            <div class="col-md-6">
                <h4>Contact Details </h4>
                    <p>Address: p.obox 1 Mzumbe</p>
                    <p>Phone Number: +255 620 350 083</p>
                    <p>Email: yohanasamile@gmail.com</p>
                <h4>{{('Location')}}</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126935.91330601924!2d39.14826951347784!3d-6.164587973561293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185cd0ba23b63ecb%3A0x52c848ab6efc138e!2sZanzibar!5e0!3m2!1sen!2stz!4v1706515771441!5m2!1sen!2stz" width="540" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">Fill This Form To Contact With Us</h4>
                <form id="send_my_message">
                    @csrf
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="tell" name="phone_number" id="phone_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Enter Your Message</label>
                        <textarea name="message" id="message" class="form-control" cols="30" rows="10" required></textarea>
                    </div>
                    <button type="submit" class="send_my_message btn btn-danger">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <!-- login modal -->
    <div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="login_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login_modal">{{('User Login Form')}}</h5>
                    <button type="button" class="btn-danger text-white btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form method="POST" action="" id="log_me_in">
                    @csrf
            		<div class="loader" hidden></div>
                    <div class="modal-body">
                        <p><small>{{('Sorry Only Hospitals Can Request For Blood')}}</small></p>
                        <div class="mb-3">
                            <label for="username" class="form-label">{{('Enter Your Email')}}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{('Enter Password')}}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{('Close')}}</button>
                        <button type="submit" class="log_me_in btn btn-danger">{{('Login')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #3e4551">
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4 text-center">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!"role="button"><i class="fa fa-facebook-f"></i></a>
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-twitter"></i></a>
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-instagram"></i></a>
                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-linkedin"></i></a>
            </section>
        </div>

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            <a class="text-white" href="https://github.com/yohana-samile">Developed By Developer Samile</a>
        </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="{{ url("js/bootstrap.bundle.js")}}"></script>
    <script src="{{ url("js/bootstrap.min.js")}}"></script>
   <script src="{{ url('js/custom.js') }}"></script>
    <script src="{{ url("js/jquery.min.js")}}"></script>
    <script src="{{ url("js/bootstrap.min.js")}}"></script>
    <script src="{{ url("js/bootstrap.js")}}"></script>
    <script src="{{ url("js/main.js")}}"></script>
    <script src="{{ url("js/compressedJQuery.js")}}"></script>
</body>
</html>
