<?php

namespace DavidLobo\Decomposer;

class Decomposer {

    public function decompose() {
        $composerInfo = new \ComposerLockParser\ComposerInfo(base_path() . '/composer.lock');
        
        // default all packages
        $packages = $composerInfo->getPackages();

        $packages = collect($packages)->map(function($item) {
            $return = [
                'name' => $item->getName(),
                'version' => $item->getVersion()
            ];
            return $return;
        });

        return $packages->all();
    }
}
