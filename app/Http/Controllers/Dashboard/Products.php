<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\category;
use App\Models\Product;
use App\Models\section;
use Illuminate\Http\Request;
use DB;

class Products extends Controller
{
    public function index()
    {
        $products = Product::with(['category','section','brand'])->orderBy('id','DESC') -> paginate(PAGINATION_COUNT);

        return view('dashboard.products.index',compact('products'));
    }
    public function create()
    {
        $data=[];
        $data['categories']=category::get();
        $data['sections']=section::get();
        $data['brands']=Brand::get();

        return view('dashboard.products.create',$data);
    }
    public function store(ProductRequest $request)
    {

        try {

            DB::beginTransaction();

            //validation

            $product = Product::create($request->all());



            return redirect()->route('admin.products')->with(['success' => 'تم ألاضافة بنجاح']);
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function edit($id)
    {

        //get specific categories and its translations
        $product= Product::orderBy('id', 'DESC')->find($id);
        $data=[];
        $data['categories']=category::get();
        $data['sections']=section::get();
        $data['brands']=Brand::get();



        if (!$product)
            return redirect()->route('admin.products')->with(['error' => 'هذا المنتج غير موجود ']);

        return view('dashboard.products.edit',$data, compact('product'));

    }
    public function update($id,ProductRequest $request)
    {
        try {
            //validation

            //update DB
            $product = Product::find($id);

            if (!$product)
                return redirect()->route('admin.products')->with(['error' => 'هذا المنتج غير موجود']);


            $product->update($request->all());




            return redirect()->route('admin.products')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $product = Product::orderBy('id', 'DESC')->find($id);

            if (!$product)
                return redirect()->route('admin.products')->with(['error' => 'هذا المنتج غير موجود ']);

            $product->delete();

            return redirect()->route('admin.products')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
