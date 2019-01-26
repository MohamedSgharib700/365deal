<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesMain;
use App\ServicesIcan;
use App\Address;
use App\Currencies;
use App\ServicesMainCategories;
use App\ServicesMainlab_Val;
use App\ServicesSub;
use App\ServicesValText;
use App\ServicesMainlabalAttributvalue;
use App\ServicesSubImage;
use App\ServicesSubRate;
use \Carbon\Carbon;
use DB;
use Image;
class ApiServices extends Controller
{
    public function index()
    {
        $data='';
        foreach ($ServicesMain=ServicesMain::all() as $servicesMain)
        {
        $data[]=[
        'id'=>$servicesMain->id,
        'image'=>$servicesMain->image,
        'name'=>$servicesMain->name()->where('id_lang','=',session()->get('langid'))->pluck('name')->first(),
        'classname'=>$servicesMain->classname()->where('weborapi','=',2)->pluck('className')->first(),
        'color'=>$servicesMain->color()->pluck('color')->first()
            ];
        }
        return ['code'=>'406',
                'message'=>'success get data',
                'status'=>'success',
                'data' =>$data];
    }

    public function servicssub(Request $request)
    {
        Carbon::setLocale(session()->get("lang"));
        $ids=$this->get_ids_address($request);
        $ServicesSub=
            ServicesSub::select(
            'services_subs.id as id','services_subs.title as title',
            'services_subs.created_at as date','addresses.addresse as addresse',
            'services_icans.name as name','services_icans.icon as icon')->

        join('addresses', 'addresses.id', '=', 'services_subs.id_address')->
        join('services_icans', 'services_icans.id', '=', 'services_subs.id_ican');

        ///////////////////////  where filter  ////////////////////////
        $ServicesSub = !isset($request->id_rang_prices) ? $ServicesSub : $ServicesSub
            ->where('services_subs.id_rang_prices', $request->id_rang_prices);

        $ServicesSub = !isset($request->id_categories) ? $ServicesSub : $ServicesSub
            ->where('services_subs.id_categories', $request->id_categories);

        $ServicesSub = !isset($request->id_ican) ? $ServicesSub : $ServicesSub
            ->where('services_subs.id_ican', $request->id_ican);

        $ServicesSub = !isset($request->id_servicesMain) ? $ServicesSub : $ServicesSub
            ->where('services_subs.id_servicesMain', $request->id_servicesMain);

        $ServicesSub = !isset($ids) ? $ServicesSub : $ServicesSub
            ->whereIn('services_subs.id_address', $ids);

        if($request->OfferedRequired==0&&$request->OfferedRequired==1)
        {
            $ServicesSub = isset($request->OfferedRequired) ?
                $ServicesSub->where('services_subs.OfferedRequired', 1) :
                $ServicesSub->where('services_subs.OfferedRequired', 0);
        }

        $ServicesSub->where('services_subs.dataAppear','<=', Carbon::now()->format('Y-m-d H:i:s'));
        $ServicesSub->where('services_subs.flag',1);

        ///////////////////////sort////////////////////////
        if($request->sortprice==1)
        {
            $ServicesSub ->orderBy('services_subs.price','desc');
        }
        elseif($request->sortprice==0)
        {
            $ServicesSub->orderBy('services_subs.price','asc');
        }

        if($request->sortdate==1)
        {
            $ServicesSub ->orderBy('services_subs.created_at','desc');
        }
        elseif($request->sortdate==0)
        {
            $ServicesSub->orderBy('services_subs.created_at','asc');

        }

        if($request->sortview==1)
        {
            $ServicesSub ->orderBy('services_subs.views','desc');
        }
        elseif($request->sortview==0)
        {
            $ServicesSub->orderBy('services_subs.views','asc');
        }

        $ServicesSub= $ServicesSub->offset($request->offset)->limit(10)->get();

        $data=[];
        foreach($ServicesSub as $value)
        {
            $image='';
            $alt='';
            if($value->mainiamge()->where('order',1)->first())
            {
                $image=$value->mainiamge()->where('order',1)->first()->image;
                $alt=$value->mainiamge()->where('order',1)->first()->alt;
            }
            $data[]=[
                'id'=>$value->id,
                'mainpage'=>$image,
                'alt'=> $alt,
                'title'=>$value->title,
                'date'=>Carbon::createFromTimestampUTC(strtotime($value->date))->diffForHumans(),
                'name'=>$value->name,
                'icon'=>$value->icon,
                'block'=>$value->addresse
            ];
        }

        return ['code'=>'406',
                'message'=>'success get data',
                'status'=>'success',
                'data' =>$data];
    }

