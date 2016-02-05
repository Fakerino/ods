<?php

namespace ODSInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Installer\InstallerInterface;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;
use Composer\Repository\VcsRepository;
use Composer\Package\BasePackage;

class FakerinoInstaller extends LibraryInstaller implements InstallerInterface
{

    const ODS_DEFAULT_PATH = 'data';
    const ODS_REPO_URL = 'https://github.com/niklongstone/open-data-sample';

    public function supports($packageType)
    {
        return 'fakerino' === $packageType;
    }

    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);
        $this->getOdsInstaller()->install();

        return $this->installODS($repo, $package);
    }

    protected function installODS(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        @mkdir($this->getOdsPath(), 0000);

        $odsRepoConfig = ['url'=>ODSInstaller::ODS_REPO_URL];
        $odsRepository = new VcsRepository($odsRepoConfig, $this->io, new Composer\Config(), null, 'git');
        $odsPackage = new BasePackage('ODS');
        $odsIstaller = new LibraryInstaller($this->io, $this->composer);
        $odsIstaller->install($odsRepository, $odsPackage);
        $this->io->write('Open Data sample installed');

        return $this;
    }

    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        parent::update($repo, $initial, $target);
    }

    private function getOdsInstaller()
    {
        return new ODSInstaller($this->io, $this->composer);
    }
}