<?php

namespace App\Http\Controllers;

use App\market_mains_lan;
use Illuminate\Http\Request;
use App\MarketMain;
use App\Magazin_offer;
use App\Address;
use App\RateingOffer;
use App\catagsLan;
use App\Market;
use App\Pages;
use App\logomarket;
use DB;
use Image;
use Stichoza\GoogleTranslate\TranslateClient;
use Carbon;
class ApiOffer extends Controller
{
    //code    //404=Error  405=faild  406=success
    //status //faild   success
    public function index()
    {
        $MarketMain=MarketMain::all();
        $alloffer=['code'=>'406',
                   'message'=>'success get data',
                   'status'=>'success',
                   'data' =>''];
        $i=0;
        foreach ($MarketMain as $value)
        {
            $alloffer['data'][]= [
                'id'=>$value->id,
                'marketName'=> $value->name()->where('id_language','=',session()->get('langid'))->pluck('name')->first(),
                'logo'=>$value->logo()->pluck('logo')->first(),
                ];
            //return $value->Marketsub()->select('id','lat','lan','email','phone','id_address')->get();
            foreach ($value->Marketsub()->select('id','lat','lan','email','phone','id_address')->get()
                     as $item)
            {
                //return $item->Magazin_offer()->get();
                $alloffer['data'][$i]['Branches'][]= [
                        'submarket'=>$item->makeHidden('id_address'),
                        'block'=> $item->Address()->pluck('addresse')->first() ,
                        'city'=>$item->Address()->first()->Address_p()->pluck('addresse')->first(),
                        'country'=>$item->Address()->first()->Address_p()->first()->Address_p()->
                                    pluck('addresse')->first() ,
                        'offers'=>

                        $item->Magazin_offer()->select('magazin_offers.id',
                                 'magazin_offers.numOfpage','magazin_offers.numOfshare',
                                 'magazin_offers.views','magazin_offers.des','magazin_offers.from',
                                 'magazin_offers.to',
                                 'pages.image as mainpage','pages.alt as alt')->
                             join('pages', 'pages.id_magazin_offers', '=', 'magazin_offers.id')->
                            //join('markets', 'markets.id', '=', 'magazin_offers.id')->
                            where('magazin_offers.flag',1)->
                             where('pages.order',1)->
                             get()
                        ,
                    ];
                $i=$i+1;
            }
        }
        return response()->json($alloffer);
    }

    public function show($id)
    {
        if($Magazin_offer=Magazin_offer::find($id))
        {
            $Magazin_offer->views=$Magazin_offer->views+1;
            $Magazin_offer->save();
            $alloffer=['code'=>'406',
                'message'=>'success get data',
                'status'=>'success',
                'data' =>[
                'user_id'=>$Magazin_offer->Market()->first()->
                MarketMain()->first()->pluck('id_user')->first(),
                'urltoshare'=>'365deel.com',
                'market'=>$Magazin_offer->Market()->first()->MarketMain()->first()->
                name()->where('id_language','=',session()->get('langid'))->pluck('name')->first(),
                'phone'=>$Magazin_offer->Market()->pluck('phone')->first(),
                'logo'=> $Magazin_offer->Market()->first()->MarketMain()->first()->logo()->pluck('logo')->
                first(),
                'offer'=>$Magazin_offer->makeHidden(['id_market','flag','flagcomment','created_at','updated_at']),
                "pages"=> $Magazin_offer->pages()->select('image','alt','order')->get()
                ]];

        }
        else
        {
            $alloffer=['code'=>'405', 'message'=>'no data', 'status'=>'faild', 'data' =>''];
        }
        return $alloffer;
    }

