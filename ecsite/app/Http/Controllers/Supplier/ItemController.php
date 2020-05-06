<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Http\Requests\ItemForm;
class ItemController extends Controller
{
    public function create()
    {
        return view('supplier.add');
    }

    public function store(ItemForm $request, Item $item)
    {
        $form = $request->all();
        $item->fill($form)->save();

        return redirect('/')->with('flash_message', '商品を追加しました');
    }
}
