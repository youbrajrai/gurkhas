<?php
/**
 * -----------------------------------------------------------------
 * NOTE : There is two routes has a name (user & group),
 * any change in these two route's name may cause an issue
 * if not modified in all places that used in (e.g Chatify class,
 * Controllers, chatify javascript file...).
 * -----------------------------------------------------------------
 */

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Theme\Controllers\ThemeController;

Route::get('/circular/{id}',[ThemeController::class,'singleCircular'])->name('single-circular');
Route::get('/documents/{id}',[ThemeController::class,'singleDocument'])->name('single-document');
Route::get('/single-committee/{id}',[ThemeController::class,'singleCommittee'])->name('single-committee');
Route::get('/finduser/{id}', function($id) {
    $user = User::find($id);
    $img = basename(storage_path()) . '/' .$user?->media?->file_path;
    $url = url('chat',$id);
    return response()->json([
        'user'=>$user,
        'img' => $img ?? null,
        'url' => $url
    ]);
});
