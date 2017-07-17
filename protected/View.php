<?php

namespace App;
class View
{
    use MagicTrait;
    public function display($template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        include $template;
    }
}