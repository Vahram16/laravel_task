<?php

namespace App\Http\Controllers;

use App\A;
use App\C;
use App\Events\VerificationEvent;
use App\Http\Requests\BuyProductRequest;
use App\Http\Requests\CheckIdParametr;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
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



//        $user = User::all();
//       $users =  User::where('name','Vahr')->get();
//        $users = User::sas()->get();
//        dd($users);



//        $user = User::find(4);
//
//        VerificationEvent::dispatch($user);









//
//        if (!$user->hasVerifiedEmail()) {
//            $user->markEmailAsVerified();
//        }
//        dd($user);


//        $path = 'vahramna?me=1';
//        $r = strpos($path, '?');
//      $t=  substr($path, 0, $r);
//dd($t);
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
        $this->productService->edit($validated);
        return $this->respondWithNoContent('Product updated successfully');


    }


    public function destroy(CheckIdParametr $request)
    {
        $validated = $request->validated();
        $this->productService->destroy($validated['id']);
        return $this->respondWithNoContent('Product deleted successfully');

    }

    public function buy(BuyProductRequest $request)
    {

        $validated = $request->validated();
        $product = $this->productService->buy($validated);
        if ($product['success'] == true) {
            return $this->respondWithNoContent('Success');
        }

        return $this->respondWithCustomData($product['errors'], 400, 'there are not enough products');


    }


}
