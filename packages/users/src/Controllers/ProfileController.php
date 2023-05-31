<?php

namespace User\Controllers;

use Gate;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{

    public function profile(Request $request, User $user)
    {
        return view('User::users.profile');
    }
    public function update_profile(Request $request, User $user)
    {
        abort_if(Gate::denies('profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,jpg,png'],
            'contact_no' => ['required'],
            'mobile_no' => ['required'],
            'password' => ['nullable', 'confirmed', 'min:6'],
        ]);
        $user->update($data);
        if ($request->hasFile('file')) {
            if ($user->media) {
                Storage::delete($user->media->file_path); // Delete the media file from the storage
            }
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('media/' . strtolower(class_basename($user)), $filename);
            $media_data = [
                'file_name' => $filename,
                'file_path' => $path,
            ];
            $media = $user->media;
            $user->media()->updateOrCreate([
                'mediable_type' => $user::class,
                'mediable_id' => $user->id],
                $media_data);

        }
        return Redirect::back()->with('msg', 'Data Update!');
    }
}
