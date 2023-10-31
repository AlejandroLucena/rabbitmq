<?php

namespace App\Console\Commands;

use App\Jobs\NewUserJob;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\BufferedOutput;
use VladimirYuldashev\LaravelQueueRabbitMQ\Horizon\RabbitMQQueue;

class initRabbit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-rabbit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Iniciando colas de RabbitMQ';

    /**
     * Execute the console command.
     */
    public function handle()
    {        
        $this->output = new BufferedOutput();

        $exchange = config('rabbitmq.marketing.exchange.name');

        $output = $this->call('rabbitmq:exchange-declare', ['name' => $exchange]);

    }
}
