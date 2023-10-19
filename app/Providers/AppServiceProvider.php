<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

/* CategoryService */
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\CategoryService;

/* levelService */
use App\Services\Interfaces\LevelServiceInterface;
use App\Services\LevelService;

/* CategoryRepository */
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Eloquents\CategoryRepository;

/* LevelRepository */
use App\Repositories\Interfaces\LevelRepositoryInterface;
use App\Repositories\Eloquents\LevelRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         /*
            Các interface không thể dùng để khởi tạo đối tượng
            Binding interface với một lớp giúp chúng ta có thể dùng được
            Tắt dòng binding là thấy tai hại liền :)
        */
        /* Binding Services*/
        /* Category */
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        /* Lever */
        $this->app->singleton(LevelServiceInterface::class, LevelService::class);

        
        /* Binding Repositories*/
        /* Category */
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        /* Lever */
        $this->app->singleton(LevelRepositoryInterface::class, LevelRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}