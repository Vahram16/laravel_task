<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyProductRequest;
use App\Http\Requests\CheckIdParametr;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Option;
use App\Models\Product;
use App\Sevices\ProductService;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        $this->resourceItem = ProductResource::class;
        $this->resourceCollection = ProductCollection::class;

    }

    public function getALl()
    {
        $products = $this->productService->getAll();
        return $this->respondWithCollection($products);
    }

    public function test(Option $op, Product $product, Request $request)
    {
        $pr = Product::where('id', 9)->with('option')->first();
        dd($pr->option()->update(['m' => 99]));


    }

    public function create(ProductRequest $request)
    {
        $validated = $request->validated();
        $product = $this->productService->create($validated);
        return $this->respondWithItem($product);


    }


    public function getById(CheckIdParametr $request)
    {
        $validated = $request->validated();
        $product = $this->productService->getById($validated['id']);
        return $this->respondWithItem($product);

    }


    public function edit(EditProductRequest $request)
    {

        $validated = $request->validated();

        if (count($validated) < 2) {
            return $this->respondWithNoSuccess('No Content', 400);
        }
        $product = $this->productService->edit($validated);
        return  $this->respondWithNoContent('Product updated successfully');


    }


    public function destroy(CheckIdParametr $request)
    {
        $validated = $request->validated();
       $this->productService->destroy($validated['id']);
        return  $this->respondWithNoContent('Product deleted successfully');

    }
    public function buy(BuyProductRequest $request){


//        $arr = ['s'=>6,'l'=>1,'op'=>12,'sassaad'=>90,'m'=>1];
// $y =     array_intersect_key($arr,array_flip());
//
//
//        dd($y);

        $validated = $request->validated();

      $product =   $this->productService->buy($validated);
        if ($product['success'] == true ){
            return $this->respondWithNoContent('Success');
        }

        return $this->respondWithCustomData($product['errors'],400,'there are not enough products');



    }
}