    public function filter(Request $request){
        $Magazin_offer=[];
       if(($ids=$this->get_ids_address($request))||$request->id_market)//get id adress blocks
        {
            $Magazin_offer=Magazin_offer::select('magazin_offers.id','market_mains_lans.name as marketName', 'logomarkets.logo as marketlogo'
                , 'magazin_offers.numOfpage', 'magazin_offers.numOfshare', 'magazin_offers.views',
            'magazin_offers.des', 'magazin_offers.from', 'magazin_offers.to', 'pages.image as mainpage')->

            join('markets', 'magazin_offers.id_market', '=', 'markets.id')->
            join('market_mains', 'markets.id_market_mains', '=', 'market_mains.id')->
            join('market_mains_lans', 'market_mains_lans.id_market_mains', '=', 'market_mains.id')->
            join('logomarkets', 'logomarkets.id_market_main', '=', 'market_mains.id')->
            join('addresses', 'markets.id_address', '=', 'addresses.id')->
            join('pages', 'pages.id_magazin_offers', '=', 'magazin_offers.id')->

            where('pages.order', 1)->
            where('market_mains_lans.id_language',session()->get('langid'));

            $Magazin_offer = !isset($ids) ? $Magazin_offer : $Magazin_offer
                ->whereIn('markets.id_address', $ids);
            $Magazin_offer = !isset($request->id_market) ? $Magazin_offer :
                $Magazin_offer->where('markets.id_market_mains', $request->id_market);

            $Magazin_offer=$Magazin_offer->where('flag',1)
                ->orderBy('id','DESC')->get();

            $alloffer=['code'=>'406',
                'message'=>'success get data',
                'status'=>'success',
                'data' =>['typeFilter'=>'main', $Magazin_offer->toArray()]];
        }
       if($request->id_cat)
       {
           $alloffer=['code'=>'406',
               'message'=>'success get data',
               'status'=>'success',
               'data'=>''];
           $array=[];

           if($Magazin_offer)
                {
                    foreach ($Magazin_offer as $value)
                    {
                        $value->pages()->where('id_catags',$request->id_cat)->get();
                        $array = array_merge($value->pages()->select('id','image','alt')
                            ->where('id_catags',$request->id_cat)->get()->toArray(), $array);
                    }
                    $alloffer['data'][]=['typeFilter'=>'sub', $array];
                }
                else
                {
                    $Magazin_offer=Magazin_offer::where('flag',1)->get();
                    foreach ($Magazin_offer as $value)
                        {
                            $value->pages()->where('id_catags',$request->id_cat)->get();
                            $array = array_merge($value->pages()->select('id','image','alt')
                                ->where('id_catags',$request->id_cat)->get()->toArray(), $array);
                        }
                    $alloffer['data'][]=['typeFilter'=>'sub', $array];
                }
       }
        return $alloffer;
    }

    public function DoRatingOffer(Request $request)
    {
        if(($request->id_user)&&($request->id_offer)&&($request->value))
        {
            $RateingOffer=new RateingOffer;
            $RateingOffer->id_user=$request->id_user;
            $RateingOffer->id_offer=$request->id_offer;
            $RateingOffer->value=$request->value;
            $RateingOffer->save();
            $this->calRatingOffer($request->id_offer);
            $Magazin_offer=Magazin_offer::select('id','Rate')->
            where('id',$request->id_offer)->first();
            $alloffer=['code'=>'406',
                'message'=>'success Rateing Offer',
                'status'=>'success',
                'data' =>$Magazin_offer];
            return $alloffer;
        }
         return ['code'=>'405',
             'message'=>'Error Rateing Offer',
             'status'=>'success',
             'data' =>''];
    }

    public function getaddress($id)
    {
        $Address=Address::select('id','addresse')->where('id_p',$id)->get();
        return ['code'=>'405',
            'message'=>'Error Rateing Offer',
            'status'=>'success',
            'data' =>$Address] ;
    }

    public function market($id)
    {
        $market_mains_lan=market_mains_lan::select('id_market_mains as id','name')->
             join('market_mains', 'market_mains.id', '=', 'market_mains_lans.id_market_mains')->
            where('id_language',session()->get('langid'))->
            where('id_user',$id)->
            get();

        return ['code'=>'406',
            'message'=>'success get data',
            'status'=>'success',
            'data' =>$market_mains_lan->toArray()];
    }

