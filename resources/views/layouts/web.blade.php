<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Standerd Description">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>365 Deal | Offers @yield('title')</title>
    <link rel="icon" href="{{asset("site/web/img/brand/111.png")}}" sizes="16x16">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

    <link rel="stylesheet" href="{{asset("site/web/css/styles.min.css")}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
</head>

<body>
<!-- start first nav -->
<header>
    <div id="top" class="navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-7 contact">
                    <ul class="nav navbar-nav navbar-left">

                        <li class="dropdown language">
                            <a class="dropdown-toggle" data-toggle="dropdown">العربيه  <span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="ar.html"  selected>العربيه</a></li>
                                <li><a href="en.html" >English</a></li>
                            </ul>
                        </li>

                        <li class="dropdown language">
                            <a class="dropdown-toggle" data-toggle="dropdown">مصر  <span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="ar.html"  selected>مصر</a></li>
                                <li><a href="en.html" >السعودية</a></li>
                            </ul>
                        </li>

                        <li><a href="#">نقاطي</a></li>

                        <li><a href="#">اعلن معنا</a></li>

                    </ul>
                </div>

                <div class="col-xs-4">

                    <!-- Button trigger modal -->
                    <span type="button" class="btn btn-primary">
                             مرحباً شعبان
                            </span>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- end first nav -->

<!-- start second nav -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
                    <span class="icon-bars"><i class="fa fa-bars"></i></span>
                </button>
                <a class="brand-scrolled" href="index.html">
                    <img class="img-responsive" alt="Brand" src="{{asset("site/web/img/brand/11.png")}}">
                </a>
            </div>
            <div id="Navbar"  class="collapse navbar-collapse">
                <div class="col-xs-12 col-sm-6 col-lg-6">

                    <!-- Button sign up modal -->
                    <!--<span type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      التسجيل
                    </span>-->

                    <!-- Button add product -->
                    <span type="button" class="btn btn-info">
                          <a href="">اضافة عرض</a>
                        </span>

                </div>

                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="input-group">
                        <div id="hicon" onclick='icon(this) '>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <input type="text" class="form-control" placeholder="ابحث عن ....">
                        <span class="input-group-btn">
                                <button class="btn btn-info" type="button">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end second nav -->

<!-- start third nav -->
<header>
    <div id="bottom" class="navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 contact">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#">عروض</a></li>
                        <li class="dropdown language">
                            <a class="dropdown-toggle" data-toggle="dropdown">خدمات  <span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="ar.html"  selected>لا شئ</a></li>
                                <li><a href="en.html" >لا شئ</a></li>
                            </ul>
                        </li>

                        <li class="dropdown language">
                            <a class="dropdown-toggle" data-toggle="dropdown">منتجات  <span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="ar.html"  selected>لا شئ</a></li>
                                <li><a href="en.html" >لا شئ</a></li>
                            </ul>
                        </li>
                        <li><a href="#">مناسبات</a></li>
                        <li><a class="san-serif" href="#">عروض كارت توفير 365 Deal </a></li>
                        <li><a href="#">نقاطي</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown language">
                            <a class="dropdown-toggle" data-toggle="dropdown"> <span>
                                    <i class="fa fa-plus" aria-hidden="true"></i></span> اضافة </a>
                            <ul class="dropdown-menu add-toggle">
                                <li><a href="ar.html"  selected>لا شئ</a></li>
                                <li><a href="en.html" >لا شئ</a></li>
                            </ul>
                        </li>
                        <li><a href="#"> المفضلة <span> <i class="glyphicon glyphicon-heart"></i></span> </a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <!-- log in modal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div id="login-overlay" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login to 365 Deal</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="well">
                                <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="username" class="control-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                        <span class="help-block"></span>
                                    </div>
                                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember"> Remember login
                                        </label>
                                        <p class="help-block">(if this is a private computer)</p>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <p class="lead">Register now for <span class="text-success">FREE</span></p>
                            <ul class="list-unstyled" style="line-height: 2">
                                <li><span class="fa fa-check text-success"></span> See all your orders</li>
                                <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                                <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                                <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                                <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                            </ul>
                            <p><a href="/new-customer/" class="btn btn-info btn-block">Yes please, register now!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- log in modal-->

    <section class="division">
        <div class="container">
            <div class="row">
                <ul class="list-unstyled col-xs-4">
                    <li><span>>> </span><a class="link-pages" href="#">الرئيسية</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">عن الموقع</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">إتصل بنا</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">سياسة الإستخدام</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">شركاء النجاح</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">العروض</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">تسجيل عضوية</a></li>
                </ul>

                <ul class="list-unstyled col-xs-4">
                    <li><span>>> </span><a class="link-pages" href="#">الرئيسية</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">عن الموقع</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">إتصل بنا</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">سياسة الإستخدام</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">شركاء النجاح</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">العروض</a></li>
                    <li><span>>> </span><a class="link-pages" href="#">تسجيل عضوية</a></li>
                </ul>

            </div>
        </div>
    </section>

