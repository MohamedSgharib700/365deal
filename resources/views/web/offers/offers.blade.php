@extends('layouts.web')
@section('title') offers @endsection

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
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
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
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="offer">$200 free</div>
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
            <div class="tap-slider-div">
                <a href="#">
                    <img class="img-responsive" src="img/tap-slider/2663220940.jpg" alt="Owl Image">
                    <div class="tap-slider-overlay">
                        <span>اسم العرض</span>
                        <span>مميزات العرض</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <!-- start breadcrumb -->
    <section class="breadcrumb">
        <div class="container">
            <div class="row">

                <ol class="breadcrumb">
                    <li><a href="index.html">الرئيسية</a></li>
                    <li class="active">العروض</li>
                </ol>

            </div>
        </div>
    </section>
    <!-- end breadcrumb -->

    <!-- start search-filtrs -->
    <section class="search-filtrsr">
        <div class="container" >
            <div class="row" id="filter">
                <!--start selection-section-->
                <div class="selection-section">
                    <div class="container">
                        <div class="row">
                            <div class="selection-div  col-lg-12 col-sm-12">
                                <div class="div1 col-lg-7 col-sm-12">

                                    <div class="col-xs-3">
                                        <!-- start Split button -->
                                        <select class="soflow" id="market"
                                                onchange="search()">
                                            <option value="">الماركت</option>
                                            @foreach($MarketMain as $value)
                                                @if($value->name()
                                                    ->where('id_language',session()->get('langid'))
                                                    ->first())
                                                    <option value="{{$value->id}}">
                                                        {{$value->name()
                                                        ->where('id_language',session()->get('langid'))
                                                        ->first()->name}}</option>
                                                @endif
                                            @endforeach
                                            ?>
                                        </select>
                                        <!-- end Split button -->
                                    </div>

                                    <div class="col-xs-3">
                                        <!-- start Split button -->
                                        <select class="soflow" id="cat"
                                                onchange="search()">
                                            <option value="">كل الفئات</option>
                                            @foreach($catag as $catags)
                                                @if($catags->catlan()
                                                    ->where('id_language',session()->get('langid'))
                                                    ->first())
                                                <option value="{{$catags->id}}">
                                                    {{$catags->catlan()
                                                    ->where('id_language',session()->get('langid'))
                                                    ->first()->name}}</option>
                                                    @endif
                                            @endforeach
                                            ?>

                                        </select>
                                        <!-- end Split button -->
                                    </div>
                                    <div class="col-xs-6">
                                        <input  onkeyup="search(this)"
                                                class="form-control input-lg" type="text" value="" placeholder="بحث"
                                        id="search">
                                    </div>
                                </div>

                                <div class="col-md-5 col-xs-12 selection-div-div">
                                    <div class="col-md-4 col-xs-4">
                                        <!-- start Split button -->
                                        <select name="contry" class="soflow city" id="contry"
                                         onchange="search(),getComboA(this)">
                                            <option value="">البلد</option>
                                            @foreach($Address as $address)
                                            <option value="{{$address->id}}">{{$address->addresse}}</option>
                                            @endforeach
                                        </select>
                                        <!-- end Split button -->
                                    </div>

                                    <div class="col-md-4 col-xs-4">
                                        <!-- start Split button -->

                                        <select class="soflow block" id="city"
                                                onchange="search(),getComboA(this)">
                                            <option value="">المدينة</option> cities

                                        </select>
                                        <!-- end Split button -->
                                    </div>
                                    <div class="col-md-4 col-xs-4">
                                        <!-- start Split button -->
                                        <select class="soflow" id="block"
                                                onchange="search()">
                                            <option value="">الحي</option>
                                        </select>
                                        <!-- end Split button -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end selection-section-->
        </div>
    </section>
    <!-- end search-filtrs-->

@if (count($Magazin_offer) > 0)
    <section class="Magazin_offer">
         @include('web.offers.offerload')
    </section>
@endif



<script>


$(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        $('#load a').css('color', '#dfecf6');
        $('#load').
        append('<img style="position: absolute; left: 40%; top: 15% ; width: 20%; z-index: 100000;" src="/images/805.svg" />');
        var url = $(this).attr('href');
        var market = document.getElementById("market").value;
        var cat = document.getElementById("cat").value;
        var search = document.getElementById("search").value;
        var contry = document.getElementById("contry").value;
        var city = document.getElementById("city").value;
        var block = document.getElementById("block").value;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                url : url,
                data: {_token: CSRF_TOKEN,
                id_marker:market,
                id_cat:cat,
                search:search,
                id_country:contry,
                id_city:city,
                id_block:block},
                type: 'get',

            }).done(function (data) {
                $('.Magazin_offer').html(data);
            }).fail(function () {
                alert('Magazin_offer could not be loaded.');
            });

       window.history.pushState("", "", url);
    });
});

function search()
{
    var market = document.getElementById("market").value;
    var cat = document.getElementById("cat").value;
    var search = document.getElementById("search").value;
    var contry = document.getElementById("contry").value;
    var city = document.getElementById("city").value;
    var block = document.getElementById("block").value;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#load').append('<img style="position: absolute; left: 40%; top: 15% ; width: 20%; z-index: 100000;" src="/images/805.svg" />');
    var url ='offers';
    $.ajax({
            url : url,
            data: {_token: CSRF_TOKEN,
            id_marker:market,
            id_cat:cat,
            search:search,
            id_country:contry,
            id_city:city,
            id_block:block},
            type: 'get',

        }).done(function (data) {
            $('.Magazin_offer').html(data);
        }).fail(function () {
            alert('Magazin_offer could not be loaded.');
        });

}

function getComboA(selectObject)
{
    var value = selectObject.value;
    var id = selectObject.id;
    var classe =  selectObject.className.split(' ');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'offers/getaddress',
            type: 'get',
            data: {_token: CSRF_TOKEN, id:value},
            dataType: 'JSON',
            success: function (data)
            {
                if(classe[1]=='city')
                {
                $('#'+classe[1]).find('option').remove().end()
                    .append('<option value="" selected>المدينة</option>');
                $('#block').find('option').remove().end()
                .append('<option value="" selected>الحي</option>');
                data.forEach(function(entry){
                    $('#'+classe[1]).append("<option value='"+ entry.id +"'>"+ entry.addresse +"</option>")
                });
                }
                else if(classe[1]=='block')
                {
                $('#'+classe[1]).find('option').remove().end()
                    .append('<option value="" selected>الحي</option>');
                data.forEach(function(entry){
                $('#'+classe[1]).append("<option value='"+ entry.id +"'>"+ entry.addresse +"</option>")
                });
                }
            }});
}


function getMagazin_offer(url) 
{
    $.ajax({
        url : url
    }).done(function (data) {
        $('.Magazin_offer').html(data);
    }).fail(function () {
        alert('Articles could not be loaded.');
    });
}

</script>






@endsection

