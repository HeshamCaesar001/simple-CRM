<?php

namespace App\Http\Controllers\API;

use App\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LeadController extends Controller
{
    public function index()
    {
        return Lead::paginate(5);
    }

    public function show(Lead $lead)
    {
        return $lead;
    }

    public function store(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'phone'=> ['required'],
            'email'=> ['email'],
            'address'=> 'required',
        ]);

        if ($validator->fails()) {
            return [
                'status'=> 405,
                'errors'=>$validator->errors()
            ];
        }

        $lead = new Lead();
        $lead->name = $request->input('name');
        $lead->phone = $request->input('phone');
        $lead->email = $request->input('email');
        $lead->address = $request->input('address');

        $lead->save();
        return $lead;
    }


    public function update(Request $request, Lead $lead)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'phone'=> [
                'required',
                Rule::unique('leads')->ignore($lead)
            ],
            'email'=> [
                'email',
                Rule::unique('leads')->ignore($lead),
            ],
            'address'=> 'required',
        ]);

        if ($validator->fails()) {
            return [
                'status'=> 405,
                'errors'=>$validator->errors()
            ];
        }
        
        $lead->name = $request->input('name');
        $lead->phone = $request->input('phone');
        $lead->email = $request->input('email');
        $lead->address = $request->input('address');

        $lead->save();
        return $lead;
    }
}
