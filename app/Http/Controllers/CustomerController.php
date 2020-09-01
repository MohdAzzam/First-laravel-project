<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisterdEvent;
use App\Mail\WelcomeNewUserMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Type\Integer;

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

        $customers = Customer::with('company')->paginate(5);
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
        $this->authorize('create',Customer::class);
        $customer = Customer::create($this->validateRequest());
        $this->storeImage($customer);
        event(new NewCustomerHasRegisterdEvent($customer));

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        $this->authorize('view',$customer);
        //the variable in method should be the same on the route
        //$customer=Customer::where('id',$customer)->firstOrFail();
        return view('customers.show', compact('customer'));

    }

    public function edit(Customer $customer)
    {
        $this->authorize('update',$customer);
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));

    }

    public function update(Customer $customer)
    {
//        $this->authorize('update',$customer);
        $customer->update($this->validateRequest());
        $this->storeImage($customer);

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('delete',$customer);
        $customer->delete();
        return redirect('customers');

    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phoneNumber' => 'required|min:10',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:7000',

        ]);
//        return tap(request()->validate([
//            'name' => 'required|min:3',
//            'email' => 'required|email',
//            'phoneNumber' => 'required|min:10',
//            'active' => 'required',
//            'company_id' => 'required'
//        ]), function () {
//            if (\request()->hasFile('image')) {
//                \request()->validate([
//                    'image' => 'file|image|max:7000',
//                ]);
//            }
//        });
    }

    private function storeImage($customer)
    {
        //image returning the uploaded file class
        if (\request()->has('image')){
            $customer->update([
                'image'=>\request()->image->store('uploads','public'),
            ]);
        }
        $image =Image::make(public_path('storage/'.$customer->image))->fit(200,200);
        $image->save();
    }
}
