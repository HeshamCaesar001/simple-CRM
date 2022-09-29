<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
 use Illuminate\Support\Facades\Validator;


class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
//        $leads = DB::table('leads')
//            ->join('users', 'users.id', '=', 'leads.sales_id')
//            ->select('users.name as u_name', 'leads.name as l_name')
//            ->get();
//
//        dd($leads);
        $table = view('backoffice.leads.table', [
            'leads'=> Lead::where('status', 1)->orderBy('name')->paginate(10),
        ]);

        return view('backoffice.leads.index', ['table'=> $table]);
    }
    
    public function table()
    {
        return view('backoffice.leads.table', [
            'leads'=> Lead::where('status', 1)->orderBy('name')->paginate(10),
        ]);
    }

    public function updateSalesByLeadId(Lead $lead)
    {
        return view('backoffice.leads.sales-options', [
            'sales'=> User::getAllSales(),
            'lead'=> $lead
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeadRequest $request)
    {
        $lead = new Lead();
        $lead->name = $request->input('name');
        $lead->phone = $request->input('phone');
        $lead->email = $request->input('email');
        $lead->address = $request->input('address');

        if($lead->save()){
            return redirect()->route('leads.index');
        } else {
            return [
                'status'=> 400,
                'message'=> 'not valid'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        return view('backoffice.leads.show', ['lead'=> $lead]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        return view('backoffice.leads.edit', ['lead'=> $lead]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {

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
            return back()
                ->withErrors($validator);
        }

        $lead->name = $request->input('name');
        $lead->phone = $request->input('phone');
        $lead->email = $request->input('email');
        $lead->address = $request->input('address');

        $lead->save();
        return redirect()->route('leads.show', $lead);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead = Lead::find($lead->id);
        $lead->delete();
        return back()->with('message', 'Deleted');
    }

    public function assigned(Request $request)
    {
        $lead = Lead::find($request->input('lead'));
        if ($request->input('sales') == 0) {
            $lead->sales_id = null;
        } else {
            $lead->sales_id = $request->input('sales');
        }
    
        if($lead->save()){
            return [
                'status'=> 200,
                'message'=> 'saved'
            ];
        } else {
            return [
                'status'=> 400,
                'message'=> 'not valid'
            ];
        }
    }
}
