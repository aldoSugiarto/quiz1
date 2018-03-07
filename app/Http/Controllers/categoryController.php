<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class categoryController extends Controller
{
  public function getCategory()
  {
    return Category::all();
  }

  public function show($id)
  {
    $data = Category::find($id)->where('id','=',$id)->value('id');
    $name = Category::find($id)->where('id','=',$id)->value('name');
    $arr = array();
    $aa['id'] = $data;
    $aa['name'] = $name;
    $it = Item::all()->where('category_id','=',$id);
    $aa['items'] = $it;

    return $aa;
  }

  

  public function insertCategory (Request $request)
  {
      $data = new Category();
      $data['name'] = $request -> input('name');
      $data -> save();

      return response([
        'msg'=>'success',
      ]);
  }

  public function deleteCategory(Request $request)
  {
      Category::where('id','=',$request->input('id'))->delete();
  }

  public function updateCategory(Request $request)
  {
      Category::where('id','=', $request->input('id'))
      ->update([
        'name' => $request->input('name')
      ]);

      return response([
        'msg' => 'success',
      ]);
  }


}
