<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Show the application dashboard.
     *
     */
    public function upload(Request $request) : JsonResponse
    {
        $uniqueId = $request->header('X-UniqueId');
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $result = $file->storeAs(sprintf('/public/%s/', $uniqueId), $filename);
        if($result) {
            return response()->json([
                'success' => true,
                'message' => 'Attachment uploaded',
                'data' => [
                    'name' => $filename
                ]
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Something went wrong',
        ]);
    }
}
