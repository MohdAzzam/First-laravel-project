<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    /*
     * ->except('index') if you want the user show the index and prevent any thing else use except
     * */
    }

    public function index()
    {

        $customers = Customer::all();
//      $companies=Company::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        Customer::create($this->validateRequest());
        return redirect('customer');
    }

    public function show(Customer $customer)
    {
        //the variable in method should be the same on the route
        //$customer=Customer::where('id',$customer)->firstOrFail();
        return view('customers.show', compact('customer'));

    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));

    }

    public function update(Customer $customer)
    {

        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customer');

    }
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric|min:10',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }
}
