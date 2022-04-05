<?php

namespace App\Http\Middleware;

use App\Models\Message;
use App\Models\Notification;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetViewVariables
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

        /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        view()->composer('*', function ($view) {
            $view->with('notifications_navbar',
                Notification::where('user_id', '=', 
                Auth::user()->id)->orderBy('created_at', 'desc')->get()); 
                //Where recent is static method which comes from your Post model
            });

        view()->composer('*', function ($view) {
            $view->with('messages_navbar',
                Message::where([
                    ['owner_id', '=', Auth::user()->id],
                    ['user_id', '<>', Auth::user()->id],
                    ['read_receipt', '=', null]
                ])->orderBy('updated_at', 'desc')->get()); 
                //Where recent is static method which comes from your Post model
            });

           /* $this->mymessages = Message::where(
                [
                    ['owner_id', '=', Auth::user()->id],
                    ['profile_id', '=', $this->profile->id ]
                ]
            )->get();
          
            $this->messageCount = count($this->mymessages);*/
        return $next($request);
    }
}
