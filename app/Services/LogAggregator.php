<?php

namespace App\Services;

class LogAggregator
{
    protected iterable $drivers;

    // We accept an iterable collection (the tagged items)
    public function __construct(iterable $drivers)
    {
        $this->drivers = $drivers;
    }

    public function runSystemDiagnostics(): array
    {
        $report = [];

        foreach ($this->drivers as $driver) {
            $driverName = class_basename($driver);

            // Execute the actual behavior method on the living object
            $isOnline = $driver->pingExternalServer();

            $report[] = [
                'driver' => $driverName,
                'status' => $isOnline ? 'ONLINE' : 'OFFLINE',
                'timestamp' => now()->toDateTimeString(),
            ];
        }

        return $report;
    }
}
