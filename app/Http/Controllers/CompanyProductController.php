<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyProductRequest;
use App\Http\Requests\UpdateCompanyProductRequest;
use App\Models\CompanyProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CompanyProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $products = CompanyProduct::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('company_id', 'like', "%{$search}%");
        })->paginate(10);
    
        return view('companyWork.product.product', ['products' => $products]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd($company_id);
        return view('companyWork.product.product_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyProductRequest $request)
    // public function store(Request $request)
    {
        $imagePath = $request->file('image')->store('product_images', 'public');
        
    
        CompanyProduct::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'price' => $request->price,
            'image_path' => $imagePath,
        ]);
    
        return redirect('/company-products')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyProduct $companyProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyProduct $companyProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyProductRequest $request, CompanyProduct $companyProduct)
    {
        $data = $request->validated();
    
        if ($request->hasFile('image')) {
            if ($companyProduct->image_path && file_exists(storage_path('app/public/' . $companyProduct->image_path))) {
                unlink(storage_path('app/public/' . $companyProduct->image_path));
            }
    
            $imagePath = $request->file('image')->store('company_products', 'public');
    
            $data['image_path'] = $imagePath;
        }
    
        $companyProduct->update($data);
    
        return redirect()->route('companyProduct.index')->with('success', 'Company Product updated successfully');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyProduct $companyProduct)
    {
        if($companyProduct){
            $companyProduct->delete();
            return redirect()->back()->with('success','Company Has Been Deleted Successfully');
        }
        return redirect()->back()->with('error','Error While Deleting Company');
    }
}
