<?php

namespace BondarDe\LaravelToolbox\View\Components\Buttons;

class LinkButton extends DefaultButton
{
    function makeAttributes(): array
    {
        return [
            'class' => 'inline-flex items-center px-4 py-2 border border-transparent font-semibold text-sm uppercase tracking-widest rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 active:bg-gray-300 focus:outline-none focus:border-gray-400 focus:ring focus:ring-gray-200 disabled:opacity-25 transition ease-in-out duration-150',
        ];
    }
}
