<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Occupant;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BillController extends Controller
{
    public function allBill(Request $request)
    {
        $query = DB::table('payments')->where('status', '!=', 'Lunas');

        if ($request->has('from_date') && $request->has('to_date')) {
            $fromDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->from_date)->startOfDay();
            $toDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->to_date)->endOfDay();
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $allPayment = $query->get();

        return view('payments.allBill', compact('allPayment'));
    }

    public function addBill()
    {
        $occupants = Occupant::all();
        return view('payments.addBill', compact('occupants'));
    }

    public function saveBill(Request $request)
    {
        $request->validate([
            'occ_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'jml_tagihan' => 'required|string|max:255',
            'from_date' => 'required|string|max:255',
            'due_date' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'info' => 'nullable|string|max:500',
        ]);

        DB::beginTransaction();
        try {
            $bill = new Payment();
            $bill->occ_id = $request->occ_id;
            $bill->name = $request->name;
            $bill->jml_tagihan = $request->jml_tagihan;
            $bill->from_date = $request->from_date;
            $bill->due_date = $request->due_date;
            $bill->status = $request->status;
            $bill->info = $request->info;
            $bill->save();

            DB::commit();
            return redirect()->route('form/allBill/page')->with('success', 'Payment successfully created');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create payment: ' . $e->getMessage());
        }
    }

    public function updateBill($bill_id)
    {
        $billEdit = Payment::find($bill_id);
        if (!$billEdit) {
            return redirect()->route('form/allBill/page')->with('error', 'Bill not found');
        }
        return view('payments.editBill', compact('billEdit'));
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'occ_id' => $request->occ_id,
                'name' => $request->name,
                'jml_tagihan' => $request->jml_tagihan,
                'from_date' => $request->from_date,
                'due_date' => $request->due_date,
                'status' => $request->status,
                'info' => $request->info,
            ];

            Payment::where('bill_id', $request->bill_id)->update($update);

            DB::commit();
            Log::info('Succeed updated bill with ID: ' . $request->bill_id);
            return redirect()->route('form/allBill/page');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to update bill: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $billId = $request->id;
            Log::info('Attempting to delete bill with ID: ' . $billId);

            $bill = Payment::findOrFail($billId);
            $bill->delete();

            DB::commit();
            Log::info('Successfully deleted bill with ID: ' . $billId);
            return redirect()->back()->with('success', 'Bill deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to delete bill: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete bill: ' . $e->getMessage());
        }
    }

    public function print(Request $request) {
        $query = DB::table('payments')->where('status', '!=', 'Lunas');

        if ($request->has('from_date') && $request->has('to_date')) {
            $fromDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->from_date)->startOfDay();
            $toDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->to_date)->endOfDay();
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $allPayment = $query->get();

        return view('payments.printBill', compact('allPayment'));
    }
}
