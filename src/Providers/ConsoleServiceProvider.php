<?php

namespace Elightwalk\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Elightwalk\Modules\Commands\CommandMakeCommand;
use Elightwalk\Modules\Commands\ControllerMakeCommand;
use Elightwalk\Modules\Commands\DisableCommand;
use Elightwalk\Modules\Commands\DumpCommand;
use Elightwalk\Modules\Commands\EnableCommand;
use Elightwalk\Modules\Commands\EventMakeCommand;
use Elightwalk\Modules\Commands\FactoryMakeCommand;
use Elightwalk\Modules\Commands\InstallCommand;
use Elightwalk\Modules\Commands\JobMakeCommand;
use Elightwalk\Modules\Commands\LaravelModulesV6Migrator;
use Elightwalk\Modules\Commands\ListCommand;
use Elightwalk\Modules\Commands\ListenerMakeCommand;
use Elightwalk\Modules\Commands\MailMakeCommand;
use Elightwalk\Modules\Commands\MiddlewareMakeCommand;
use Elightwalk\Modules\Commands\MigrateCommand;
use Elightwalk\Modules\Commands\MigrateRefreshCommand;
use Elightwalk\Modules\Commands\MigrateResetCommand;
use Elightwalk\Modules\Commands\MigrateRollbackCommand;
use Elightwalk\Modules\Commands\MigrateStatusCommand;
use Elightwalk\Modules\Commands\MigrationMakeCommand;
use Elightwalk\Modules\Commands\ModelMakeCommand;
use Elightwalk\Modules\Commands\ModuleDeleteCommand;
use Elightwalk\Modules\Commands\ModuleMakeCommand;
use Elightwalk\Modules\Commands\NotificationMakeCommand;
use Elightwalk\Modules\Commands\PolicyMakeCommand;
use Elightwalk\Modules\Commands\ProviderMakeCommand;
use Elightwalk\Modules\Commands\PublishCommand;
use Elightwalk\Modules\Commands\PublishConfigurationCommand;
use Elightwalk\Modules\Commands\PublishMigrationCommand;
use Elightwalk\Modules\Commands\PublishTranslationCommand;
use Elightwalk\Modules\Commands\RequestMakeCommand;
use Elightwalk\Modules\Commands\ResourceMakeCommand;
use Elightwalk\Modules\Commands\RouteProviderMakeCommand;
use Elightwalk\Modules\Commands\RuleMakeCommand;
use Elightwalk\Modules\Commands\SeedCommand;
use Elightwalk\Modules\Commands\SeedMakeCommand;
use Elightwalk\Modules\Commands\SetupCommand;
use Elightwalk\Modules\Commands\TestMakeCommand;
use Elightwalk\Modules\Commands\UnUseCommand;
use Elightwalk\Modules\Commands\UpdateCommand;
use Elightwalk\Modules\Commands\UseCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * The available commands
     *
     * @var array
     */
    protected $commands = [
        CommandMakeCommand::class,
        ControllerMakeCommand::class,
        DisableCommand::class,
        DumpCommand::class,
        EnableCommand::class,
        EventMakeCommand::class,
        JobMakeCommand::class,
        ListenerMakeCommand::class,
        MailMakeCommand::class,
        MiddlewareMakeCommand::class,
        NotificationMakeCommand::class,
        ProviderMakeCommand::class,
        RouteProviderMakeCommand::class,
        InstallCommand::class,
        ListCommand::class,
        ModuleDeleteCommand::class,
        ModuleMakeCommand::class,
        FactoryMakeCommand::class,
        PolicyMakeCommand::class,
        RequestMakeCommand::class,
        RuleMakeCommand::class,
        MigrateCommand::class,
        MigrateRefreshCommand::class,
        MigrateResetCommand::class,
        MigrateRollbackCommand::class,
        MigrateStatusCommand::class,
        MigrationMakeCommand::class,
        ModelMakeCommand::class,
        PublishCommand::class,
        PublishConfigurationCommand::class,
        PublishMigrationCommand::class,
        PublishTranslationCommand::class,
        SeedCommand::class,
        SeedMakeCommand::class,
        SetupCommand::class,
        UnUseCommand::class,
        UpdateCommand::class,
        UseCommand::class,
        ResourceMakeCommand::class,
        TestMakeCommand::class,
        LaravelModulesV6Migrator::class
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * @return array
     */
    public function provides()
    {
        $provides = $this->commands;

        return $provides;
    }
}
