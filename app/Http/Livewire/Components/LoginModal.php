<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;

class LoginModal extends Component
{
    use WithRateLimiting;

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6',
    ];

    public function submit()
    {
        try {
            $this->rateLimit(4);
        } catch (TooManyRequestsException $exception) {

            $this->addError('auth', "Slow down! Please wait another $exception->secondsUntilAvailable seconds to log in.");

            return;
        }
        
        $this->validate();

        if ($this->attempt()) {
            session()->regenerate();
            $this->checkLastConnection();

            return redirect()->intended('dashboard');
        }

        $this->addError('auth', 'These credentials do not match our records.');

        return;
    }

    private function throttle($maxAttempts, $decaySeconds = 60): void
    {
        try {
            $this->rateLimit($maxAttempts, $decaySeconds);
        } catch (TooManyRequestsException $exception) {
            $this->addError('auth', "Slow down! Please wait another $exception->secondsUntilAvailable seconds to log in.");

            return;
        }
    }

    private function checkLastConnection(): void
    {
        $user = Auth::user();

        if ($user->last_connection !== $lastIp = request()->userAgent()) {
            $user->last_connection = $lastIp;
            $user->save();
        }
    }

    private function attempt(): bool
    {
        return Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }

    public function render()
    {
        return view('livewire.components.login-modal');
    }
}
