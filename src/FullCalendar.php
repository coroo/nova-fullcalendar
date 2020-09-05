<?php

namespace Coroowicaksono\FullCalendar;

use Laravel\Nova\Card;

class FullCalendar extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';

    public function __construct($component = null)
    {

        parent::__construct($component);

    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'full-calendar';
    }

    public function resource(string $resource): self
    {
        return $this->withMeta([ 'resource' => $resource::uriKey() ]);
    }

    public function options(array $options): self
    {
        return $this->withMeta([ 'options' => (object) $options ]);
    }

    public function title(string $title): self
    {
        return $this->withMeta([ 'title' => $title ]);
    }

    public function model(string $model): self
    {
        return $this->withMeta([ 'model' => $model ]);
    }

    public function series(string $series): self
    {
        return $this->withMeta([ 'series' => json_decode($series) ]);
    }
}
