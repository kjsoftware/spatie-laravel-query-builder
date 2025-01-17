<?php

namespace Spatie\QueryBuilder;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\QueryBuilder\App\Console\Commands\CacheForeignKeys;

class QueryBuilderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-query-builder')
            ->hasConsoleCommands(CacheForeignKeys::class)
            ->hasConfigFile();
    }

    public function registeringPackage(): void
    {
        $this->app->bind(QueryBuilderRequest::class, function ($app) {
            return QueryBuilderRequest::fromRequest($app['request']);
        });
    }

    public function provides(): array
    {
        return [
            QueryBuilderRequest::class,
        ];
    }
}
