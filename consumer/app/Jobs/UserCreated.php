<?php

namespace App\Jobs;

use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try
        {
            $user = User::find($this->data['data']['id']);
            $user->number_of_attemps++;
            $user->save();
            echo 'Event: UserCreated ' .$user->number_of_attemps . PHP_EOL;
            echo json_encode($this->data) . PHP_EOL;
        } catch (Exception $e) {
            dd($e);
        }
    }
}
