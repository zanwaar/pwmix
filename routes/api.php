<?php





/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

use App\Models\TripayLog;
use App\Models\User;
use App\Services\TripayService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], static function () {
    Route::get('paymentwallxFikmsnxzj2hdjs4444444444444r', [
        'as' => 'api.paymentwall',
        'middleware' => 'paymentwall.pingback',
        'uses' => 'App\Http\Controllers\Pingback@paymentwall'
    ]);

    Route::post('ipaymuxFikmsnxzj2hdjs', [
        'as' => 'api.ipaymu',
        'middleware' => 'ipaymu.active',
        'uses' => 'App\Http\Controllers\Pingback@IpaymuCallback'
    ]);

    Route::post(config('tripay.route'), [
        'as' => 'api.tripay',
        'middleware' => 'tripay.active',
        'uses' => 'App\Http\Controllers\Pingback@TripayCallback'
    ]);

    Route::get('ipaymuxFikmsnxzj2hdjs', function () {
        $condition = true; // Replace this with your actual condition

        if ($condition) {
            // Return a 404 response
            return response()->view('website.404', [], 404);
        }
    });

    Route::post('arenatop100x1337JimxSecuredaaaaaaaaaaaa', [
        'as' => 'api.arenatop100',
        'middleware' => 'arena.active',
        'uses' => 'App\Http\Controllers\ArenaCallback@incentive'
    ]);
});

Route::post('/payments', function (Request $request) {
    // Simulasi penerimaan data
    try {
        $tripayService = new TripayService();
        return $tripayService->handleCallback($request);
    } catch (Exception $e) {
        return response()->json([
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], Response::HTTP_BAD_REQUEST);
    }
});
Route::post('/payments/create', function (Request $request) {
    // Simulasi penerimaan data
    $user = User::where('ID', 1024)->first();

    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => 'User not found'
        ], 404);
    }

    // Lanjutkan jika user ditemukan
    TripayLog::create([
        'trx_id' => '1234567',
        'reference_id' => 'INV1234567',
        'user_id' => $user->ID,
        'amount' => 200000,
        'money' => 200000,
        'status_code' => '0',
    ]);
});
