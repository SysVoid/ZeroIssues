<?php

namespace ZeroIssues\Providers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('errors', function($field)
        {
            $actualField = str_replace("'", '', str_replace('"', '', $field));
            return '<?php if($errors->has("' . $actualField . '")): ?>
                    <ul class="errors">
                        <?php foreach ($errors->get("' . $actualField . '") as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                        <?php unset($error); ?>
                    </ul>
                <?php endif; ?>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias('bugsnag.logger', Log::class);
        $this->app->alias('bugsnag.logger', LoggerInterface::class);
    }
}