    public function show(Request $request)
    {
        $ServicesSub=ServicesSub::find($request->id);
        $ServicesSub->views=$ServicesSub->views+1;
        
        $data=[
            'id'=>$ServicesSub->id,
            'title'=>$ServicesSub->title,
            'Describe'=>$ServicesSub->Describe,
            'price'=>$ServicesSub->price,
            'shareurl'=>$ServicesSub->shareurl,
            'lan'=>$ServicesSub->lan,
            'lat'=>$ServicesSub->lat,
            'Rate'=>$ServicesSub->Rate,
            'views'=>$ServicesSub->views,
            'OfferedRequired'=>$ServicesSub->OfferedRequired,
            'dateformat'=>$ServicesSub->created_at->diffForHumans(),
            'date'=>Carbon::parse($ServicesSub->created_at)->format('Y-m-d'),
            'block'=> $ServicesSub->Address()->pluck('addresse')->first() ,
            'city'=>$ServicesSub->Address()->first()->Address_p()->pluck('addresse')->first(),
            'country'=>$ServicesSub->Address()->first()->Address_p()->first()->
            Address_p()->pluck('addresse')->first(),
            'currencies'=>[
            'name'=>$ServicesSub->Address()->first()->Address_p()->first()->
            Address_p()->first()->currencies()->pluck('name')->first(),
            'currencies'=>$ServicesSub->Address()->first()->Address_p()->first()->
            Address_p()->first()->currencies()->pluck(session()->get("lang"))->first(),
            'ican'=>$ServicesSub->Address()->first()->Address_p()->first()->
            Address_p()->first()->currencies()->pluck('icon')->first()
            ],
            'images'=>$ServicesSub->images()->orderBy('order','asc')->get(),
        ];
        $labels=$ServicesSub->categgory()->first()->labels()->
        select('services_mainlabels.id as id',
        'services_mainlabels.label'.session()->get("lang").' as label',
        'services_mainlabels.type')->get();
      foreach($labels as $label){
          if($label->value()->where('id_services_main',$ServicesSub->id)->first()){
            $data['otherData'][]=
            [
                'id'=>$label->id,'label'=>$label->label,'type'=>$label->type,
                'valueText'=>$label->textvalue()->pluck('text')->first(),
                'Attribut'=>
                $label->Attribut()->select('services_mainlabal_attributs.id as id',
                'name'.session()->get("lang").' as value')->
                join('services_mainlabal_attributvalues', 
                'services_mainlabal_attributs.id', '=', 'services_mainlabal_attributvalues.id_attribut')->
                join('services_mainlab__vals', 
                'services_mainlab__vals.id', '=', 'services_mainlabal_attributvalues.id_value')->
                join('services_mainlabels', 
                'services_mainlabels.id', '=', 'services_mainlab__vals.id_label')->
                get()
            ];
          }
      }
        return ['code'=>'406',
            'message'=>'success get data',
            'status'=>'success',
            'data' =>$data];
    }

    public function create(Request $request)
    {
        //id_cat
        $ServicesMainCategories=ServicesMainCategories::find($request->id_catagory);
        $labels=$ServicesMainCategories->labels()->
        select('services_mainlabels.id as id',
        'services_mainlabels.label'.session()->get("lang").' as label',
        'services_mainlabels.type')
        ->get();
      foreach($labels as $label){
          $data['otherData'][]=[
              'id'=>$label->id,'label'=>$label->label,'type'=>$label->type,
              'valueText'=>$label->textvalue()->pluck('text')->first(),
              'Attribut'=>$label->Attribut()->select('services_mainlabal_attributs.id as id',
              'name'.session()->get("lang").' as value')->get()
          ];

        }
        return ['code'=>'406',
        'message'=>'success get data',
        'status'=>'success',
        'data' =>$data];
     
    }

