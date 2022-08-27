<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Category;
use App\Models\section;
use Illuminate\Http\Request;
use DB;

class Sections extends Controller
{
    public function index()
    {
        $sections = section::orderBy('id','DESC') -> paginate(PAGINATION_COUNT);

        return view('dashboard.sections.index',compact('sections'));
    }
    public function create()
    {

        return view('dashboard.sections.create');
    }
    public function store(SectionRequest $request)
    {

        try {

            DB::beginTransaction();

            //validation

            $section = section::create($request->all());



            return redirect()->route('admin.sections')->with(['success' => 'تم ألاضافة بنجاح']);
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function edit($id)
    {

        //get specific categories and its translations
        $section = section::orderBy('id', 'DESC')->find($id);


        if (!$section)
            return redirect()->route('admin.sections')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.sections.edit', compact('section'));

    }
    public function update($id,SectionRequest $request)
    {
        try {
            //validation

            //update DB
            $section = section::find($id);

            if (!$section)
                return redirect()->route('admin.sections')->with(['error' => 'هذا القسم غير موجود']);


            $section->update($request->all());




            return redirect()->route('admin.sections')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $section = section::orderBy('id', 'DESC')->find($id);

            if (!$section)
                return redirect()->route('admin.sections')->with(['error' => 'هذا القسم غير موجود ']);

            $section->delete();

            return redirect()->route('admin.sections')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}
