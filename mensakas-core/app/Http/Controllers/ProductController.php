<?php

namespace App\Http\Controllers;

use App\Business;
use App\DescriptionTranslation;
use App\Language;
use App\Product;
use App\ProductDescription;
use App\ProductTag;
use App\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businesses = Business::all();
        $languages = Language::all();
        $products = Product::all()->whereNull('main_product_id');
        $tags = Tag::all();

        return view('products.create')
            ->with([
                'businesses' => $businesses,
                'languages' => $languages,
                'products' => $products,
                'tags' => $tags
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->business_id = $request->business_id;
        $product->price = $request->price;
        $product->avalible = $request->avalible;

        if (isset($request->mainProduct)) {
            $product->main_product_id = $request->mainProduct;
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

        $productTag = new ProductTag();
        $productTag->product_id = $product->id;
        $productTag->tag_id = $request->category;
        $productTag->save();

        return redirect(route('products.index'))->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $extras = Product::all()->where('main_product_id', '=', $product->id);
        return view('products.show')
            ->with([
                'product' => $product,
                'extras' => $extras
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $businesses = Business::all();
        $languages = Language::all();
        $products = Product::all()->whereNull('main_product_id');
        $tags = Tag::all();
        $extras = Product::all()->where('main_product_id', '=', $product->id);


        return view('products.edit')
            ->with([
                'businesses' => $businesses,
                'languages' => $languages,
                'products' => $products,
                'product' => $product,
                'tags' => $tags,
                'extras' => $extras
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->business_id = $request->business_id;
        $product->price = $request->price;
        $product->avalible = $request->avalible;

        $product->productTags[0]->tag_id = $request->category;
        $product->push();

        return redirect()->action(
            'ProductController@show',
            ['product' => $product->id]
        )->with('success', 'Product edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'))->with('success', 'Product deleted successfully!');;
    }
}
