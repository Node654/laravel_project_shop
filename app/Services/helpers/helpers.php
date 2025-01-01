<?php

use Illuminate\Http\RedirectResponse;

function backWithErrors(array $errors = [], array $inputs = []): RedirectResponse
{
    return back()->withErrors($errors)->withInput($inputs);
}
