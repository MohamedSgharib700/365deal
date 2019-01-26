<?php

namespace App\Http\Controllers;

use App\Magazin_offer;
use Illuminate\Http\Request;
use App\Address;
use App\catag;
use App\MarketMain;
use Config;
use \Carbon\Carbon;
class MagazinOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
        $Magazin_offer=Magazin_offer::where('flag',1)->
        orderBy('id','DESC')->paginate(1);
        $Address=Address::where('id_p',0)->get();
        $MarketMain=MarketMain::all();
        $catag=catag::all();

        if ($request->ajax()) {
            $ids=$this->get_ids_address($request);
            if((!$request->id_cat)&&
            (isset($request->search)||isset($ids)||isset($request->id_marker)))
            {
                $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);
                $Magazin_offer=Magazin_offer::select('magazin_offers.*')->
                join('markets', 'magazin_offers.id_market', '=', 'markets.id')->
                join('market_mains', 'markets.id_market_mains', '=', 'market_mains.id')->
                join('market_mains_lans', 'market_mains_lans.id_market_mains', '=','market_mains.id')->
                where('market_mains_lans.id_language',session()->get('langid'));
                $Magazin_offer = !isset($ids) ? $Magazin_offer : 
                    $Magazin_offer->whereIn('markets.id_address', $ids);
                $Magazin_offer = !isset($request->id_marker) ? $Magazin_offer :
                    $Magazin_offer->where('markets.id_market_mains', $request->id_marker);
                $Magazin_offer = !isset($searchValues) ? $Magazin_offer :
                    $Magazin_offer=$Magazin_offer->where(function ($q) use ($searchValues)
                {foreach ($searchValues as $value)
                     {$q->orWhere('market_mains_lans.name', 'like', "%{$value}%");}});
                $Magazin_offer=$Magazin_offer->paginate(1);
            }
            return view('web.offers.offerload', compact('Magazin_offer'))->render();  
        }

        return view('web.offers.offers',
            compact('Magazin_offer','Address','catag','MarketMain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Magazin_offer  $magazin_offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Magazin_offer=Magazin_offer::find($id);

       return view('web.offers.showOffer',compact('Magazin_offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Magazin_offer  $magazin_offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Magazin_offer $magazin_offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Magazin_offer  $magazin_offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magazin_offer $magazin_offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Magazin_offer  $magazin_offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazin_offer $magazin_offer)
    {
        //
    }

    public function filter(Request $request)
    {
        $Magazin_offer=[];
        $ids=$this->get_ids_address($request);
        if(!$request->id_cat)//get id adress blocks
        {

            $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);
            $Magazin_offer=Magazin_offer::select('magazin_offers.id','market_mains_lans.name as marketName', 'logomarkets.logo as marketlogo'
                , 'magazin_offers.numOfpage', 'magazin_offers.numOfshare', 'magazin_offers.views',
                'magazin_offers.des', 'magazin_offers.from', 'magazin_offers.to', 'pages.image as mainimage')->
            join('markets', 'magazin_offers.id_market', '=', 'markets.id')->
            join('market_mains', 'markets.id_market_mains', '=', 'market_mains.id')->
            join('market_mains_lans', 'market_mains_lans.id_market_mains', '=',
                'market_mains.id')->
            join('logomarkets', 'logomarkets.id_market_main', '=', 'market_mains.id')->
            join('addresses', 'markets.id_address', '=', 'addresses.id')->
            join('pages', 'pages.id_magazin_offers', '=', 'magazin_offers.id')->

            where('pages.order', 1)->
            where('market_mains_lans.id_language',session()->get('langid'));

            $Magazin_offer = !isset($ids) ? $Magazin_offer : $Magazin_offer->whereIn('markets.id_address', $ids);

            $Magazin_offer = !isset($request->id_marker) ? $Magazin_offer :
                $Magazin_offer->where('markets.id_market_mains', $request->id_marker);

            $Magazin_offer = !isset($searchValues) ? $Magazin_offer :
                $Magazin_offer=$Magazin_offer->where(function ($q) use ($searchValues)
            {foreach ($searchValues as $value) {$q->orWhere('market_mains_lans.name', 'like', "%{$value}%");}})
                ->get();

            $alloffer=[
                'typeFilter'=>'main',
                'data' =>$Magazin_offer->toArray()];
        }
        if($request->id_cat)
        {
            $alloffer=[
                'typeFilter'=>'sub',
                'data'=>[]];
            $array=[];

            if($Magazin_offer)
            {
                foreach ($Magazin_offer as $value){
                    $value->pages()->where('id_catags',$request->id_cat)->get();
                    $array = array_merge($value->pages()->select('id','image','alt')
                        ->where('id_catags',$request->id_cat)->get()->toArray(), $array);
                }
                $alloffer['data'][]=$array;
            }
            else
            {
                $Magazin_offer=Magazin_offer::where('flag',1)->get();
                foreach ($Magazin_offer as $value){
                    $value->pages()->where('id_catags',$request->id_cat)->get();
                    $array = array_merge($value->pages()->select('id','image','alt')
                        ->where('id_catags',$request->id_cat)->get()->toArray(), $array);
                }
                $alloffer['data'][]=$array;
            }
        }
        return response()->json($alloffer);
    }

    public function getaddress(Request $request)
    {
        $Address=Address::select('id','addresse')->where('id_p',$request->id)->get();
        return response()->json($Address);
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
