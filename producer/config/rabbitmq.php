<?php

/**
 * Queue Schema Config
 */

// host.exchange.queue
return [

    'marketing' => [
        'exchange' => [
            'name' => env('RABBITMQ_EXCHANGE_DECLARE'),
            'queues' => [

            ],
        ],
    ],
];