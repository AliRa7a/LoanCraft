<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use App\Models\LoanTypes;
use Illuminate\Http\Request;

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
}
