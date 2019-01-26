@extends('layouts.web')

@section('title'){{
$Magazin_offer->Market()->first()->MarketMain()->first()->
name()->where('id_language',session()->get('langid'))->first()->name}}@endsection

@section('sectionHeadrOffer')
    <div class="col-xs-12">
        <section class="adds-section">
            <div class="adds-div">
                <a href="#" class="movie">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}">
                </a>
            </div>
        </section>
    </div>
@endsection

@section('like1')
    <div class="col-xs-12 col-sm-6">
        <h5>محتويات من قسم</h5>
        <div class="owl-carousel owl-theme">
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('like2')
    <div class="col-xs-12 col-sm-6">
        <h5>محتويات من قسم</h5>
        <div class="owl-carousel owl-theme">
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" alt="Owl Image">
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('like3insame')
    <div class="col-xs-12 offers-section-add">
        <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" />
    </div>

    <div class="col-xs-12 offers-section-add">
        <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}" />
    </div>
@endsection

@section('content')
    <!-- start offers-section -->
    <section class="offers-section">
        <div class="container">
            <div class="row">
                <h3>عروض  {{
                $Magazin_offer->Market()->first()->MarketMain()->first()->name()->
                            where('id_language',session()->get('langid'))->first()->name}}
  من يوم                    {{Carbon\Carbon::parse($Magazin_offer->from)->format('d-m-Y')}}
     حتي                    {{Carbon\Carbon::parse($Magazin_offer->to)->format('d-m-Y')}}
                </h3>

                <div class="col-xs-12 col-sm-6 col-sm-offset-1">

                    <div class="carousel slide article-slide" id="article-photo-carousel">
                        <!-- Wrapper for slides -->

                        <div class="carousel-inner cont-slider">
                            @foreach($Magazin_offer->pages()->orderBy('order','ASC')->get() as $value)
                                @if($value->order==1)
                            <div class="item active">
                                @else
                            <div class="item">
                                @endif
                                <span>رقم الصفحة ({{$value->order}})</span>
                                <img alt="" title="" src="{{$value->image}}">
                            </div>

                            @endforeach
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#article-photo-carousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#article-photo-carousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
                                <img alt="" src="img/tap-slider/2663220940.jpg">
                            </li>
                            <li class="" data-slide-to="1" data-target="#article-photo-carousel">
                                <img alt="" src="img/tap-slider/2663220940.jpg">
                            </li>
                            <li class="" data-slide-to="2" data-target="#article-photo-carousel">
                                <img alt="" src="img/tap-slider/2663220940.jpg">
                            </li>
                            <li class="" data-slide-to="3" data-target="#article-photo-carousel">
                                <img alt="" src="img/tap-slider/2663220940.jpg">
                            </li>
                        </ol>
                    </div>

                    <div class="col-xs-9 share-button">
                        <p> <i class="fa fa-share-alt" aria-hidden="true"></i> شارك العرض</p>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-sm-10 offers-offer-info">
                        <h4>عرض
                            {{$Magazin_offer->Market()->first()->MarketMain()->first()->name()->
                            where('id_language',session()->get('langid'))->first()->name
                             }}
                        </h4>
                        <div class="info-description">
                            <p>
                                {{$Magazin_offer->des}}
                            </p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-10 comment-div">
                        <form name="" action="" method="post" enctype="multipart/form-data">
                            <textarea></textarea>
                            <button class="btn btn-info"><i class="fa fa-send" aria-hidden="true"></i> ارسل تعليق</button>
                        </form>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                    <div class="col-xs-8 col-sm-12 col-md-8 offer-info">
                        <div class="info-content">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            <span>عدد الصفحات : {{$Magazin_offer->numOfpage}} </span>
                        </div>
                        <div class="info-content">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span>مشاهدة : {{$Magazin_offer->views}} </span>
                        </div>
                        <div class="info-content">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>

                            <span>تاريخ : {{Carbon\Carbon::parse($Magazin_offer->from)->format('d-m-Y')}} </span>
                        </div>
                        <div class="info-content">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php \Carbon\Carbon::setLocale('ar');?>
                            <span> اخر تحديث : {{$Magazin_offer->updated_at->diffForHumans()}}  </span>
                        </div>

                        <div class="info-content">
                            <i class="fa fa-share" aria-hidden="true"></i>
                            <span> عدد المشاركات : {{$Magazin_offer->numOfshare}}  </span>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-12 col-md-4 offer-image">
                        <img class="img-responsive" src="{{$Magazin_offer->Market()->first()->
                                                           MarketMain()->first()->logo()->pluck('logo')->first()}}" alt="Amex-56">
                    </div>

                    <div class="col-xs-12 offer-button">
                        <button class="btn btn-success"> <i class="glyphicon glyphicon-heart-empty"></i> اضافة للعروض المفضلة</button>
                    </div>
                    <div class="col-xs-12 offer-button">
                        <button class="btn btn-success"> <i class="fa fa-commenting-o" aria-hidden="true"></i> ارسل رسالة </button>
                    </div>
                    <div class="col-xs-12 offer-button offer-map-button">
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal2"> <i class="fa fa-map-marker" aria-hidden="true"></i> اظهار المكان علي الخريطة </button>
                    </div>

                    <!-- log in modal-->
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div id="login-overlay" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">اختار مكانك</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <!-- start map -->
                                            <div id="map"></div>
                                            <input type="hidden" name="lan">
                                            <input type="hidden" name="lat">
                                            <!-- end map -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- log in modal-->
                    @yield('like3insame')

                </div>
            </div>
        </div>
    </section>
    <!-- end offers-section-->

    <!-- start comments show -->
    <section class="comment-show">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 comment-limit">
                    @foreach($Magazin_offer->comment()->get() as $value)
                        <div class="comment-div">
                            <div class="comment-image">
                                <img src="https://lh3.googleusercontent.com/-v-nOreIwytQ/WXYGOTJfxwI/AAAAAAAAABA/gmB02KQ5YukxO7WQDS_lo0xl5OBrphA5ACEwYBhgL/w139-h140-p/17022164_281947275571825_7574097377909968664_n.jpg" alt="user-image" />
                            </div>

                            <div class="comment-box">
                                <h4>
                                    {{$value->user()->first()->name}}
                                </h4>
                                <?php \Carbon\Carbon::setLocale(session()->get('lang'));?>
                                <span>
                                      {{$value->created_at->diffForHumans()}}
                                </span>
                                <p>
                                    {{$value->comment}}

                                </p>
                            </div>
                        </div>
                    @endforeach
                    @if(count($Magazin_offer->comment()->get())>2)
                    <span class="down">رؤية المزيد <i class="fa fa-arrow-down" aria-hidden="true"></i> </span>

                    <span class="up">تقليل المزيد <i class="fa fa-arrow-up" aria-hidden="true"></i> </span>
                   @endif
                </div>


                <div class="col-xs-12 col-sm-4 rating-section text-center">
                    <h3>قيم هذا المنتج</h3>
                    <div class="rating">
                        <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                    </div>

                    <div class="rating-circle">
                        <span>4.3</span>
                        <div class="already-rating">
                            <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                            <span class="checked"><input type="radio" name="rating" id="str4" value="4"><label for="str4"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                            <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                            <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                            <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                        </div>
                        <p>4 من 5</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end comments show -->

    <!-- start adds section -->
    <section class="adds-section offers-add">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" >
                    <div class="adds-div">
                        <a href="#" class="movie">
                            <img class="img-responsive" src="{{asset("site/web/img/adds/3.png")}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end adds section -->

@endsection






@section('map')
    <!-- start map -->
    <script>
        function initMap() {
            var uluru = {lat: 29.960770, lng: 31.252310};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });

            $('.btn-success').on('shown.bs.modal', function () {
                google.maps.event.trigger(map, "resize");
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf65Tro0ZYD5yDW_LtuAprGC85yJpj7jA&callback=initMap">
    </script>
    <!-- start map -->
@endsection