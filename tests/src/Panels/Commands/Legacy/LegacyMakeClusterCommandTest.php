<?php

use Filament\Support\Commands\FileGenerators\FileGenerationFlag;
use Filament\Tests\TestCase;

use function PHPUnit\Framework\assertFileExists;

uses(TestCase::class);

beforeEach(function () {
    config()->set('filament.file_generation.flags', [
        FileGenerationFlag::PANEL_CLUSTER_CLASSES_OUTSIDE_DIRECTORIES,
    ]);

    $this->withoutMockingConsoleOutput();
});

afterEach(function () {
    config()->set('filament.file_generation.flags', []);
});

it('can generate a cluster class', function () {
    $this->artisan('make:filament-cluster', [
        'name' => 'Blog',
        '--panel' => 'admin',
        '--no-interaction' => true,
    ]);

    assertFileExists($path = app_path('Filament/Clusters/Blog.php'));
    expect(file_get_contents($path))
        ->toMatchSnapshot();
});

it('can generate a cluster class in a nested directory', function () {
    $this->artisan('make:filament-cluster', [
        'name' => 'Website/Blog',
        '--panel' => 'admin',
        '--no-interaction' => true,
    ]);

    assertFileExists($path = app_path('Filament/Clusters/Website/Blog.php'));
    expect(file_get_contents($path))
        ->toMatchSnapshot();
});
