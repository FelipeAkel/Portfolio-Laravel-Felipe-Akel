<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DashboardRepository;

class DashboardController extends Controller
{
    protected $dashboadRepository;

    public function __construct(
        DashboardRepository $dashboadRepository
    ){
        $this->dashboadRepository = $dashboadRepository;
    }

    public function index()
    {
        $totalCarreiraProfissional = $this->dashboadRepository::totalCarreiraProfissional();
        $totalHabilidade = $this->dashboadRepository::totalHabilidade();
        $totalPortfolio = $this->dashboadRepository::totalPortfolio();
        $totalServicos = $this->dashboadRepository::totalServicos();
        $totalFaleConosco = $this->dashboadRepository::totalFaleConosco();
        
        return view('template-admin.dashboard.dashboard', compact(
            'totalCarreiraProfissional', 'totalHabilidade', 'totalPortfolio', 'totalServicos', 'totalFaleConosco'
        ));
    }

    
}