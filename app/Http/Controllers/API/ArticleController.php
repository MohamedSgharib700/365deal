<?php

namespace App\Http\Controllers\API;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index( request $request)
    {
        try {
        

        $products = Products::select('id', 'titles','images', 'images', 'prics')->offset($request->offset)->limit(2)->get();

        return $products=['code'=>'201',
                         'message'=>'success get data',
                        'status'=>'success',
                        'data' => $products];
            }

            catch (\Exception $exception) {
            return ['code'=>'404',
                         'message'=>'success get data',
                        'status'=>'not found',
                        'data' => 'Error Server'];
        }
    }

    public function show($id)
    {
        try{
        $products = Products::find($id);

        if ($products instanceof Products) {
            return $products=['code'=>'201',
                         'message'=>'success get data',
                        'status'=>'success',
                        'data' => $products];
            }
        }

            catch (\Exception $exception) {
            return ['code'=>'404',
                         'message'=>'not found product data',
                        'status'=>'not found',
                        'data' => 'Error Server'];
        }
        

        
    }

    public function store(Request $request)
    {
         
            $products = Products::create($request->json()->all());
            return response()->json([
                         'code'=>'201',
                         'message'=>'success get data',
                        'status'=>'true',
                'data' => 'true'
            ], 201);
      
    }

    public function update(Request $request, $id)
    {
        $products = Products::find($id);

        if ($products instanceof Products) {
            $products->update($request->json()->all());
            return $products;
        }

        return response()->json([
            'error' => 'product not found'
        ], 404);
    }

    public function delete(Request $request, $id)
    {
        $products = Products::find($id);

        if ($products instanceof Products) {
            $products->delete();

            return response('Sucssufuly delete', 204);
        }

        return response()->json([
            'error' => 'product not found'
        ], 404);
    }
}
