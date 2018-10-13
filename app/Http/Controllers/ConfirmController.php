<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\RedirectResponse;

class ConfirmController extends Controller
{
    public function application(Application $application, string $token): RedirectResponse
    {
        if (!$token || $application->token !== $token) {
            abort(404);
        }

        $application->token = null;
        $application->save();

        return redirect()->route('front.thx.promotion');
    }
}
