<?php

namespace Laravel\Fortify\Http\Responses;

use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\FailedTwoFactorLoginResponse as FailedTwoFactorLoginResponseContract;

class FailedTwoFactorLoginResponse implements FailedTwoFactorLoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $message = __('El código de autenticación de dos factores proporcionado no es válido.');

        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'code' => [$message],
            ]);
        }

        return redirect()->route('login')->withErrors(['email' => $message]);
    }
}
