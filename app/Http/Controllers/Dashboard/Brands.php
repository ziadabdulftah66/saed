<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use DB;

class Brands extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','DESC') -> paginate(PAGINATION_COUNT);

        return view('dashboard.brands.index',compact('brands'));
    }
    public function create()
    {

        return view('dashboard.brands.create');
    }
    public function store(BrandRequest $request)
    {

        try {

            DB::beginTransaction();

            //validation

            $brand = Brand::create($request->all());



            return redirect()->route('admin.brands')->with(['success' => 'تم ألاضافة بنجاح']);
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function edit($id)
    {

        //get specific categories and its translations
        $brand = Brand::orderBy('id', 'DESC')->find($id);


        if (!$brand)
            return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.brands.edit', compact('brand'));

    }
    public function update($id,BrandRequest $request)
    {
        try {
            //validation

            //update DB
            $brand = Brand::find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود']);


            $brand->update($request->all());




            return redirect()->route('admin.brands')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $brand = Brand::orderBy('id', 'DESC')->find($id);

            if (!$brand)
                return redirect()->route('admin.brands')->with(['error' => 'هذه الماركه غير موجود ']);

            $brand->delete();

            return redirect()->route('admin.brands')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
