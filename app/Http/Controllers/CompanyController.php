<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index() //class function
    {
        $companies = Company::all();
        return Inertia::render('Companies/Index', [ //index is the name of the component, found in the resources/js/pages/Companies/Index.vue file
            'companies' => $companies,
        ]);
    }
}
