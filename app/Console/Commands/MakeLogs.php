<?php

namespace App\Console\Commands;

use App\Jobs\MessageJob;
use Illuminate\Console\Command;

class MakeLogs extends Command
{
    /**
     * @var string
     */
    protected $signature = 'logs:make {scope=rabbit} {count=5}';

    /**
     * @var string
     */
    protected $description = "Генерирует сообщения в лог
    logs:make
    {scope : Область генерации сообщений rabbit|log|all}
    {count : Колличество сообщений, по умолчнаию 5";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $scope = $this->argument('scope');
        $count = $this->argument('count');

        if ($scope === 'rabbit') {
            for ($i = 0; $i < $count; $i++) {
                MessageJob::dispatch(fake()->words(5))->onQueue('default');
            }
        }

        return Command::SUCCESS;
    }
}
