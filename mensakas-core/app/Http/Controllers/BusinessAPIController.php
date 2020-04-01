<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Business;
use App\BusinessAddress;

class BusinessAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessAll = Business::all();

        if (is_null($businessAll)) {
            $response = ['success' => false,'data' => 'Empty','message' => 'Business not found.'];
            return response()->json($response, 404);
        }

        foreach ($businessAll as $business) {
          $businessAddress = $business->businessAddresses;
          $businessAddress->makeHidden(['id', 'business_id', 'created_at', 'updated_at']);
        }

        $businessArray = $businessAll->toArray();

        $response = ['success' => true,'data' => $businessArray,'message' => 'Business retrieved successfully.'];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $business = new Business;
        $business->name = $request->name;
        $business->phone = $request->phone;
        $business->logo = $request->logo;
        $business->image = $request->image;
        $business->active = $request->active;
        $business->save();

        $businessAddress = new BusinessAddress();
        $businessAddress->city = $request->city;
        $businessAddress->zip_code = $request->zip_code;
        $businessAddress->street = $request->street;
        $businessAddress->number = $request->number;
        $businessAddress->business_id = $business->id;
        $businessAddress->save();

        return response()->json(['message'=>'Business created successfully.'],200)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $businessShow = Business::find($id);


        if (is_null($businessShow)) {
            $response = ['success' => false,'data' => 'Empty','message' => 'Business not found.'];
            return response()->json($response, 404);
        }

        $schedules = $businessShow->schedules;
        $schedules->makeHidden(['id', 'business_id', 'created_at', 'updated_at']);
        $businessAddress = $businessShow->businessAddresses;
        $businessAddress->makeHidden(['id', 'business_id', 'created_at', 'updated_at']);

        $businessArrayShow = $businessShow->toArray();

        $response = ['success' => true,'data' => $businessArrayShow,'message' => 'Business retrieved successfully.'];

        return response()->json($response, 200)->header('Content-Type', 'application/json');
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
          $businessAddress = $business->businessAddresses;
          $businessAddress->city = is_null($request->city) ? $businessAddress->city : $request->city;
          $businessAddress->zip_code = is_null($request->zip_code) ? $businessAddress->zip_code : $request->zip_code;
          $businessAddress->street = is_null($request->street) ? $businessAddress->street : $request->street;
          $businessAddress->number = is_null($request->number) ? $businessAddress->number : $request->number;
          $business->push();

          return response()->json(["message" => "Business updated successfully"], 200);
        } else {
          return response()->json(["message" => "Business not found"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
        $dbBusinessZipcode->makeHidden(['created_at', 'updated_at']);

        if (count($dbBusinessZipcode) == 0) {
          return response()->json([
            'status' => 404,
            'msg' => 'No businesses found on zipcode '.$zipcode
          ])->header('Content-Type', 'application/json');
        }

        return response()->json([
          'status' => 200,
          'msg' => 'OK',
          'businesses' => $dbBusinessZipcode
        ])->header('Content-Type', 'application/json');
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

    /**
     * API function that returns a JSON with the businesses filtered by a column and a value.
     * Example: http://localhost:8000/api/businesses/filter/active/1 ("active" -> column, "1" -> value)
     * The filter for the columns "name" and "phone" it's a "contain" filter.
     * @param String $column
     * @param String $value
     * @return JSON
     */
    public function filterBusinesses($column, $value)
    {
      $dbBusinessColumns = Schema::getColumnListing('business');
      if (!in_array($column, $dbBusinessColumns)) {
        return response()->json([
          'status' => 404,
          'msg' => 'Column '.$column.' doesn\'t exist'
        ])->header('Content-Type', 'application/json');
      }

      if ($column == 'name' || $column == 'phone') {
        $dbBusinessFiltered = Business::where($column, 'LIKE' , '%'.$value.'%')->get();
      } else {
        $dbBusinessFiltered = Business::where($column, $value)->get();
      }
      $dbBusinessFiltered->makeHidden(['created_at', 'updated_at']);

      if (count($dbBusinessFiltered) == 0) {
        return response()->json([
          'status' => 404,
          'msg' => 'No businesses found'
        ])->header('Content-Type', 'application/json');
      }

      foreach ($dbBusinessFiltered as $business) {
        $businessAddress = $business->businessAddresses;
        $businessAddress->makeHidden(['id', 'business_id', 'created_at', 'updated_at']);
      }

      return response()->json([
        'status' => 200,
        'msg' => 'OK',
        'businesses' => $dbBusinessFiltered
      ])->header('Content-Type', 'application/json');
    }
}
