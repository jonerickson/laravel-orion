<?php

declare(strict_types=1);

namespace Orion\Specs\Builders\Partials\Search;

use Orion\Specs\Builders\Partials\SearchPartialBuilder;

class SortBuilder extends SearchPartialBuilder
{
    public function build(): ?array
    {
        if (!count($this->controller->sortableBy())) {
            return null;
        }

        return [
            'type' => 'array',
            'items' => [
                'type' => 'object',
                'properties' => [
                    'field' => [
                        'type' => 'string',
                        'enum' => $this->controller->sortableBy(),
                        'required' => true
                    ],
                    'direction' => [
                        'type' => 'string',
                        'enum' => ['asc', 'desc']
                    ]
                ]
            ]
        ];
    }
}
