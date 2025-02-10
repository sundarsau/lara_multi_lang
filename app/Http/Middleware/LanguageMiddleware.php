<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use App\Models\Language;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // set sesion variable for the current language
        if(!Session::has('locale')){
            Session::put('locale',App::getLocale());
        }
        App::setLocale(session('locale'));

        // get current language from the database
        $curr_lang = Language::where('code',session('locale'))->where('status',1)->first();

        // get all other languages
        $other_lang = Language::where('code','!=' ,session('locale'))->where('status', 1)->get();

        View::share('cLang', $curr_lang);
        View::share('otherLangs', $other_lang);
        return $next($request);
    }
}
