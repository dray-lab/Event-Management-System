<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getCustomers(){
        $customers = Customer::all();

        return response()->json(['customers' => $customers]);
    }  

    public function addCustomer(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'Customer added successfully', 'customer' => $customer]);
    }

    public function editCustomer(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers,email,' . $id],
        ]);

        $customer = Customer::find($id);

        if(!$customer){
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json(['message' => 'Customer updated successfully', 'customer' => $customer ]);
    }   

    public function deleteCustomer($id){
        $customer = Customer::find($id);

        if(!$customer){
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
} 