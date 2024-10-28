<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\User;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $companies = Company::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);
    
        return view('companyWork.company.company', ['companies' => $companies]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('companyWork.company.company_create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        Company::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'is_active' => $request->is_active,
        ]);
    
        return redirect('/companies')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        // dd($request,$company);
        $company->update($request->validated());
    
        return redirect()->route('company.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if($company){
            $company->delete();
            return redirect()->back()->with('success','Company Has Been Deleted Successfully');
        }
        return redirect()->back()->with('error','Error While Deleting Company');
    }
}
