<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Business;
use App\ProductDescription;
use App\DescriptionTranslation;

class ProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $dbProducts = Product::all();
         if ($dbProducts == null) {
           return response()->json([
             'status' => 404,
             'msg' => 'No products found'
           ])->header('Content-Type', 'application/json');
         }

         foreach ($dbProducts as $product) {
           $product->name = $product->productDescriptions->descriptionTranslations[0]->name;
           $product->description = $product->productDescriptions->descriptionTranslations[0]->description;
           unset($product->productDescriptions);
         }
         $dbProducts->makeHidden(['created_at', 'updated_at']);

         return response()->json([
           'status' => 200,
           'msg' => 'OK',
           'products' => $dbProducts
         ])->header('Content-Type', 'application/json');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_id' => 'required|numeric',
            'price' => 'required',
            'available' => 'required',
            'name' => 'required',
            'description' => 'required',
            'language_id' => 'required|numeric|gte:1|lte:3'
        ]);
        if ($validator->fails()) {
          return response()->json(['status' => 500, 'msg' => $validator->errors()->all()])->header('Content-Type', 'application/json')->header('Content-Type', 'application/json');
        }
        $business = Business::find($request->business_id);
        if ($business == null) {
          return response()->json(['status' => 404, 'msg' => 'Business '.$request->business_id.' doesn\'t exist'])->header('Content-Type', 'application/json');
        }

        $product = new Product();
        $product->business_id = $request->business_id;
        $product->price = $request->price;
        $product->avalible = $request->available;
        if (isset($request->mainProduct)) {
          $product->main_product_id = $request->mainProduct;
        }
        if (isset($request->image)) {
          $product->image = $request->image;
        }
        $product->save();

        $productDescription = new ProductDescription();
        $productDescription->product_id = $product->id;
        $productDescription->save();

        $descriptionTranslation = new DescriptionTranslation();
        $descriptionTranslation->product_description_id = $productDescription->id;
        $descriptionTranslation->language_id = $request->language_id;
        $descriptionTranslation->name = $request->name;
        $descriptionTranslation->description = $request->description;
        $descriptionTranslation->save();

        return response()->json([
          'status' => 200,
          'msg' => 'Product created successfully'
        ])->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product == null) {
          return response()->json(['status' => 404, 'msg' => 'Product '.$id.' doesn\'t exist'])->header('Content-Type', 'application/json');
        }

        $product->name = $product->productDescriptions->descriptionTranslations[0]->name;
        $product->description = $product->productDescriptions->descriptionTranslations[0]->description;
        unset($product->productDescriptions);
        $product->makeHidden(['created_at', 'updated_at']);

        return response()->json([
          'status' => 200,
          'msg' => 'OK',
          'product' => $product
        ])->header('Content-Type', 'application/json');
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
        $product = Product::find($id);
        if ($product == null) {
          return response()->json(['status' => 404, 'msg' => 'Product '.$id.' doesn\'t exist.'])->header('Content-Type', 'application/json');
        }

        $product->price = is_null($request->price) ? $product->price : $request->price;
        $product->avalible = is_null($request->available) ? $product->avalible : $request->available;
        $product->image = is_null($request->image) ? $product->image : $request->image;
        $product->productDescriptions->descriptionTranslations[0]->name = is_null($request->name) ? $product->productDescriptions->descriptionTranslations[0]->name : $request->name;
        $product->productDescriptions->descriptionTranslations[0]->description = is_null($request->description) ? $product->productDescriptions->descriptionTranslations[0]->description : $request->description;
        $product->save();

        return response()->json([
          'status' => 200,
          'msg' => 'Product '.$id.' updated successfully'
        ])->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::find($id);
      if ($product == null) {
        return response()->json(['status' => 404, 'msg' => 'Product '.$id.' doesn\'t exist.'])->header('Content-Type', 'application/json');
      }
      $product->delete();
      return response()->json(['status' => 200, 'msg' => 'Product '.$id.' deleted successfully.'])->header('Content-Type', 'application/json');
    }
}