</header>
<!-- end third nav -->

<!-- start header -->
<section class="header">
    <div class="container">
        <div class="row">
            <!-- start adds -->
            <div class="col-xs-12 col-sm-4">
                <div class="adds-div">
                    <a href="#" class="movie">
                        <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}">
                        <span class="ribbon r2">
                              <span>اعلان مميز</span>
                            </span>
                    </a>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8">
                <div class="header-main">

                    <div class="col-lg-12 header-slider">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img class="img-responsive" src="{{asset("site/web/img/slide-1.jpeg")}}" alt="slide">
                                    <div class="carousel-caption">
                                        <h3>نوع المنتج المعلن عنه</h3>
                                        <p>تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <img class="img-responsive" src="{{asset("site/web/img/slide-1.jpeg")}}" alt="slide">
                                    <div class="carousel-caption">
                                        <h3>نوع المنتج المعلن عنه</h3>
                                        <p>تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <img class="img-responsive" src="{{asset("site/web/img/slide-1.jpeg")}}" alt="slide">
                                    <div class="carousel-caption">
                                        <h3>نوع المنتج المعلن عنه</h3>
                                        <p>تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <img class="img-responsive" src="{{asset("site/web/img/slide-1.jpeg")}}" alt="slide">
                                    <div class="carousel-caption">
                                        <h3>نوع المنتج المعلن عنه</h3>
                                        <p>تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان تفاصل الاعلان</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- start adds section -->

            @yield('sectionHeadrOffer')

            <!-- end adds section -->
        </div>
    </div>
</section>
<!-- end header -->


@yield('content')




<!-- start subscripe -->
<section class="subscripe-div text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="subscribe">الإشتراك عبر البريد الإلكتروني</p>
                <form class="form-inline">
                    <div class="col-sm-8">
                        <input class="form-control input-lg col-xs-9" type="text" placeholder="إدخل البريد الإلكتروني">
                    </div>

                    <div class="col-sm-4">
                        <button class="btn btn-default btn-lg col-xs-3"><span>إشتراك </span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- start subscripe -->

<!-- start most-views-slider -->
<section class="most-views-slider2">
    <div class="container">
        <div class="row">
            <h2>محتويات قد تعجبك</h2>

            @yield('like1')

            @yield('like2')


        </div>
    </div>
</section>
<!-- end most-views-slider-->

<!-- start social-section -->
<div class="social-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <a class="facebook" target="_blank" href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="col-xs-2">
                    <a class="twitter" target="_blank" href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="col-xs-2">
                    <a class="instagram" target="_blank" href="/feed">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="col-xs-2">
                    <a class="pinterest" href="https://pinterest.com/pin/create/button/?url=link&media=image&description=title">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="col-xs-2">
                    <a class="google" target="_blank" href="https://plus.google.com/share?url=link">
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="col-xs-2">
                    <a class="mail" target="_blank" href="mailto:?subject=link">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end social-section -->

