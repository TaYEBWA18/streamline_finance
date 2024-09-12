<?php

namespace Modules\Client\App\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Modules\Client\App\Models\Subscription;
use Modules\Client\App\Mail\ClientReminder;
use Illuminate\Support\Facades\Mail;


class mailReminder extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {  
         // pick the expiry date and extend by a week
        $expiringSubscriptions = Subscription::where('expiry_date', '<', now()->addDays(7))->get();

        foreach ($expiringSubscriptions as $subscription) {
            $clientEmail = $subscription->client->email;// send to the client emails
            Mail::to($clientEmail)->send(new ClientReminder($subscription));
        }
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
