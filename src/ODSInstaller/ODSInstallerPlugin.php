<?php

namespace ODSInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class ODSInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new FakerinoInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}