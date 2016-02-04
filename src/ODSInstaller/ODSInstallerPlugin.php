<?php

namespace ODSInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class ODSInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new ODSInstaller($io, $composer, $downloader);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}