<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');
    
        // Fetch transactions based on the search query
        $transactions = Transaction::when($search, function ($query) use ($search) {
            return $query->where('transaction_id', 'like', "%{$search}%");
        })->get();

    
        // Debugging: Log the retrieved transactions
        \Log::info($transactions);
    
        return view('admin.transaction.transactions', compact('transactions', 'search'));
    }
    
    
    // Display a specific transaction by ID
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id); // Find a transaction by ID
        return view('admin.transactions.show', compact('transaction'));
    }
}
