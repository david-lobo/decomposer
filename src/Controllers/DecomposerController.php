<?php

namespace DavidLobo\Decomposer\Controllers;

use DavidLobo\Decomposer\Decomposer;
use Illuminate\Http\Request;
use Fhsinchy\Inspire\Inspire;

class DecomposerController
{
    public function __invoke(Decomposer $decomposer)
    {
        $decomposerApiKey = env('DECOMPOSER_API_KEY');
        $apiKey = request()->get('apiKey');
        $isAuthenticated = false;

        if (!empty($decomposerApiKey)) {
            if ($apiKey === $decomposerApiKey) {
                $isAuthenticated = true;
            }
        }

        if (!$isAuthenticated) {
            abort(403);
        }

        $packages = $decomposer->decompose();

        $phpVersion = phpversion();

        return response()->json([
            'type' => 'packagist',
            'php_version' => $phpVersion,
            'packages' => $packages
        ]);
    }
}
