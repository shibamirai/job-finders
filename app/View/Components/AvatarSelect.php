<?php

namespace App\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class AvatarSelect extends Component
{
    public $name;
    public $selected;
    public $disabled;

    public function __construct($name, $selected = '', $disabled = false)
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->disabled = $disabled;
    }

    public function render()
    {
        $files = File::files(public_path('avatar'));

        return view('components.avatar-select', [
            'items' => array_map(fn($file) => $file->getFilename(), $files)
        ]);
    }
}
