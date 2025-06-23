<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmiCalculatorController extends Controller
{
    public function showForm()
    {
        return view('emi.calculate');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'loan_amount' => 'required|numeric|min:1',
            'num_of_payment' => 'required|integer|min:1',
            'first_payment_date' => 'required|date',
            'last_payment_date' => 'required|date|after_or_equal:first_payment_date',
        ]);

        $emi = round($request->loan_amount / $request->num_of_payment, 2);

        return redirect()->route('emi.calculate.form')->with('emi', $emi);
    }
}