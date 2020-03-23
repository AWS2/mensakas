<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class BusinessAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * API function that returns a JSON with all businesses of a determined zip code
     * @param String $zipcode
     * @return JSON
     */
    public function getBusinessesByZipcode($zipcode)
    {
        $dbBusinessZipcode = Business::join('business_address', 'business.id', '=', 'business_address.business_id')
                                      ->where('zip_code', '=', $zipcode)->get();

        return response()->json($dbBusinessZipcode)->header('Content-Type', 'application/json');
    }

    /**
     * API function that returns a JSON with all the products of a business.
     * If a business that doesn't exist or doesn't have products is selected, a error message will be sent.
     * @param Integer $id
     * @return JSON
     */
    public function getProductsOfBusiness($id)
    {
      $dbBusiness = Business::find($id);
      if ($dbBusiness == null) {
        return response()->json([
          'status' => 200,
          'msg' => 'This product doesn\'t exist'
        ])->header('Content-Type', 'application/json');
      }

      $businessProducts = $dbBusiness->products;
      if (count($businessProducts) == 0) {
        return response()->json([
          'status' => 200,
          'msg' => 'No products available'
        ])->header('Content-Type', 'application/json');
      }

      foreach ($businessProducts as $product) {
        $product->name = $product->productDescriptions->descriptionTranslations[0]->name;
        $product->description = $product->productDescriptions->descriptionTranslations[0]->description;
        unset($product->productDescriptions);
      }
      $businessProducts->makeHidden(['created_at', 'updated_at']);

      return response()->json([
        'status' => 200,
        'msg' => 'OK',
        'products' => $businessProducts
      ])->header('Content-Type', 'application/json');
    }
}
