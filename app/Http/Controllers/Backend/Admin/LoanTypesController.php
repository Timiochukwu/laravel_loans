<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanTypes;

class LoanTypesController extends Controller
{

    public function loanType()
    {

        $loanType = LoanTypes::orderBy("id", "asc")->get();
        // $loanType = LoanTypes::latest()->get();
        return view('admin.loan_type.all_loan_type', compact('loanType'));
    }
    public function addLoanType(Request $request)
    {
        $validateData = $request->validate([
            'loanType' => 'required',
        ]);

        $loan_type = new LoanTypes();
        $loan_type->name = $validateData['loanType'];

        $loan_type->save();

        toastr()->success("Loan Type Created succesfully!", "Congrats");
        return redirect()->back();

    }

    public function deleteLoanType(LoanTypes $loan_type)
    {
        $loan_type->delete();
        toastr()->success("Loan Types deleted succesfully!", "Congrats");
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
        // die(var_dump($loanType));
        $validateData = $request->validate([
            'loan-type' => 'required',
        ]);
        $loanType->update([
            'name' => $validateData['loan-type'],
        ]);
        toastr()->success("Loan Types updated succesfully!", "Congrats");
        return redirect()->route('admin.all.loan.types');

    }
}
