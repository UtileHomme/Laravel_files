<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class Hello2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Hello2 {name=Jatin} {--L|lastname=Sharma}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is make command for Hello2';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $name = $this->argument('name');
        // $lname = $this->option('lastname');
        // $this->info($name.' '.$lname);

        // $name = $this->ask('What is your name');
        // $this->info($name);

        // $name = $this->secret('What is your name');
        // $confirm = $this->confirm('Do you want to print your name?');
        //
        // if($confirm)
        // {
        //     $this->info($name);
        //
        // }

        $header = ['Name','Email'];
        $user = User::select('name','email')->get();

        $this->table($header,$user);


    }
}
