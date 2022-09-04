<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Notification;

class Payments extends Controller
{
    public function index()
    {
        $payments = Payment::with('users')->orderBy('id', 'desc')->paginate(PAGINATION_COUNT);

        return view('dashboard.payments.index', compact('payments'));
    }
    public function create()
    {

        $users=User::get();

        return view('dashboard.payments.create',compact('users'));
    }
    public function store(PaymentRequest $request)
    {

       try {

            DB::beginTransaction();


            //validation
            $invoices=Invoice::where('invoice_number',$request->invoice_number)->get();
            foreach ($invoices as $invoice) {
                if ($invoice->user_id !=$request->user_id){
                    return redirect()->back()->with(['error' => 'هذا العميل لا يملك  تلك الفاتوره']);
                }
                if($request->payment_price > $invoice->total_due ){
                    return redirect()->back()->with(['error' => 'لايمكن للدفعه انت تكون اكثر من الفاتوره']);
                }
            }

            $payment = Payment::create($request->all());




            return redirect()->route('admin.payments')->with(['success' => 'تم ألاضافة بنجاح']);
            DB::commit();

     } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.payments')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }

    }
    public function edit($id)
    {
        $users=User::get();
        $payment = Payment::findOrFail($id);
        return view('dashboard.payments.edit', compact('payment','users'));

    }
    public function update($id,PaymentRequest $request)
    {
        try {
            //validation

            //update DB
            $payment = Payment::find($id);

            if (!$payment)
                return redirect()->route('admin.products')->with(['error' => 'هذا المنتج غير موجود']);

            $invoices=Invoice::where('invoice_number',$request->invoice_number)->get();
            foreach ($invoices as $invoice) {
                if ($invoice->user_id !=$request->user_id){
                    return redirect()->back()->with(['error' => 'هذا العميل لا يملك  تلك الفاتوره']);
                }
                if($request->payment_price > $invoice->total_due ){
                    return redirect()->back()->with(['error' => 'لايمكن للدفعه انت تكون اكثر من الفاتوره']);
                }
            }



            $payment->update($request->all());




            return redirect()->route('admin.payments')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.payments')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function destroy($id)
    {

        try {
            //get specific categories and its translations
            $payment = Payment::orderBy('id', 'DESC')->find($id);

            if (!$payment)
                return redirect()->route('admin.payments')->with(['error' => 'هذا الدفعه غير موجود ']);

            $payment->delete();

            return redirect()->route('admin.payments')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.payments')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
