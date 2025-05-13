<?php
namespace App\View\Components\Cart;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $icon;
    public $value;
    public $label;

    public function __construct($title, $icon, $value, $label)
    {
        $this->title = $title;
   
   
         $this->icon = $icon;
        $this->value = $value;
        $this->label = $label;
    }

    public function render()
    {
        return view('card');
    }
}
