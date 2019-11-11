<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $countPost = Post::all()->count();
            $countCategories = Category::all()->count();
            $countUsers = User::all()->count();



            $event->menu->add('MAIN NAVIGATION');

            $event->menu->add([
                'text' => 'Блог',
                'url' => '/admin/posts',
                'icon' => 'fa fa-blog',
                'submenu_open' => 'true',
                'submenu' => [
                    [
                        'text' => 'Все посты',
                        'url' => '/admin/posts',
                        'label' => $countPost,
                        'icon' => 'fa fa-sticky-note'
                    ],
                    // [
                    //     'text' => 'Создать запись',
                    //     'url' => '/admin/posts/create',
                    //     'icon' => 'fa fa-plus'
                    // ],
                    [
                        'text' => 'Все категории',
                        'url' => '/admin/categories',
                        'label' => $countCategories,
                        'icon' => 'fa fa-poll-h'
                    ],
                    [
                        'text' => 'Пользователи',
                        'url' => '/admin/users',
                        'icon' => 'fa fa-users',
                        'label' => $countUsers,
                    ],
                ]
            ]);

            // dd($event);

        });




    }
}
