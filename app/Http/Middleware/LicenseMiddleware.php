<?php


 namespace App\Http\Middleware; use Closure; use Illuminate\Http\Request; use Symfony\Component\HttpFoundation\Response; use Carbon\Carbon; class LicenseMiddleware { public function handle(Request $request, Closure $next) : Response { $licenseKey = env("\114\x49\x43\x45\x4e\123\x45\x5f\113\105\131"); $expiryDate = env("\114\x49\x43\x45\x4e\x53\x45\137\x45\x58\120\111\122\131\x5f\104\x41\x54\105"); if (!$licenseKey || Carbon::parse($expiryDate)->isBefore(Carbon::now())) { return redirect()->route("\154\151\x63\x65\156\x73\x65"); } return $next($request); } }