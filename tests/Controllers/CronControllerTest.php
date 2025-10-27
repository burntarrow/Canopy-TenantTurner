<?php

namespace Tests\Controllers;

use Inc\Controllers\CronController;
use WP_Mock\Tools\TestCase;
use WP_Mock;

class CronControllerTest extends TestCase {
    protected function setUp(): void {
        parent::setUp();

        WP_Mock::userFunction(
            '__',
            [
                'return_arg' => 0,
            ]
        );
    }

    public function testCanopyAddCustomSchedulesAddsExpectedIntervals(): void {
        $baseline = [
            'existing' => [
                'interval' => 123,
                'display'  => 'Existing',
            ],
        ];

        $controller = new CronController();

        $result = $controller->canopyAddCustomSchedules( $baseline );

        $this->assertArrayHasKey( 'hourly', $result );
        $this->assertSame( 3600, $result['hourly']['interval'] );
        $this->assertSame( 'Hourly', $result['hourly']['display'] );

        $this->assertArrayHasKey( 'twicedaily', $result );
        $this->assertSame( 43200, $result['twicedaily']['interval'] );
        $this->assertSame( 'Twice Daily', $result['twicedaily']['display'] );

        $this->assertArrayHasKey( 'daily', $result );
        $this->assertSame( 86400, $result['daily']['interval'] );
        $this->assertSame( 'Daily', $result['daily']['display'] );

        $this->assertSame( $baseline['existing'], $result['existing'] );
    }
}
