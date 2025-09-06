<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Throwable;

class CustomerController extends Controller
{
    public function index(){
        return CustomerResource::collection(Customer::all());
    }

    public function show(int $id){
        $exist = Customer::find($id);
        if(!$exist){
            return response()->json(['message' => 'Cliente no existente'], 404);
        }
        return new CustomerResource($exist);
    }

    public function store(StoreCustomerRequest $request){
        $validate = $request->validated();

        DB::beginTransaction();

        try{
            $customer = Customer::create([
                'name' => $validate['name'],
                'surnames' => $validate['surnames'],
                'phone' => $validate['phone'],
                'address' => $validate['address'],
                'gender_id' => $validate['gender_id'],
                'country_id' => $validate['country_id'],
            ]);

            Document::create([
                'number_doc' => $validate['number_doc'],
                'document_type_id' => $validate['document_type'],
                'customer_id' => $customer->id
            ]);

            DB::commit();

            return new CustomerResource($customer);

        }catch (Throwable $e){
            return response()->json([
                'error' => 'Error al crear el cliente',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(UpdateCustomerRequest $request, int $id){
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Cliente no existente'], 404);
        }

        $validate = $request->validated();

        DB::beginTransaction();

        try {
            $customer->update([
                'name' => $validate['name'],
                'surnames' => $validate['surnames'],
                'phone' => $validate['phone'],
                'address' => $validate['address'],
                'gender_id' => $validate['gender_id'],
                'country_id' => $validate['country_id'],
            ]);

            $customer->document->update([
                'number_doc' => $validate['number_doc'],
                'document_type_id' => $validate['document_type'],
            ]);

            DB::commit();

            return new CustomerResource($customer);
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error al actualizar el cliente',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id){
        $exist = Customer::find($id);
        if (!$exist) {
            return response()->json(['message' => 'Cliente no existente'], 404);
        }
        $exist->delete();
        return response()->json(['message' => 'Cliente eliminado'], 200);
    }
}
