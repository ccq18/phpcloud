<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use PersistModel\Service;

class HealthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:health';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       Service::all()->map(function (Service $s){
           foreach ($s->getServers() as $server){
               //todo check result is ok
               $server['health_url'];
           }
       });
    }

}