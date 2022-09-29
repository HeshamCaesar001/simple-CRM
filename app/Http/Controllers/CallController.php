<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Lead $lead
     * @return void
     */
    public function create(Lead $lead)
    {
        $calls = Call::where('lead_id', $lead->id)->get();
       return view('backoffice.calls.creat', compact('lead', 'calls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Lead $lead
     * @return void
     */
    public function store(Request $request, Lead $lead)
    {
        $call = new Call();
        $call->user_id = Auth::user()->id;
        $call->lead_id = $lead->id;
        $call->description = $request->input('description');
        $call->status = $request->input('status');
        $call->save();
        return redirect()->route('leads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function show(Call $call)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Call $call)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        //
    }
}
