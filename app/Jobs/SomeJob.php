<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SomeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected mixed $user;

    /**
     * Create a new job instance.
     *
     * @param mixed $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        sleep(4);
        $message = 'SomeJob was completed for user: ' . $this->user;
        Log::emergency($message);
        Log::alert('Alert: ' . $message);
        Log::critical('Critical: ' . $message);
        Log::error('Error: ' . $message);
        Log::warning('Warning: ' . $message);
        Log::notice('Notice: ' . $message);
        Log::info('Info: ' . $message);
        Log::debug('Debug: ' . $message);
    }
}
