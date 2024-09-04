<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {

        if(!Auth::user()){
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // Convert Role *|*
        $roles = explode('|', $roles);

        $roleMapping = [
            'user' => 0,
            'admin' => 1,
            'editor' => 2,
            'commentor' => 3,
        ];

        if(in_array($userRole, array_map(fn($role) => $roleMapping[$role], $roles))){
            return $next($request);
        }

        return match($userRole){
            0 => redirect()->route('user'),
            1 => redirect()->route('admin'),
            2 => redirect()->route('editor'),
            3 => redirect()->route('commentor'),
            default => redirect()->route('login'),
        };



        // switch($role){

        //     case 'user' :
        //         if($userRole == 0){
        //             return $next($request);
        //         }
        //     break;

        //     case 'admin' :
        //         if($userRole == 1){
        //             return $next($request);
        //         }
        //     break;
        //     case 'editor' :
        //         if($userRole == 2){
        //             return $next($request);
        //         }
        //     break;

        //     case 'commentor' :
        //         if($userRole == 3){
        //             return $next($request);
        //         }
        // }

        // switch($userRole){
        //     case 0:
        //         return redirect()->route('user');

        //     case 1:
        //         return redirect()->route('admin');

        //     case 2:
        //         return redirect()->route('editor');

        //     case 3:
        //         return redirect()->route('commentor');
        // }

        // redirect()->route('login');

        // return match($userRole) {
        //     0 => redirect()->route('user'),
        //     1 => redirect()->route('admin'),
        //     2 => redirect()->route('editor'),
        //     3 => redirect()->route('commentor'),
        //     default => redirect()->route('login'), // Handles unexpected values
        // };


    }
}
