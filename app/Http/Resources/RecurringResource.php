<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecurringResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'frequency' => $this->frequency,
            'amount' => $this->amount,
            'reason' => $this->reason,
            'recipient' => $this->recipient_id,
        ];
    }
}