    public function GetDatailesMarketUser($id_market,$id_black)
    {
        $Market=Market::select('email','phone','lat','lan')->
        join('market_mains', 'market_mains.id', '=', 'markets.id_market_mains')->
        where('market_mains.id',$id_market)->
        where('markets.id_address',$id_black)->
        get();

        return ['code'=>'406',
            'message'=>'success get data',
            'status'=>'success',
            'data' =>$Market->toArray()];
    }

    public function GetCat()
    {
        $catagsLan=catagsLan::select('id_catags as id','name','catags.logo as image')->
        join('catags', 'catags.id', '=', 'catags_lans.id_catags')->
        where('id_language',session()->get('langid'))->
        get();

        return ['code'=>'406',
            'message'=>'success get data',
            'status'=>'success',
            'data' =>$catagsLan->toArray()];
    }

    public function checkUserRate(Request $request)
    {
        if(RateingOffer::where('id_user',$request->id_user)->where('id_offer',$request->id_offer)->first())
        {
            return
                    $alloffer=['code'=>'406',
                        'message'=>'success get data',
                        'status'=>'success',
                        'data' =>'false'];
        }
        return $alloffer=['code'=>'406',
            'message'=>'success get data',
            'status'=>'success',
            'data' =>'true'];
    }

    public function store(Request $request)
    {
        //$type=explode("image/", explode(";base64,",$request->MainImage)[0]);
        $MarketMain=MarketMain::firstOrNew(['id' => $request->MarketID]);
        $logomarket=logomarket::firstOrNew(['id_market_main' => $request->MarketID]);
        $MarketMain->id_user=$request->UserID;
        $MarketMain->save();
        $logomarket->id_market_main=$MarketMain->id;
        $logomarket->save();

        if((($request->NewMarketNameArabic) || ($request->NewMarketNameEnglish))&&($request->NewMarketLogo))
        {
            //logo new
            $logo=Image::make(base64_decode(explode(";base64,",$request->NewMarketLogo)[1]));
            $logo->save(public_path().'/images/offersimages/logo/'.$logomarket->id.'.png');
            $logomarket->logo=$logomarket->id.'.png';
            $logomarket->save();

            $market_mains_lan_a=market_mains_lan::firstOrNew(['id_market_mains' => $MarketMain->id,'id_language'=>1]);
            $market_mains_lan_e=market_mains_lan::firstOrNew(['id_market_mains' => $MarketMain->id,'id_language'=>2]);

            $tr = new TranslateClient(); // Default is from 'auto' to 'en'
            $tr->setUrlBase('http://translate.google.cn/translate_a/single');

            //name market
            if($request->NewMarketNameArabic)
            {
                $market_mains_lan_a->name=$request->NewMarketNameArabic;
                $market_mains_lan_a->id_language=1;
                $market_mains_lan_a->id_market_mains=$MarketMain->id;
            }
            else
            {
                $market_mains_lan_a->name=$tr->setSource('en')->setTarget('ar')->translate($request->NewMarketNameEnglish);
                $market_mains_lan_a->id_language=1;
                $market_mains_lan_a->id_market_mains=$MarketMain->id;
            }
            if($request->NewMarketNameEnglish)
            {
                $market_mains_lan_e->name=$request->NewMarketNameEnglish;
                $market_mains_lan_e->id_language=2;
                $market_mains_lan_e->id_market_mains=$MarketMain->id;

            }
            else
            {
                $market_mains_lan_e->name=$tr->setSource('ar')->setTarget('en')->translate($request->NewMarketNameArabic);
                $market_mains_lan_e->id_language=2;
                $market_mains_lan_e->id_market_mains=$MarketMain->id;
            }
            $market_mains_lan_e->save();
            $market_mains_lan_a->save();

        }
        $Market= Market::firstOrNew(['id_address' => $request->BlockID,'email' => $request->MarketEmail,
            'phone' => $request->MarketPhone,'id_market_mains' => $MarketMain->id]);
        $Market->id_address= $request->BlockID;
        $Market->email= $request->MarketEmail;
        $Market->phone= $request->MarketPhone;
        $Market->id_market_mains= $MarketMain->id;
        $Market->lan= $request->MapLng;
        $Market->lat= $request->MapLat;
        $Market->save();

        $Magazin_offer=new Magazin_offer;
        $Magazin_offer->id_market=$Market->id;
        $Magazin_offer->shareurl='wwwss';
        $Magazin_offer->dataAppear=Carbon\Carbon::parse($request->ApperanceDate)->format('Y-m-d H:i:s');
        $Magazin_offer->from=Carbon\Carbon::parse($request->FromDate)->format('Y-m-d');
        $Magazin_offer->to=Carbon\Carbon::parse($request->ToDate)->format('Y-m-d');
        $Magazin_offer->des=$request->Description;
        $Magazin_offer->numOfpage=count($request->OtherImage)+1;
        $Magazin_offer->numOfshare=0;
        $Magazin_offer->views=0;
        $Magazin_offer->Rate=0;
        $Magazin_offer->flag=0;
        $Magazin_offer->flagcomment=0;
        $Magazin_offer->save();

        $marketname=$MarketMain->name()->where('id_language','=',session()->get('langid'))->pluck('name')->first();

        $order=1;
        $Mainimage=$request->Mainimage;
        $Pages=new Pages;
        $Pages->order=$order;
        $logo=Image::make(base64_decode(explode(";base64,", $Mainimage['ImageBase64'])[1]));
        $logo->save(public_path().'/images/offersimages/offerimages/'.$order.$Magazin_offer->id.'.png');
        $Pages->image=$order.$Magazin_offer->id.'.png';
        $Pages->alt=$marketname;
        $Pages->id_magazin_offers=$Magazin_offer->id;
        $Pages->id_catags= $Mainimage['ImageCategory'];
        $Pages->save();

        foreach($request->OtherImage as $value)
        {
            $Pages=new Pages;
            $order=$order+1;
            $Pages->order=$order;
            $logo=Image::make(base64_decode(explode(";base64,", $value['ImageBase64'])[1]));
            $logo->save(public_path().'/images/offersimages/offerimages/'.$order.$Magazin_offer->id.'.png');
            $Pages->image=$order.$Magazin_offer->id.'.png';
            $Pages->alt=$marketname;
            $Pages->id_magazin_offers=$Magazin_offer->id;
            $Pages->id_catags= $value['ImageCategory'];
            $Pages->save();
        }
        return $alloffer=['code'=>'406',
                         'message'=>'success get data',
                        'status'=>'success',
                        'data' =>'true'];
    }

