<?php

namespace App\Http\Controllers;

use App\ServicesSub;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use DB;
use Image;
class ServicesSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ٌRequest $request)
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
        $ServicesSub=$ServicesSub->->paginate(10);  

        return view('',compact('ServicesSub'));
        
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ServicesMainCategories=ServicesMainCategories::find($request->id_catagory);
        $labels=$ServicesMainCategories->labels()->
        select('services_mainlabels.id as id',
        'services_mainlabels.label'.session()->get("lang").' as label',
        'services_mainlabels.type')
        ->get();   
        /*foreach($labels as $label){
            $data['otherData'][]=[
                'id'=>$label->id,'label'=>$label->label,'type'=>$label->type,
                'valueText'=>$label->textvalue()->pluck('text')->first(),
                'Attribut'=>$label->Attribut()->select('services_mainlabal_attributs.id as id',
                'name'.session()->get("lang").' as value')->get()
            ];
  
          }*/
        return view('',compact('labels'));
        
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServicesSub  $servicesSub
     * @return \Illuminate\Http\Response
     */
    public function show(ServicesSub $servicesSub)
    {
        $ServicesSub=ServicesSub::find($request->id);
        $ServicesSub->views=$ServicesSub->views+1;   

    /* 
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
    */

     return view('',compact('ServicesSub'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServicesSub  $servicesSub
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicesSub $servicesSub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServicesSub  $servicesSub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicesSub $servicesSub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicesSub  $servicesSub
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicesSub $servicesSub)
    {
        //
    }
}
