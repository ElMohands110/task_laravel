<?php

namespace App\Http\Controllers;

use App\Http\Traits\TaskTrait;
use App\Models\ApiUser;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiTaskController extends Controller
{
    use TaskTrait;
    public function createUser(Request $request) {
        ApiUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'phone' => $request->phone,
        ]);
        return response()->json(['success' => true, 'message' => 'Successfully Created']);
    }

    public function updateUserInfo(Request $request) {
        $users = ApiUser::find($request->id);

        if (!$users)
            return response()->json(['success' => false, 'message' => 'Sorry, This ID Is Not Exist'])->setStatusCode(201);

        $users->update($request->all());

        return response()->json(['success' => true, 'message' => 'Updated Successfully']);
    }


    public function insertProduct(Request $request) {

        Product::create([
            'p_name' => $request['name'],
            'p_desc' => $request['desc'],
            'image' => $request['image'],
        ]);
        return response()->json(['success' => true, 'message' => 'Successfully Created Product']);
    }

    public function updateProduct(Request $request) {

        $products = Product::find($request->id);

        if (!$products)
            return response()->json(['success' => false, 'message' => 'Sorry, This ID Is Not Exist'])->setStatusCode(201);

        $products->update($request->all());

        return response()->json(['success' => true, 'message' => 'Updated Product Successfully'])->setStatusCode(100);
    }

    public function deleteProduct(Request $request) {

        $checkProduct = Product::find($request->id);

        if (!$checkProduct)
            return response()->json(['status' => false, 'message' => 'This Product Is Not Exist']);

        $checkProduct->delete();
        return response()->json(['status' => true, 'message' => 'Deleted Successfully']);
    }

    public function getOwnerProducts($id) {
        $users = ApiUser::with('product')->find($id);
        $products = $users->product;
        $users = ApiUser::get();
        return $users . $products;
    }

}
