<?php

namespace App\Http\Middleware;

use App\Models\VisitorCount;
use Closure;
use Illuminate\Http\Request;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $data = VisitorCount::where([
			['tanggal', date('Y-m-d')],
			// ['tanggal', Carbon::now()],
		])->latest('id')->first();

		// $count = $request->count == NULL ? 1 : $request->count;
		$count = 1;
		$new = false;

		if (!$data) {
			$data = new VisitorCount();
			$new = true;
		}

        if ($new) {
            $data->count = $count;
        } else {
            $data->count = $data->count + $count;
        }
        $data->save();

        return $next($request);
    }
}
