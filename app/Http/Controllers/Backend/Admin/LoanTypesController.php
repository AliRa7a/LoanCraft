<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanTypes;
use Illuminate\Http\Request;

class LoanTypesController extends Controller
{
    /**
     * Display all loan types.
     *
     * @return \Illuminate\View\View
     */
    public function allLoanTypes()
    {
        $loans = LoanTypes::orderBy('id')->get();
        return view('admin.loan_type.all_loan_type', compact('loans'));
    }

    /**
     * Add a new loan type.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLoanType(Request $request)
    {
        // Validate the incoming request
        $validateData = $request->validate([
            'loanType' => 'required',
        ]);

        // Create a new LoanTypes instance
        $loanType = new LoanTypes();
        $loanType->name = $validateData['loanType'];

        // Save the new loan type
        $loanType->save();

        toastr()->success('Loan type added successfully', 'Congrats');
        return redirect()->back();
    }

    /**
     * Delete a loan type.
     *
     * @param \App\Models\LoanTypes $loan_type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteLoanType(LoanTypes $loan_type)
    {
        // Delete the specified loan type
        $loan_type->delete();

        toastr()->success('Loan type deleted successfully', 'Congrats');
        return redirect()->back();
    }

    /**
     * Display the form to edit a loan type.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editLoanType($id)
    {
        // Find the loan type by ID
        $loanType = LoanTypes::findOrFail($id);
        return view('admin.loan_type.edit_loan_type', compact('loanType'));
    }

    /**
     * Update a loan type.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateLoanType(Request $request, $id)
    {
        // Find the loan type by ID
        $loanType = LoanTypes::findOrFail($id);

        // Validate the incoming request
        $validateData = $request->validate([
            'loanType' => 'required',
        ]);

        // Update the loan type with the new data
        $loanType->update([
            'name' => $validateData['loanType'],
        ]);

        toastr()->success('Loan type updated successfully', 'Congrats');
        return redirect()->route('admin.all.loan.types');
    }
}
