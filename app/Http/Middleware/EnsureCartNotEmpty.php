<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class EnsureCartNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cartExists = Cart::where('user_id', Auth::id())->exists();

        if (! $cartExists) {
            return redirect()
                ->route('user.cart')
                ->with('toast', [
                    'type' => 'error',
                    'title' => 'Keranjang Kosong',
                    'message' => 'Silakan tambahkan produk ke keranjang terlebih dahulu.',
                ]);
        }

        return $next($request);
    }
}
