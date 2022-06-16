<?php

namespace Nlf\Component\Event\Aggregate\Tests\CarExample;

use DateTimeInterface;
use Nlf\Component\Event\Aggregate\AbstractAggregateEvent;
use Nlf\Component\Event\Aggregate\AggregateUuidInterface;

class CarDroveDistanceEvent extends AbstractAggregateEvent
{
    private float $distance;
    private float $fuelConsumed;

    public function __construct(
        AggregateUuidInterface $aggregateUuid,
        float $distance,
        float $fuelConsumed,
        ?DateTimeInterface $createdAt = null
    ) {
        parent::__construct($aggregateUuid, $createdAt);
        $this->distance = $distance;
        $this->fuelConsumed = $fuelConsumed;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }

    public function getFuelConsumed(): float
    {
        return $this->fuelConsumed;
    }

    protected function getJsonPayload(): array
    {
        return [
            'distance' => $this->distance,
            'fuelConsumed' => $this->fuelConsumed,
        ];
    }
}