<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\RecurringResource;
use App\Models\RecurringTransfer;
use Illuminate\Http\Request;

class RecurringController
{
    public function index(Request $request)
    {
        return RecurringResource::collection(RecurringTransfer::forUser($request->user())->get());
    }

    public function store(Request $request)
    {

    }

    public function delete(RecurringTransfer $recurringTransfer)
    {
        $recurringTransfer->delete();

        return response()->noContent(201);
    }
}
