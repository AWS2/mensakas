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
    public function indexBusinessAll()
    {
        $businessAll = Business::all();

        if (is_null($businessAll)) {
            $response = ['success' => false,'data' => 'Empty','message' => 'Comanda not found.'];
            return response()->json($response, 404);
        }

        $BusinessArray = $businessAll->toArray();

        $response = ['success' => true,'data' => $BusinessArray,'message' => 'Business retrieved successfully.'];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
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

     public function createBusiness()
    {
        
        /*$business = new Business;
        $business->name = $request->name;
        $business->phone = $request->phone;
        $business->logo = $request->logo;
        $business->image = $request->image;
        $business->active = $request->active;
        $business->save();
        return 'Business created successfully.';*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    public function storeBusiness(Request $request)
    {
       $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'id' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $business = Business::create($input);


        return $this->sendResponse($business->toArray(), 'Bussiness created successfully.');
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

    public function showBusiness(Business $id)
    {
        $businessShow = Business::find($id);


        if (is_null($businessShow)) {
            $response = ['success' => false,'data' => 'Empty','message' => 'Comanda not found.'];
            return response()->json($response, 404);
        }

        $BusinessArrayShow = $businessShow->toArray();

        $response = ['success' => true,'data' => $BusinessArrayShow,'message' => 'Business retrieved successfully.'];

        return response()->json($response, 200)->header('Content-Type', 'application/json');

        /*return $this->sendResponse($businessShow->toArray(), 'Business retrieved successfully.');*/
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

    public function editBusines($id)
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
        if (Business::where('id', $id)->exists()) {
        $business = Business::find($id);
        $business->name = is_null($request->name) ? $business->name : $request->name;
        $business->phone = is_null($request->phone) ? $business->phone : $request->phone;
        $business->logo = is_null($request->logo) ? $business->logo : $request->logo;
        $business->image = is_null($request->image) ? $business->image : $request->image;
        $business->save();

        return response()->json(["message" => "Business updated successfully"], 200);
        } else {
        return response()->json(["message" => "Business not found"], 404);
        
    }
    }

    public function updateBusiness(Request $request, Business $id)
    {
       
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

    public function destroyBusiness(Business $id)
    {
         $business= Business::findOrFail($id);
         $business->delete();


        return response()->json(['msg' =>'Business deleted successfully.']);
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
