<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class Users extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC') -> paginate(PAGINATION_COUNT);

        return view('dashboard.users.index',compact('users'));
    }
    public function create()
    {
        return view('dashboard.users.create');
    }
    public function store(UserRequest $request)
    {

        try {

            DB::beginTransaction();

            //validation
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password),'show_password'=>$request->password]);
            }


            $user = User::create($request->all());



            return redirect()->route('admin.show_users')->with(['success' => 'تم ألاضافة بنجاح']);
            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.show_users')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $user = User::orderBy('id', 'DESC')->find($id);

            if (!$user)
                return redirect()->route('admin.users')->with(['error' => 'هذا العميل غير موجود ']);

            $user->delete();

            return redirect()->route('admin.users')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.users')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
