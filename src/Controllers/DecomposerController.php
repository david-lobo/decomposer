<?php

namespace DavidLobo\Decomposer\Controllers;

use DavidLobo\Decomposer\Decomposer;
use Illuminate\Http\Request;
use Fhsinchy\Inspire\Inspire;

class DecomposerController
{
    public function __invoke(Decomposer $decomposer) {
        $packages = $decomposer->decompose();

        $phpVersion = phpversion();

        return response()->json(['packages' => $packages, 'php_version' => $phpVersion]);
    }
}
