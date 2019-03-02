<?php

namespace feliximafidon\FlexEnv\Commands;

use feliximafidon\FlexEnv\Env;
use Illuminate\Console\Command;

class GetEnv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'env:get {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get an entry from your .env file';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $env = new Env(base_path('.env'));
        $key = strtoupper($this->argument('key'));
        $result = str_replace('"', '', $env->get($key));

        if ($result == '' || is_null($result)) {
            return $this->error("");
        }

        return $this->comment($result);
    }
}
