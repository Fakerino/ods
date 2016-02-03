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
        return $this->doSomeWork($repo, $package);
    }

    protected function doSomeWork(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        @mkdir('data', 0000);

        return $this;
    }

    protected function getMyTargetPath(PackageInterface $package, \SplFileInfo $file)
    {

        $templatePath = $this->getTemplatePath($package);

        $relativeFilePath = substr($file->getPathname(), strlen($templatePath)+1);

        return getcwd() . DIRECTORY_SEPARATOR . $relativeFilePath;
    }

    protected function getTemplatePath($package)
    {
        $path = $this->getPackageBasePAth($package)
            . DIRECTORY_SEPARATOR
            . $this->templatePath;

        return $path;
    }

}