<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Http\Controllers\Controller;
use App\Repository\IOrganizationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TypeaheadController extends Controller
{
    # Search Organization Name
    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Organization::where('name', 'LIKE', '%'. $query. '%')->get();
        return response()->json($filterResult);
    } 
}