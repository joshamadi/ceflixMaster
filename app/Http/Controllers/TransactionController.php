<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Model\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function index(Transaction $transaction){
        return TransactionResource::collection($transaction->latest()->get());
    }

    public function show(Transaction $transaction){
        if (empty($transaction))
            return response('Transaction not found', Response::HTTP_NOT_FOUND);
        else
        return new TransactionResource($transaction);
    }

    public function update(Request $request,Transaction $transaction){
        if (empty($transaction))
            return response('Transaction not found', Response::HTTP_NOT_FOUND);
        else
        $transaction->update($request->all());
        return response('Transaction has been updated', Response::HTTP_OK);
    }
}
