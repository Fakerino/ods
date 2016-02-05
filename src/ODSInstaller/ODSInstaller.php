<?php

namespace ODSInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Installer\InstallerInterface;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;
use Composer\Repository\VcsRepository;
use Composer\Package\BasePackage;

class ODSInstaller extends LibraryInstaller implements InstallerInterface
{

    const ODS_DEFAULT_PATH = 'data';
    const ODS_REPO_URL = 'https://github.com/niklongstone/open-data-sample';

    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
    }

    public function update(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
    }
}