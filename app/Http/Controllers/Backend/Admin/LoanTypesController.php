<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanTypes;
use Illuminate\Http\Request;

class LoanTypesController extends Controller
{
    public function allLoanTypes()
    {
        return view('admin.loan_type.all_loan_type');
    }

    public function addLoanType(Request $request)
    {
        $validateData = $request->validate([
            'loanType' => 'required',
        ]);
        $loanType = new LoanTypes();
        $loanType->name = $validateData['loanType'];

        $loanType->save();
        toastr()->success('Loan type added successfully', 'Congrats');
        return redirect()->back();
    }
}
