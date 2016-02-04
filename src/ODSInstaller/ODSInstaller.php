<?php

namespace ODSInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Installer\InstallerInterface;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;


class ODSInstaller extends LibraryInstaller implements InstallerInterface
{

    protected $odsPath = 'data';


    public function supports($packageType)
    {
        return 'fakerino' === $packageType;
    }

    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);
        return $this->installODS($repo, $package);
    }

    protected function installODS(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        @mkdir($this->odsPath, 0000);

        var_dump($this->downloadManager);

        return $this;
    }
}