<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert2 extends Component
{
    public $class;

    public function __construct($type = 'info')
    {
        $this->class = match($type) {
            'danger' => 'text-red-800 bg-red-100',
            'success' => 'text-green-800 bg-green-100',
            'warning' => 'text-yellow-800 bg-yellow-100',
            'dark' => 'text-gray-800 bg-gray-900',
            default => 'text-blue-800 bg-blue-100',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.alert2');
    }
}