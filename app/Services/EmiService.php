<?php
namespace App\Services;

use App\Repositories\LoanRepository;
use App\Repositories\EmiRepository;
use Carbon\Carbon;

class EmiService
{
    protected $loanRepo;
    protected $emiRepo;

    public function __construct(LoanRepository $loanRepo, EmiRepository $emiRepo)
    {
        $this->loanRepo = $loanRepo;
        $this->emiRepo = $emiRepo;
    }

    public function processEmiDetails()
    {
        $loans = $this->loanRepo->all();

        // Find min and max dates
        $minDate = $loans->min('first_payment_date');
        $maxDate = $loans->max('last_payment_date');

        // Build months array
        $months = [];
        $start = Carbon::parse($minDate)->startOfMonth();
        $end = Carbon::parse($maxDate)->startOfMonth();
        while ($start <= $end) {
            $months[] = $start->format('Y_M');
            $start->addMonth();
        }

        // Drop and create emi_details table
        $this->emiRepo->dropAndCreateEmiDetailsTable($months);

        // Prepare EMI rows
        $rows = [];
        foreach ($loans as $loan) {
            $row = ['clientid' => $loan->clientid];
            foreach ($months as $month) {
                $row[$month] = 0.00;
            }

            $emi = round($loan->loan_amount / $loan->num_of_payment, 2);
            $emiMonths = [];
            $start = Carbon::parse($loan->first_payment_date)->startOfMonth();
            for ($i = 0; $i < $loan->num_of_payment; $i++) {
                $emiMonths[] = $start->copy()->addMonths($i)->format('Y_M');
            }

            $total = 0;
            foreach ($emiMonths as $i => $emiMonth) {
                if ($i == $loan->num_of_payment - 1) {
                    $emiValue = round($loan->loan_amount - $total, 2);
                } else {
                    $emiValue = $emi;
                    $total += $emi;
                }
                $row[$emiMonth] = $emiValue;
            }
            $rows[] = $row;
        }

        $this->emiRepo->insertEmiDetails($rows);
    }
}