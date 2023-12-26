<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function allLoanApplications()
    {
        $loan = LoanApplication::latest()->get();
        return view('admin.loan_application.all', compact('loan'));
    }
}
