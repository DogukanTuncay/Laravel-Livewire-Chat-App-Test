<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MessageForm extends Form
{
    #[Validate('required')]
    public string $newMessage;
}
