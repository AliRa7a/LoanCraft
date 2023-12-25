<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanTypes;
use Illuminate\Http\Request;

class LoanTypesController extends Controller
{
    public function allLoanTypes()
    {
        $loans = LoanTypes::orderBy('id')->get();
        return view('admin.loan_type.all_loan_type', compact('loans'));
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

    public function deleteLoanType(LoanTypes $loan_type)
    {
        $loan_type->delete();
        toastr()->success('Loan type deleted successfully', 'Congrats');
        return redirect()->back();
    }

    public function editLoanType($id)
    {
        $loanType = LoanTypes::findOrFail($id);
        return view('admin.loan_type.edit_loan_type', compact('loanType'));
    }

    public function updateLoanType(Request $request, $id)
    {
        $loanType = LoanTypes::findOrFail($id);
        $validateData = $request->validate([
            'loanType' => 'required',
        ]);
        $loanType->update([
            'name' => $validateData['loanType'],
        ]);
        toastr()->success('Loan type updated successfully', 'Congrats');
        return redirect()->route('admin.all.loan.types');
    }
}
