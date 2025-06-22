<?php

namespace App\Http\Controllers;

use App\Repositories\LoanRepository;

class LoanController extends Controller
{
    protected $loanRepo;

    public function __construct(LoanRepository $loanRepo)
    {
        $this->loanRepo = $loanRepo;
    }

    public function index()
    {
        $loans = $this->loanRepo->all();
        return view('loan.index', compact('loans'));
    }
}