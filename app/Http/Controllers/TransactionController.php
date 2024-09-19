<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all(); // Fetch all transactions from the database
        return view('admin.transaction.transactions', compact('transactions'));
    }

    // Display a specific transaction by ID
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id); // Find a transaction by ID
        return view('admin.transactions.show', compact('transaction'));
    }
}
