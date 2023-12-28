<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use App\Models\LoanTypes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function allLoanApplications()
    {
        $loan = LoanApplication::latest()->get();
        return view('admin.loan_application.all', compact('loan'));
    }

    public function loanApplication()
    {
        $loan_types = LoanTypes::all();
        return view('user.loan.application', compact('loan_types'));
    }

    public function loanStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $today = Carbon::now();
        $formattedDate = $today->format('Y-m-d');

        LoanApplication::insert([
            'name' => $data->name,
            'email' => $data->email,
            'amount' => $request->amount,
            'bank' => $request->bank,
            'account_number' => $request->account_no,
            'loan_type' => $request->loan_type,
            'installment_count' => $request->installment_count,
            'installment_amount' => $request->installment_amount,
            'amount_payable' => $request->amount_payable,
            'date_applied' => $formattedDate,
            'status' => 'not_approved',

        ]);
        toastr()->success('Loan applied successfully', 'Congrats');
        return redirect()->back();
    }
}
