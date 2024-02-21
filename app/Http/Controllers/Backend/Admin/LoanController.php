<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanTypes;
use Illuminate\Http\Request;
use App\Models\loanApplication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class LoanController extends Controller
{
    public function allLoanApplication(){
        $loanApply = DB::table('loan_applications')->where('status', 'not_approved')->get();
        // die(var_dump($loanApply));
        return view('admin.loan_application.all_loan_application', compact('loanApply')); 
    } 
    public function approvedLoanApplication(){
        $loanApply = DB::table('loan_applications')->where('status', 'approved')->get();
        // die(var_dump($loanApply));
        return view('admin.loan_application.all_loan_application', compact('loanApply')); 
    }
     public function loanApplication(){
        $loanTy = LoanTypes::all();
        return view('user.loan.application', compact('loanTy'));
    }
    public function storeLoanApplication(Request $request){
        $currentUserId = Auth::user()->id;
        $userData = User::find($currentUserId); 
        $today = Carbon::now();
        $formatDate = $today->format("Y-m-d");

        loanApplication::insert([
            'name' => $userData->name,
            'email' => $userData->email,
            'amount' => $request->amount,
            'bank' => $request->bank,
            'account_number' => $request->account_no,
            'loan_type' => $request->loan_type,
            'installment_count' => $request->installment_counts,
            'installment_amount' => $request->installment_amout,
            'amount_payable' => $request->amount_plus_ten_percent,
            'date_applied' => $formatDate,
            'status' => "not_approved",
        ]);
        toastr()->success("Loan Applied succesfully!", "Congrats");
        return redirect()->back();
    }

    public function loanDetails($id){
        $loanDetails = LoanApplication::findOrFail($id);
        // die(var_dump($loanDetails));
        return view('admin.loan_application.loan_application_details', compact('loanDetails')); 
    }
    public function toggleLoanStatus(Request $request, $id){
        $loanDetails = loanApplication::findOrFail($id);
        $loanDetails->status = ($request->has("status")) ? 'approved' :"not_approved";
        $loanDetails->save();
        toastr()->success("Loan Status Updated Succesfully!","Congrats");
        return redirect()->back();
}

    
}
