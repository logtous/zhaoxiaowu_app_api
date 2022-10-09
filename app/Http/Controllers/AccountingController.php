<?php

namespace App\Http\Controllers;

use App\Models\Accounting;
use http\Client\Response;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accouting = Accounting::query()->where('date', $request->input('date'))->first();

        if ($accouting) {
            return Response()->json([
                'success' => true,
                'message' => 'ok',
                'data' => $accouting
            ]);
        }else{
            return Response()->json([
                'success' => false,
                'message' => 'fail',
                'data' => []
            ]);
        }

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
     * @param  \App\Models\Accounting  $accounting
     * @return \Illuminate\Http\Response
     */
    public function show(Accounting $accounting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounting  $accounting
     * @return \Illuminate\Http\Response
     */
    public function edit(Accounting $accounting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accounting  $accounting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $accouting = $request->input('json');
        $accouting = json_decode($accouting, true);
        $accouting['created_at'] = now();

        if (Accounting::query()->updateOrCreate($accouting, $accouting)) {
            return Response()->json([
                'success' => true,
                'message' => 'ok',
                'data' => $accouting
            ]);
        }else{
            return Response()->json([
                'success' => false,
                'message' => 'fail',
                'data' => []
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounting  $accounting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $accouting = Accounting::query()->where('t_id', $request->input('id'))->first();

        if ($accouting && Accounting::query()->where('t_id', $request->input('id'))->delete()) {
            return Response()->json([
                'success' => true,
                'message' => 'ok',
                'data' => $accouting
            ]);
        }else{
            return Response()->json([
                'success' => false,
                'message' => 'fail',
                'data' => []
            ]);
        }
    }

    public function type(Request $request)
    {
        $aciton = $request->input('action');

        $aciton_type = [
            ['name' => '收入', 'id' => 0],
            ['name' => '支出', 'id' => 1],
        ];

        return Response()->json([
            'success' => true,
            'message' => 'ok',
            'data' => $aciton_type[$aciton]
        ]);
    }
}
