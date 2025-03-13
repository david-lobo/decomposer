<?php

namespace DavidLobo\Decomposer;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;

class Decomposer {
    public function justDoIt() {
        $response = Http::get('https://zenquotes.io/api/random');
        $response = $response->json()[0];
        //dd($response);
        return $response['q'] . ' -' . $response['a'];
    }

    public function decompose() {
        //$result = Process::run('composer show --format=json');
        //$output = $result->output();
        //$result = Process::path('../')->run('composer');

        //$x = $result->output();
        //$x = $result->errorOutput();
        //dd(base_path());
        $composerInfo = new \ComposerLockParser\ComposerInfo(base_path() . '/composer.lock');
        // default all packages
        $packages = $composerInfo->getPackages();
        //dd('x', $packages);
        $packages = collect($packages)->map(function($item) {
            $return = [
                'name' => $item->getName(),
                'version' => $item->getVersion()
            ];
            return $return;
        });
        //$packages = $packages->toArray();
        //dd($packages);
        return $packages->all();
    }
}
