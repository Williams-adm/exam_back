<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::all();
        return new CustomerCollection($customer);
    }

    public function store(StoreCustomerRequest $request){
        Customer::create($request->all());
        return response()->json(['message' => "El cliente ha sido creado"], 201);
    }
}
