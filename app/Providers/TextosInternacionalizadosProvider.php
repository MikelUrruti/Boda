<?php

namespace App\Providers;

use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class TextosInternacionalizadosProvider extends ServiceProvider
{

    /** 
     * The path to the current lang files. 
     * 
     * @var string 
     */ 
    protected $langPath; 

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->langPath = lang_path(App::getLocale());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Cache::rememberForever('translations', function () {
            return collect(File::allFiles($this->langPath))->flatMap(function ($file) {
                return [
                    ($translation = $file->getBasename('.php')) => trans($translation),
                ];
            })->toJson();
        });
    }
}
