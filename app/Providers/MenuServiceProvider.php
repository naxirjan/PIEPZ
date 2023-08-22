<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    $currenturl = Request::segment(1);

    //echo $currenturl = url()->full();
    if ($currenturl == 'vendor') {
      $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu-vendor.json'));
      $verticalMenuData = json_decode($verticalMenuJson);
    } elseif ($currenturl == 'partner') {
      $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu-partner.json'));
      $verticalMenuData = json_decode($verticalMenuJson);
    } elseif ($currenturl == 'admin' OR $currenturl == 'app' ) {
      $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu-admin.json'));
      $verticalMenuData = json_decode($verticalMenuJson);
    } else {
      $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
      $verticalMenuData = json_decode($verticalMenuJson);
    }

    $horizontalMenuJson = file_get_contents(base_path('resources/menu/horizontalMenu.json'));
    $horizontalMenuData = json_decode($horizontalMenuJson);

    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
  }
}
