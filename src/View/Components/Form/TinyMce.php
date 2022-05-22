<?php

namespace BondarDe\LaravelToolbox\View\Components\Form;

use Illuminate\View\Component;

class TinyMce extends Component
{
    public string $jsLibSrc;
    public bool $loadJsLib;
    public array $editorConfig;

    public function __construct(
        string $selector,
        array  $config = [],
        string $src = '/tinymce/tinymce.min.js'
    )
    {
        $this->editorConfig = self::makeConfig($selector, $config);

        if (defined('TOOLBOX_TINY_MCE_LIB_LOADED')) {
            $this->loadJsLib = false;
        } else {
            $this->loadJsLib = true;
            $this->jsLibSrc = $src;
            define('TOOLBOX_TINY_MCE_LIB_LOADED', true);
        }
    }

    private static function makeConfig(
        string $selector,
        array  $config
    ): array
    {
        return array_merge([
            'selector' => $selector,
            'plugins' => 'autoresize code wordcount link image',
            'toolbar' => 'undo redo | styleselect | bold italic | link image | code',
            'convert_urls' => false,
            'entity_encoding' => 'raw',
            'width' => '100%',
            'language' => app()->getLocale(),
        ], $config);
    }

    public function render()
    {
        return view('laravel-toolbox::form.tiny-mce');
    }
}