    public function calRatingOffer($id)
    {
        $Magazin_offer=Magazin_offer::
        join('rateing_offers', 'rateing_offers.id_offer', '=', 'magazin_offers.id')->
        where('magazin_offers.id',$id)->
        select(DB::raw('SUM(rateing_offers.value) as SUM'),DB::raw('count(rateing_offers.value) as count'))->
        first();
        $rate=(float)($Magazin_offer->SUM)/(float)($Magazin_offer->count);
        $Magazin_offer=Magazin_offer::find($id);
        $Magazin_offer->Rate=number_format((float)$rate, 1, '.', '');
        $Magazin_offer->save();
        return $Magazin_offer;

    }

    public function get_ids_address(Request $request)
    {
        $ids=[];
        if($request->id_country)
        {
            if($request->id_city)
            {
                if($request->id_block)
                {
                    $ids=Address::find($request->id_block)->makeHidden(['addresse','id_p','created_at','updated_at']);
                }
                else
                {
                    $ids=Address::find($request->id_city)->Address()->select('id')->get();
                }
            }
            else
            {
                foreach (Address::find($request->id_country)->Address()->get() as $item) {
                    $ids=array_merge($ids,$item->Address()->select('id')->get()->toArray());
                }
            }
            return $ids;
        }
        else
        {
            return null;
        }
    }

}
