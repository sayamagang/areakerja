<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\FinanceActivity;
use App\Models\Financial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finance = FinanceActivity::paginate(3);
        // dd($finance);
        $riwayat = Financial::paginate(10);
        // dd($riwayat);
        return view('finance.dashboard', compact('finance','riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat = Financial::find($id);
        return view('finance.dashboard', compact(
            ['riwayat']
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $riwayat = Financial::find($id);
        $riwayat->id = $request->id;
        $riwayat->billing_name = $request->billing_name;
        $riwayat->date = $request->date;
        $riwayat->total = $request->total;
        $riwayat->payment_status = $request->payment_status;
        $riwayat->payment_method = $request->payment_method;
        $riwayat->save();

        return redirect('finance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = Financial::find($id);
        $riwayat->delete();
        return redirect('finance');
    }

    public function ajaxPagination(Request $request)
    {
        $items = FinanceActivity::paginate(1);
        if ($request->ajax()) {
            return view('data', compact('items'));
        }
        return view('items',compact('items'));
    }
}