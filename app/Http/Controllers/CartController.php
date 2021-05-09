<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends BaseController
{
    //Kontroler za rad sa korpom ( popunjavanje korpe, uklanjanje proizvoda iz korpe )
    //Proizvod se moze ubaciti u korpu i na strani za pojedinacni proizvod
    // Nisam uspeo da odradim checkout

    public function cart() {
        return view('pages.client.cart', $this->data);
    }

    public function changeQuantity(Request $request) {
        $cartContent = session()->get('cartContent');

        $id = $request->get('id');
        $quantity = (int)$request->get('quantity');

        if(!$cartContent) {
            $cartContent = [];
        }

        $existingIndex = null;

        foreach ($cartContent as $index => $item) {
            if($item->product->id == $id) {
                $existingIndex = $index;
                break;
            }
        }

        if($existingIndex !== null) {
            $cartContent[$existingIndex]->quantity = $quantity;
            session()->put('cartContent', $cartContent);
            return response()->json(session()->get('cartContent'), 200);
        }

    }

    public function deleteFromCart($id) {
        $cartContent = session()->get('cartContent');

        if(!$cartContent) {
            $cartContent = [];
        }

        foreach ( $cartContent as $index => $item) {
            if($item->product->id == $id) {
                unset($cartContent[$index]);
            }
        }

        session()->put('cartContent', $cartContent);

        return response()->json(session()->get('cartContent'), 200);
    }

    public function addToCart(Request $request) {
        $productModel = new Product();

        $id = $request->get('id');
        $quantity = $request->get('quantity');
        $product = $productModel->getOne($id);


        $cartContent = session()->get('cartContent');

        if(!$cartContent) {
            $cartContent = [];
        }

        $existingIndex = null;

        foreach ($cartContent as $index => $item) {
            if($item->product->id == $id) {
                $existingIndex = $index;
                break;
            }
        }

        if($existingIndex !== null) {
            $cartContent[$existingIndex]->quantity++;
        } else {
            $cartItem = new \stdClass();
            $cartItem->quantity = $quantity ? $quantity : 1;
            $cartItem->product = $product;

            array_push($cartContent, $cartItem);
        }

        session()->put('cartContent', $cartContent);
        $this->log->logActivity([
            'user_id' => $request->session()->get('user')->id,
            'activity' => 'Product added to cart'
        ]);
        return response()->json(session()->get('cartContent'), 200);
    }
}
