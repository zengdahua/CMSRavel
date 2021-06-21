<?php

namespace Modules\Common\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class AppPluginInstall extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        $prefix = 'duxphp/duxravel-';
        if (strpos($package->getPrettyName(), $prefix, 0) === false) {
            throw new \Exception('Restrict package permissions in the name "duxphp/duxravel-"');
        }
        return 'testapp/' . substr($package->getPrettyName(), count($prefix));
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'duxravel-app' == $packageType;
    }
}
