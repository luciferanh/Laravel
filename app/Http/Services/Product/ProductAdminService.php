<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService
{

    public function getMenu()
    {
        return Menu::where('active',1)->get();
    }
    public function insert($request){
            $isValidPrice= $this->isValidPrice($request);
            if($isValidPrice){
                try {
                    $request['price'] = (int) $request['price'];
                    $request['price_sale'] = (int) $request['price_sale'];
                    $temp=$request->except('_token');
                    Product::create($temp);
                    Session::flash('success','Thêm sản phẩm thành công');
                }catch (\Exception $err){
                    Session::flash('error','Thêm sản phẩm thất bại');
                    Log::info($err->getMessage());
                    return false;
                }
            return true;
            }
            return false;
    }
    protected function isValidPrice($request){

        if((int)$request->input('price') !=0 &&(int) $request->input('price_sale') !=0 && $request->input('price_sale')>= $request->input('price')){
            Session::flash('error','Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if((int)$request->input('price') ==0){
            Session::flash('error','Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function get()
    {


        return  Product::with('menu')->orderByDesc('id')->paginate(15);
    }

    public function update($request,$product)
    {
        $isValidPrice= $this->isValidPrice($request);
        if(!$isValidPrice) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success','Cập nhật thành công');
        }catch (\Exception $err){

            Session::flash('success','Cập nhật thất bại, vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id',$request->input('id'))->first();
        if($product){
            $product->delete();
            return true;
        }
        return false;
    }
}
