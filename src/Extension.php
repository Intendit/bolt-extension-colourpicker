<?php

namespace Bolt\Extensions\Bolt\Colourpicker;

use Bolt\Asset\File\JavaScript;
use Bolt\Asset\File\Stylesheet;
use Bolt\Extension\SimpleExtension;
use Bolt\Controller\Zone;
use Bolt\Extensions\Bolt\Colourpicker\Provider\ConfigProvider;

class Extension extends SimpleExtension
{

    public function getServiceProviders()
    {
        return [
            $this,
            new ConfigProvider()
        ];
    }

    protected function registerTwigPaths()
    {
        return [
            'twig' => ['position' => 'prepend', 'namespace'=>'bolt']
        ];
    }

    protected function registerAssets()
    {
        $js_colourpicker = Javascript::create()
            ->setFileName('colourpicker.js')
            ->setLate(true)
            ->setPriority(1)
            ->setZone(Zone::BACKEND);
            
        $js_start = Javascript::create()
            ->setFileName('start.js')
            ->setLate(true)
            ->setPriority(1)
            ->setZone(Zone::BACKEND);

        $css_colourpicker = (new Stylesheet('colourpicker.css'))
            ->setZone(Zone::BACKEND);
        return [
            $js_colourpicker,
            $js_start,
            $css_colourpicker
        ];
    }

}
