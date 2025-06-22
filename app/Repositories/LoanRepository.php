<?php

namespace App\Repositories;

use App\Models\LoanDetail;

class LoanRepository
{
    public function all()
    {
        return LoanDetail::all();
    }
}