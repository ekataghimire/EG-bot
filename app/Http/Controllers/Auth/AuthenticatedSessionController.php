<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use GuzzleHttp\Client;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        
        return view('auth.login');

    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    protected function authenticated(Request $request, $user)
    {
        // create a new Guzzle HTTP client
        $client = new Client(['base_uri' => 'http://localhost:5005']);

        // log the user ID to check if it's being set correctly
        \Log::info("User ID: {$user->id}");
        \Log::info('authenticated method called');
        dd('authenticated method called');
        // set the conversation ID to the user's ID
        $conversation_id = $user->id;

        // send a reset event to the Rasa chatbot
        $client->post("/conversations/{$conversation_id}/tracker/events", [
            'json' => [
                [
                    'event' => 'reset'
                ]
            ]
        ]);

        return redirect()->intended($this->redirectPath());
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
