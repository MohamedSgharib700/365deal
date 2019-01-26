<div id="load" style="position: relative;">
    <!-- start offers  -->
    <section class="offers-offers">
        <div class="container">
            <div class="row" id="mainview">
                <h2>العروض</h2>
                <div  id="view">
                @foreach($Magazin_offer as $value)
                <div class="col-xs-12 col-sm-3 offers-div-all">
                    <div class="offers-div">
                        <a href="#">
                            <img class="img-responsive" 
                            src="{{asset("site/web/img/tap-slider/2663220940.jpg")}}"
                                 alt="Owl Image">
                            <div class="date-offers">26/10/2017</div>
                            <div class="tap-slider-overlay">
                                <span>عرض {{$value->Market()->first()->
                                MarketMain()->first()->
                                name()->where('id_language','=',session()->get('langid'))->pluck('name')->first()}}
                                </span>
                            </div>
                        </a>
                    </div>
                    <span>عدد الصفحات ({{$value->numOfpage}})</span>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end offers -->
</div>
    <!-- start pagnination  -->
<section class="pagnination">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <nav aria-label="Page navigation">
                    {{ $Magazin_offer->links() }}
                </nav>
            </div>
        </div>
    </div>

</section>



    <!-- end pagnination -->