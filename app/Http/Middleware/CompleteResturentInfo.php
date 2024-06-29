<?php

namespace App\Http\Middleware;

use App\Models\Resturent;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompleteResturentInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sellerId = auth()->guard('seller')->id();
        $phones = Resturent::where('seller_id', $sellerId)->get('phone');
        foreach ($phones as $phone) {
            $phone = $phone->phone;
        }
        if ($phone == "0") {
            return redirect('/seller/complete_res_info');
        }
        return $next($request);
    }
}
