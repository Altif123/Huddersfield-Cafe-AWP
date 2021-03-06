<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;


class OrderController extends Controller
{
    public function addToOrder($menuItem)
    {
        $item = Menu::find($menuItem);
        \Cart::add(array(
            'id' => $item->id,
            'name' => $item->dish_name,
            'price' => $item->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $item->image
            )
        ));

        return redirect(route('order.show'))
            ->with('message', 'Added to order successfully');
    }

    public function show()
    {
        $items = \Cart::getContent();
        $cartTotal = \Cart::getTotal();
        return view('order.showBasket', compact('items', 'cartTotal'));
    }

    public function index(Order $order)
    {
        $items = $order->all();
        return view('order.index', compact('items'));
    }

    public function removeFromBasket($item)
    {
        \Cart::remove($item);
        return redirect(route('order.show'));
    }

    public function store($items)
    {
        $itemsArray = json_decode($items, true);
        if (count($itemsArray) > 0) {
            foreach ($itemsArray as $item) {
                $order = new Order();
                $order->menu_id = $item['id'];
                $order->user_id = auth()->user()->id;;
                $order->save();
            }
            \Cart::clear();
            return redirect()->route('order.show')->with('message', 'Order confirmed');
        } else {
            return redirect()->route('order.show')->withErrors('Please add items to the basket');
        }
    }

    public function destroy($itemId, Order $order)
    {
        $items = $order->where('menu_id', $itemId)->get();
        foreach ($items as $item) {
            $item->delete();
        }
        return redirect(route('order.index'));
    }

}