    public function store(Request $request)
    {
        $ServicesSub=new ServicesSub;
        $ServicesSub->title = $request->title  ;
        $ServicesSub->Describe = $request->Describe  ;
        $ServicesSub->price = $request->price  ;
        $ServicesSub->flag =0  ;
        $ServicesSub->Rate =0  ;
        $ServicesSub->views =0  ;
        $ServicesSub->shareurl =0  ;
        $ServicesSub->dataAppear =$request->dataAppear  ;
        $ServicesSub->numdayAppear = $request->numdayAppear;
        $ServicesSub->lan = $request->lan  ;
        $ServicesSub->lat = $request->lat  ;
        $ServicesSub->OfferedRequired = $request->OfferedRequired  ;
        $ServicesSub->id_address = $request->id_address  ;
        $ServicesSub->id_servicesMain = $request->id_servicesMain  ;
        $ServicesSub->id_user = $request->id_user  ;
        $ServicesSub->id_ican = $request->id_ican  ;
        $ServicesSub->id_categories = $request->id_categories;
        $ServicesSub->id_rang_prices =1;
        $ServicesSub->save();

        $order=1;
        foreach($request->OtherImage as $value)
        {
            $Image=new ServicesSubImage;
            $Image->order=$order;
            $Images=Image::make(base64_decode(explode(";base64,", $value)[1]));
            $Images->save(public_path().'/images/Services/Services/'.$order.$ServicesSub->id.'.png');
            $Image->image=$order.$ServicesSub->id.'.png';
            $Image->alt=$ServicesSub->title;
            $Image->id_services_sub=$ServicesSub->id;
            $Image->save();
            $order=$order+1;
        }
        foreach($request->otherData  as $otherdata)
        {
            $value=new ServicesMainlab_Val;
            $value->id_label=$otherdata['id'];
            $value->id_services_main=$ServicesSub->id;
            $value->save();
            if ($otherdata['type']=='text') 
            {
                $ServicesValText=new ServicesValText;
                $ServicesValText->text =$otherdata['valueText'];
                $ServicesValText->id_value =$value->id;
                $ServicesValText->save();
            }
            else
            {
                if(count($otherdata['Attribut'])>0)
                {
                    foreach($otherdata['Attribut'] as $valueAttr){
                        $ServicesMainlabalAttributvalue=new ServicesMainlabalAttributvalue;
                        $ServicesMainlabalAttributvalue->id_attribut= $valueAttr;
                        $ServicesMainlabalAttributvalue->id_value= $value->id;
                        $ServicesMainlabalAttributvalue->save();
                    }
                }
            }
        }
        return $request->all();
    }

    public function specialdetails(Request $request)
    {
        $data=[];
        $ServicesIcan=ServicesIcan::where('id_services',$request->id)->get();
        foreach ($ServicesIcan as $value)
        {
            $data[]=[
                'id'=>$value->id,
                'name'=>$value->name,
                'icon'=>$value->icon
            ];
        }
        return ['code'=>'406',
            'message'=>'success get data',
            'status'=>'success',
            'data' =>$data];
    }

    public function getaddress(Request $request)
    {
        $Address=Address::select('id','addresse')->where('id_p',$request->id)->get();
        return ['code'=>'405',
            'message'=>'Error Rateing Offer',
            'status'=>'success',
            'data' =>$Address] ;
    }

