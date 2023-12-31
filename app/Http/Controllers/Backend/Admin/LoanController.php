<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use App\Models\LoanTypes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    /**
     * Display all loan applications awaiting approval.
     *
     * @return \Illuminate\View\View
     */
    public function allLoanApplications()
    {
        $loan = DB::table('loan_applications')->where('status', 'not_approved')->get();
        return view('admin.loan_application.all', compact('loan'));
    }

    /**
     * Display all approved loan applications.
     *
     * @return \Illuminate\View\View
     */
    public function ApprovedLoanApplications()
    {
        $loan = DB::table('loan_applications')->where('status', 'approved')->get();
        return view('admin.loan_application.approved', compact('loan'));
    }

    /**
     * Display the loan application form for users.
     *
     * @return \Illuminate\View\View
     */
    public function loanApplication()
    {
        $loan_types = LoanTypes::all();
        return view('user.loan.application', compact('loan_types'));
    }

    /**
     * Store a new loan application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loanStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        // Get the current date
        $today = Carbon::now();
        $formattedDate = $today->format('Y-m-d');

        // Insert new loan application record
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

    /**
     * Display details of a specific loan application.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function loanDetail($id)
    {
        $loan = LoanApplication::findOrFail($id);
        return view('admin.loan_application.detail', compact('loan'));
    }

    /**
     * Update the status of a loan application.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        $loan = LoanApplication::find($id);

        // Update the loan status based on user input
        $loan->status = $request->has('status') ? 'approved' : 'not-approved';
        $loan->save();

        toastr()->success('Loan status updated successfully', 'Congrats');
        return redirect()->back();
    }

    /**
     * Display all approved loans for the authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function approvedLoan()
    {
        $email = auth()->user()->email;

        // Retrieve approved loans for the authenticated user
        $loan = DB::table('loan_applications')->where('email', $email)->where('status', 'approved')->get();
        return view('user.loan.approved', compact('loan'));
    }
}
