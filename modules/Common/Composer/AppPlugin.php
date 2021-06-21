<?php

namespace Modules\Common\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class AppPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {

        $installer = new \Modules\Common\Composer\AppPluginInstall($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {

    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
    }
}
