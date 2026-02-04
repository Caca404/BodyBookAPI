<?php

namespace App\Http\Controllers;

use App\Models\BodyStatus;
use Illuminate\Http\Request;

class BodyStatusController extends Controller
{
    public function getBodyStatuses($idUser)
    {
        return BodyStatus::select([
                "weight",
                "height",
                "neck",
                "waist",
                "hip",
                "created_at"
            ])
            ->where('user_id', $idUser)
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();
    }
}
