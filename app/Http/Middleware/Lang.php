<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use App;
use App\language;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Config::get('app.locale_prefix')){
            $language=language::
            where('language',Config::get('app.locale_prefix'))->pluck('id')->first();
            session()->put('langid',$language);
            session()->put('lang',Config::get('app.locale_prefix'));
            app()->setLocale(Config::get('app.locale_prefix'));
        }
        else{
            $language=language::
            where('language','ar')->pluck('id')->first();
            session()->put('langid',$language);
            session()->put('lang','ar');
            app()->setLocale('ar');
        }


        return $next($request);
    }
}
