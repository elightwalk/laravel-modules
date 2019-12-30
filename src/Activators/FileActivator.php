<?php

namespace Elightwalk\Modules\Activators;

use Illuminate\Cache\CacheManager;
use Illuminate\Config\Repository as Config;
use Illuminate\Container\Container;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Elightwalk\Modules\Contracts\ActivatorInterface;
use Elightwalk\Modules\Module;

class FileActivator implements ActivatorInterface
{
    /**
     * Laravel cache instance
     *
     * @var CacheManager
     */
    private $cache;

    /**
     * Laravel Filesystem instance
     *
     * @var Filesystem
     */
    private $files;

    /**
     * Laravel config instance
     *
     * @var Config
     */
    private $config;

    /**
     * @var string
     */
    private $cacheKey;

    /**
     * @var string
     */
    private $cacheLifetime;

    /**
     * Array of modules activation statuses
     *
     * @var array
     */
    private $modulesStatuses;

    /**
     * File used to store activation statuses
     *
     * @var string
     */
    private $modulesFile;

    public function __construct(Container $app)
    {
        $this->cache = $app['cache'];
        $this->files = $app['files'];
        $this->config = $app['config'];
        $this->modulesFile = $this->config('modules');
        $this->cacheKey = $this->config('cache-key');
        $this->cacheLifetime = $this->config('cache-lifetime');
        $this->modulesStatuses = $this->getModulesStatuses();
    }

    /**
     * Get the path of the file where statuses are stored
     *
     * @return string
     */
    public function getStatusesFilePath(): string
    {
        return $this->modulesFile;
    }

    /**
     * @inheritDoc
     */
    public function reset(): void
    {
        if ($this->files->exists($this->modulesFile)) {
            $this->files->delete($this->modulesFile);
        }
        $this->modulesStatuses = [];
        $this->flushCache();
    }

    /**
     * @inheritDoc
     */
    public function enable(Module $module): void
    {
        $this->setActiveByName($module->getName(), true);
    }

    /**
     * @inheritDoc
     */
    public function disable(Module $module): void
    {
        $this->setActiveByName($module->getName(), false);
    }

    /**
     * @inheritDoc
     */
    public function hasStatus(Module $module, bool $status): bool
    {
        if (!isset($this->modulesStatuses[$module->getName()])) {
            return $status === false;
        }

        return $this->modulesStatuses[$module->getName()] === $status;
    }

    /**
     * @inheritDoc
     */
    public function setActive(Module $module, bool $active): void
    {
        $this->setActiveByName($module->getName(), $active);
    }

    /**
     * @inheritDoc
     */
    public function setActiveByName(string $name, bool $status): void
    {
        $this->modulesStatuses[$name] = $status;
        $this->writeFile();
        $this->flushCache();
    }

    /**
     * @inheritDoc
     */
    public function delete(Module $module): void
    {
        if (!isset($this->modulesStatuses[$module->getName()])) {
            return;
        }
        unset($this->modulesStatuses[$module->getName()]);
        $this->writeFile();
        $this->flushCache();
    }

    /**
     * Writes the activation statuses in a file
     */
    private function writeFile(): void
    {
        $code='<?php return '.var_export($this->modulesStatuses, true).';'.PHP_EOL;
        $this->files->put($this->modulesFile, $code);
    }

    /**
     * Reads the file that contains the activation statuses.
     * @return array
     * @throws FileNotFoundException
     */
    private function readFile(): array
    {
        if (!$this->files->exists($this->modulesFile)) {
            return [];
        }

        return include($this->modulesFile);
    }

    /**
     * Get modules statuses, either from the cache or from
     * the json statuses file if the cache is disabled.
     * @return array
     * @throws FileNotFoundException
     */
    public function getModulesStatuses(): array
    {

        if (!$this->config->get('modules.cache.enabled')) {
            return $this->readFile();
        }

        return $this->cache->remember($this->cacheKey, $this->cacheLifetime, function () {
            return $this->readFile();
        });
    }

    /**
     * Reads a config parameter under the 'activators.file' key
     *
     * @param  string $key
     * @param  $default
     * @return mixed
     */
    private function config(string $key, $default = null)
    {
        return $this->config->get('modules.activators.file.' . $key, $default);
    }

    /**
     * Flushes the modules activation statuses cache
     */
    private function flushCache(): void
    {
        $this->cache->forget($this->cacheKey);
    }
}
