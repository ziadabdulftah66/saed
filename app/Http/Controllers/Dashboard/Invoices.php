<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class Invoices extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('users')->orderBy('id', 'desc')->paginate(PAGINATION_COUNT);

        return view('dashboard.invoices.index', compact('invoices'));
    }
    public function show($id)
    {
        $invoice = Invoice::with(['details','users'])->findOrFail($id);
        return view('dashboard.invoices.show', compact('invoice'));
    }
    public function create()
    {


        $users=User::get();

        return view('dashboard.invoices.create',compact('users'));
    }
    public function store(InvoiceRequest $request)
    {
        $data['user_id'] = $request->user_id;
        $data['invoice_number'] = $request->invoice_number;
        $data['invoice_date'] = $request->invoice_date;
        $data['sub_total'] = $request->sub_total;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['vat_value'] = $request->vat_value;
        $data['shipping'] = $request->shipping;
        $data['total_due'] = $request->total_due;

        $invoice = Invoice::create($data);

        $details_list = [];
        for ($i = 0; $i < count($request->product_name); $i++) {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['product_number'] = $request->product_number[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }

        $details = $invoice->details()->createMany($details_list);

        if ($details) {
            $user = User::find($request->user_id);
            $invoice = Invoice::latest()->first();
            $title='تمت اضافه فاتوره جديده';
            Notification::send($user, new \App\Notifications\Add_invoice($invoice,$title));
            return redirect()->route('admin.invoice')->with(['success' => 'تم ألاضافة بنجاح']);
        } else {
            return redirect()->route('admin.invoice')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('dashboard.invoices.edit', compact('invoice'));
    }
    public function update(Request $request, $id)
    {

        $invoice = Invoice::whereId($id)->first();


        $data['invoice_number'] = $request->invoice_number;
        $data['invoice_date'] = $request->invoice_date;
        $data['sub_total'] = $request->sub_total;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['vat_value'] = $request->vat_value;
        $data['shipping'] = $request->shipping;
        $data['total_due'] = $request->total_due;

        $invoice->update($data);
        $user = User::find($invoice->user_id);
        $invoice = Invoice::latest()->first();
        $title='تمديل فاتوره ';
        Notification::send($user, new \App\Notifications\Add_invoice($invoice,$title));

        $invoice->details()->delete();


        $details_list = [];
        for ($i = 0; $i < count($request->product_name); $i++) {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['product_number'] = $request->product_number[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }

        $details = $invoice->details()->createMany($details_list);

        if ($details) {
            return redirect()->route('admin.invoice')->with(['success' => 'تم التعديل بنجاح']);

        } else {
            return redirect()->route('admin.invoice')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->details()->delete();
        if ($invoice) {
            $invoice->delete();
            return redirect()->route('admin.invoice')->with(['success' => 'تم الحذف بنجاح']);
        } else {
            return redirect()->route('admin.invoice')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


}
