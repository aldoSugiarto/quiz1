<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class itemController extends Controller
{
    public function getItems()
    {
      return Item::all();
    }

    public function show($id)
    {
      $data = Item::find($id);
      $cat_id = Item::find($id)->where('id','=',$id)->value('category_id');
      $name = Category::find($cat_id);

      $aa['item'] = $data;
      $aa['item']['category'] = $name;

      return $aa;
    }

    public function insertItems (Request $request)
    {
        $data = new Item();
        $data['category_id'] = $request -> input('categoryID');
        $data['name'] = $request -> input('name');
        $data['price'] = $request -> input('price');
        $data['stock'] = $request -> input('stock');
        $data -> save();

        return response([
          'msg'=>'success',
        ]);
    }

    public function deleteItems(Request $request)
    {
        Item::where('id','=',$request->input('id'))->delete();
    }

    public function updateItems(Request $request)
    {
        Item::where('id','=', $request->input('id'))
        ->update([
          'name' => $request->input('name'),
          'desc' => $request->input('desc'),
          'price' => $request->input('price')
        ]);

        return response([
          'msg' => 'success',
        ]);
    }


}
