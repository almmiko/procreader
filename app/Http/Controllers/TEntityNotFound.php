<?php

namespace App\Http\Controllers;


trait TEntityNotFound
{
    public function NotFoundResponse()
    {
        return response()->json([
            'message' => 'Record not found',
        ], 404);
    }
}