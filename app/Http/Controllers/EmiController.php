<?php
namespace App\Http\Controllers;

use App\Repositories\EmiRepository;
use App\Services\EmiService;
use Illuminate\Http\Request;

class EmiController extends Controller
{
    protected $emiRepo;
    protected $emiService;

    public function __construct(EmiRepository $emiRepo, EmiService $emiService)
    {
        $this->emiRepo = $emiRepo;
        $this->emiService = $emiService;
    }

    public function processForm()
    {
        return view('emi.process');
    }

    public function process(Request $request)
    {
        $this->emiService->processEmiDetails();
        $emiDetails = $this->emiRepo->getAll();
        return view('emi.process', compact('emiDetails'));
    }
}