    public function RangPrice(Request $request)
    {
        $Currencies=Currencies::where('id_address',$request->id)->first();
            $data[]=[
                'name'=>$Currencies->name,
                'icon'=>$Currencies->icon,
                'rang'=>''
            ];
            foreach($Currencies->Range()->get() as $value)
            {
                $data['rang'][]=[
                    'id'=>$value->id,
                    'from'=>$value->from,
                    'to'=>$value->to,
                ];
            }

        return ['code'=>'405',
            'message'=>'Error Rateing Offer',
            'status'=>'success',
            'data' =>$data] ;
    }

    public function Categories(Request $request)
    {
        $ServicesMainCategories= ServicesMainCategories::
        select('id','name'.session()->get("lang").' as name' )->
        where('id_servicesMain',$request->id)->get();

        foreach($ServicesMainCategories as $value) {
            $data[] = [
                'id' => $value->id,
                'name' => $value->name];
        }
        return ['code'=>'405',
            'message'=>'Error Rateing Offer',
            'status'=>'success',
            'data' =>$data] ;
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

    public function DoRatingApiServices(Request $request)
    {
        if(($request->id_user)&&($request->id_Services)&&($request->value))
        {
            $ServicesSubRate=new ServicesSubRate;
            $ServicesSubRate->id_user=$request->id_user;
            $ServicesSubRate->id_servicesSub=$request->id_Services;
            $ServicesSubRate->value=$request->value;
            $ServicesSubRate->save();
            $this->calRatingServicesSubRate($request->id_Services);
            $ServicesSub=ServicesSub::select('id','Rate')->
            where('id',$request->id_Services)->first();
            $alloffer=['code'=>'406',
                'message'=>'success Rateing Offer',
                'status'=>'success',
                'data' =>$ServicesSub];
            return $alloffer;
        }
         return ['code'=>'405',
             'message'=>'Error Rateing Offer',
             'status'=>'success',
             'data' =>''];
    }

    public function checkUserRate(Request $request)
    {
        if(ServicesSubRate::where('id_user',$request->id_user)->where('id_servicesSub',$request->id_Services)->first())
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

    public function calRatingServicesSubRate($id)
    {
        $ServicesSub=ServicesSub::
        join('services_sub_rates', 'services_sub_rates.id_servicesSub', '=', 'services_subs.id')->
        where('services_subs.id',$id)->
        select(DB::raw('SUM(services_sub_rates.value) as SUM'),DB::raw('count(services_sub_rates.value) as count'))->
        first();
        $rate=(float)($ServicesSub->SUM)/(float)($ServicesSub->count);
        $ServicesSub=ServicesSub::find($id);
        $ServicesSub->Rate=number_format((float)$rate, 1, '.', '');
        $ServicesSub->save();
        return $ServicesSub;

    }

    public function Related()
    {
        Carbon::setLocale(session()->get("lang"));
        $ServicesSub=
            ServicesSub::select(
                'services_subs.id as id','services_subs.title as title',
                'services_subs.created_at as date','addresses.addresse as addresse',
                'services_icans.name as name','services_icans.icon as icon')->
            join('addresses', 'addresses.id', '=', 'services_subs.id_address')->
            join('services_icans', 'services_icans.id', '=', 'services_subs.id_ican')->
            where('services_subs.dataAppear','<=', Carbon::now()->format('Y-m-d H:i:s'))->
            where('services_subs.flag',1)->orderBy('services_subs.views','desc')
                ->limit(3)->get();

        foreach($ServicesSub as $value)
        {
            $image='';
            $alt='';
            if($value->mainiamge()->where('order',1)->first())
            {
                $image=$value->mainiamge()->where('order',1)->first()->image;
                $alt=$value->mainiamge()->where('order',1)->first()->alt;
            }
            $data[]=[
                'id'=>$value->id,
                'mainpage'=>$image,
                'alt'=> $alt,
                'title'=>$value->title,
                'date'=>Carbon::createFromTimestampUTC(strtotime($value->date))->diffForHumans(),
                'name'=>$value->name,
                'icon'=>$value->icon,
                'block'=>$value->addresse
            ];


        }

        return ['code'=>'406',
            'message'=>'success get data',
            'status'=>'success',
            'data' =>$data];

    }


}
