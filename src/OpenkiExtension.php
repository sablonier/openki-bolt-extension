<?php

namespace sablonier\openki;

use Bolt\Extension\SimpleExtension;
use Bolt\Asset\File\Stylesheet;
use Bolt\Asset\File\JavaScript;
use Bolt\Controller\Zone;

class OpenkiExtension extends SimpleExtension
{
    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [
            'openki_day'    => ['openkiDayFunction'],
            'openki_week'    => ['openkiWeekFunction']
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigPaths()
    {
        return [
            'templates'
        ];
    }
    
    protected function registerAssets()
    {
        $style = (new Stylesheet('css/openki.css'))
            ->setZone(Zone::FRONTEND);
            
        $momentjs = (new JavaScript('js/moment-with-locales.min.js'))
            ->setZone(Zone::FRONTEND);

        return [
            $style,
            $momentjs
        ];
    }

    /**
     * Render and return the twig file templates/_carousel.twig
     *
     * @return openki day
     */
    public function openkiDayFunction($options)
    {   

        $config = $this->getConfig();

        $context = [
            'options' => $options,
        ];

        $openki = $this->renderTemplate('_openki_day.twig', $context);
        echo $openki;

    }
    
    /**
     * Render and return the twig file templates/_carousel.twig
     *
     * @return openki week
     */
    public function openkiWeekFunction($options)
    {   

        $config = $this->getConfig();

        $context = [
            'options' => $options,
        ];

        $openki = $this->renderTemplate('_openki_week.twig', $context);
        echo $openki;

    }

}
