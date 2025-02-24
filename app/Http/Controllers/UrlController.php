<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Services\UrlService;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    protected $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function encode(UrlRequest $request)
    {
        $encodedUrl = $this->urlService->encode($request->input('url'));
        return response()->json([
            'message' => 'URL encoded successfully',
            'encoded_url' => $encodedUrl,
        ]);
    }

    public function decode(Request $request)
    {
        $decodedUrl = $this->urlService->decode($request->input('url'));
        if (!$decodedUrl) {
            return response()->json([
                'message' => 'URL not found',
            ], 404);
        }
        return response()->json([
            'message' => 'URL decoded successfully',
            'decoded_url' => $decodedUrl,
        ]);
    }
}
