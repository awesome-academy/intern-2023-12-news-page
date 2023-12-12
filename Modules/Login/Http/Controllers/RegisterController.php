<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Login\Services\RegisterService;

class RegisterController extends Controller
{
    private $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function index()
    {
        return view('login::pages.register');
    }

    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $request->validate([
                'username' => 'string|max:255',
                'email' => 'string|max:320',
                'password' => 'string|min:6|confirmed',
                'password_confirmation' => 'string|min:6',
            ]);

            $status = $this->registerService->create($request->all());
            if ($status) {
                return redirect()->route('login');
            }

            return redirect()->back()->with('error', 'Email hoặc Username đã bị trùng');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
