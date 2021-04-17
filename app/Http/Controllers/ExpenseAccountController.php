<?php

namespace App\Http\Controllers;

use App\Models\ExpenseAccount;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseAccountRequest;

class ExpenseAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Master Pengeluaran';
        
        $data = [
            'title' => $title,
        ];

        return view('expense_accounts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Biaya Pengeluaran';
        
        $data = [
            'title' => $title,
            'action' => 'create',
        ];
        
        return view('expense_accounts.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseAccountRequest $request)
    {
        ExpenseAccount::create($request->all());

        return redirect()->route('expense_accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseAccount  $expenseAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseAccount $expenseAccount)
    {
        $title = 'Biaya Pengeluaran';
        
        $data = [
            'title' => $title,
            'action' => 'show',
            'expense_account' => $expenseAccount
        ];
        
        return view('expense_accounts.form', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseAccount  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseAccount $expenseAccount)
    {
        $title = 'Tambah Data Biaya Pengeluaran';
        
        $data = [
            'title' => $title,
            'action' => 'edit',
            'expense_account' => $expenseAccount
        ];
        
        return view('expense_accounts.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseAccount  $expenseAccount
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseAccountRequest $request, ExpenseAccount $expenseAccount)
    {
        $expenseAccount->update($request->all());
        
        return redirect()->route('expense_accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseAccount  $expenseAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseAccount $expenseAccount)
    {
        $expenseAccount->delete();

        return redirect()->route('expense_accounts.index');
    }
}
