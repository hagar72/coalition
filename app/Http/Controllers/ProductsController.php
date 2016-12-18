<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductsController extends Controller
{
    public function index(Request $request) {
        if ($request->isMethod('post')) {
            $this->createProduct($request);
        }
        
        $products = $users = DB::table('products')
            ->select('products.*', DB::raw('quantity * price as total'))
            ->get();
        file_put_contents('products.json', json_encode($products));
        return view('products/index', ['products' => $products]);
    }
    
    public function createProduct(Request $request) {
        $validationRules = \App\Product::$validationRules;

        $formValidation = \Validator::make($request->only(array_keys($validationRules)), $validationRules);

        if ($formValidation->fails()) {
            return redirect()->route('index')->with('errors', $formValidation->errors()->all())->withInput();
        } else {
            $product = new \App\product();
            $product->setName($request->get('name'))
                    ->setQuantity($request->get('quantity'))
                    ->setPrice($request->get('price'));
            $product->save();

            return json_encode(array('success', 'messages' => ['product added successfully']));
        }
            
    }
}
