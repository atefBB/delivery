<?php

namespace CodeDelivery\Models;

use Illuminate\Contracts\Support\Jsonable;

class Geo implements Jsonable
{

    public $latitude;
    public $longitude;

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        json_encode([
            'lat' => $this->latitude,
            'long' => $this->longitude
        ]);
    }
}