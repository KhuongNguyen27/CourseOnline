<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

/* CustomerService */
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\CustomerService;

/* CustomerRepository */
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Eloquents\CustomerRepository;

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
        $this->app->singleton(CustomerServiceInterface::class, CustomerService::class);


        
        /* Binding Repositories*/
        $this->app->singleton(CustomerRepositoryInterface::class, CustomerRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}