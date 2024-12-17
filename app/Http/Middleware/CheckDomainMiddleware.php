<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckDomainMiddleware
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
        // $host = $request->getHost();
        // if ($host !== 'http://192.168.1.12' && $host !== 'http://192.168.1.12' && $host !== 'http://192.168.1.12') {
        //     // Prepare the data for the email
        //     $data = [
        //         'error' => 'Lisensi Domain Mu Tidak Valid. Silahkan Beli di +6281315862598 ',
        //         'host' => $host,
        //         'contact' => 'fikriimandaa9i@gmail.com',
        //         'website' => '+6281315862598'
        //     ];
    
        //     // Send the email
        //     Mail::send('emails.license_error', $data, function ($message) use ($data) {
        //         $message->to($data['contact'])->subject('License Error Notification');
        //     });
    
        //     // Return the server's host name in the response
        //     return response()->json($data);
        // }
        return $next($request);
    }

}