<!-- start section Footer -->
<footer>
    <div class="container">
        <div class="row">
            <!--1-->
            <div class="div-footer col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <!--part1-->
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <div class="logo-footer">
                            <a href="#"><img src="img/brand/111.png" alt="365-Deal" ></a>
                        </div>
                        <p class="lead">نحن الأوائل <br> كل العروض تحت سقف واحد</p>
                        <p class="p1">يمكنك الوصول إلي جميع العروض و مقدمي الخدمات في دولتك عن طريق الموقع و التطبيق الخاص بنا و الإستمتاع بالعديد من المزايا</p>
                    </div>
                    <!--part2-->
                    <div class="div-footer col-md-5 col-sm-12">
                        <h3>الصفحات</h3>
                        <ul class="list-unstyled">
                            <li><span>>></span><a class="link-pages" href="#">الرئيسية</a></li>
                            <li><span>>></span><a class="link-pages" href="#">عن الموقع</a></li>
                            <li><span>>></span><a class="link-pages" href="#">إتصل بنا</a></li>
                            <li><span>>></span><a class="link-pages" href="#">سياسة الإستخدام</a></li>
                            <li><span>>></span><a class="link-pages" href="#">شركاء النجاح</a></li>
                            <li><span>>></span><a class="link-pages" href="#">العروض</a></li>
                            <li><span>>></span><a class="link-pages" href="#">تسجيل عضوية</a></li>
                        </ul>
                    </div>
                    <!--part3-->
                    <div class="col-sm-12">
                        <p class="subscribe">الإشتراك عبر البريد الإلكتروني</p>
                        <form class="form-inline">
                            <input class="form-control input-lg col-xs-9" type="text" placeholder="إدخل البريد الإلكتروني">
                            <button class="btn btn-default btn-lg col-xs-3"><span>إشتراك </span></button>
                        </form>
                    </div>
                    <!--part4-->
                </div>
            </div><!--end 1-->
            <!--2-->
            <div class="div-footer col-lg-5 col-md-12 col-sm-12">                            <!--part5-->
                <div class="div-footer col-lg-7 col-md-6 col-sm-12">
                    <h3>الأقسام</h3>

                    <ul class="list-unstyled">
                        <li><span>>></span><a class="link-pages" href="#">القسم النسائي </a></li>
                        <li><span>>></span><a class="link-pages" href="#">قسم العقارات </a></li>
                        <li><span>>></span><a class="link-pages" href="#">قسم خدمات عامة </a></li>
                        <li><span>>></span><a class="link-pages" href="#">القسم الطبي </a></li>
                        <li><span>>></span><a class="link-pages" href="#">قسم الهدايا </a></li>
                        <li><span>>></span><a class="link-pages" href="#">قسم حرف و مهن </a></li>
                        <li><span>>></span><a class="link-pages" href="#">القسم المنزلي </a></li>
                        <li><span>>></span><a class="link-pages" href="#">قسم الأكل و المشروبات</a></li>
                        <li><span>>></span><a class="link-pages" href="#">السياحة و السفر </a></li>
                        <li><span>>></span><a class="link-pages" href="#">القسم الرجالي </a></li>
                        <li><span>>></span><a class="link-pages" href="#">القسم التعليمي </a></li>
                    </ul>
                </div>
                <!--part6-->
                <div class="div-footer col-lg-5 col-md-6 col-sm-12">
                    <!-- Single button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span> عربي </span>
                            <i class="fa fa-angle-down fa-2x" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                    <div class="links">
                        <a href="#"><img class="img-responsive" src="{{asset("site/web/img/buttons/google.png")}}" alt="google-play"></a>
                        <a href="#"><img class="img-responsive" src="{{asset("site/web/img/buttons/app.png")}}" alt="app-store"></a>
                    </div>

                </div>
            </div> <!--end 2-->

            <!--part7-->
            <div class="col-xs-12 footer-info">
                <div class="nav-footer col-xs-6">
                    <ul class="list-unstyled">
                        <li><a href="#">حول الموقع</a></li>
                        <li><a href="#">المركز الإعلامي</a></li>
                        <li><a href="#">وظائف</a></li>
                        <li><a href="#">برنامج التسويق بالعموله</a></li>
                    </ul>
                </div>

                <div class="copy-right col-xs-6">
                    <p>ALL Rights Reserved,Powerd by 7DS Company &copy; 2017</p>
                </div>
            </div>

        </div>
    </div>   <!--end container-->
</footer>
<!-- end section Footer -->


<!-- start scroll-top-button -->
<!--<div id="scroll-top">
<i class="fa fa-chevron-up"></i>
</div>-->
<!-- start scroll-top-button -->


<script src="{{asset("site/web/js/main.min.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


@yield('map')

<!-- smooth scroll -->
<script>
    smoothScroll.init();
</script>

<script>
    function icon(hxd) { hxd.classList.toggle('open');}
</script>

</body>

</html>




