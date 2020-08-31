<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds new company';

    /**
     * Execute the console command.
     *
     * @return int
     */
    //class based command
    public function handle()
    {
        $name = $this->ask('What is Your Company Name');
        $phone = $this->ask('What is Your Company Phone Number');
        if ($this->confirm('Are You Ready To Insert"' . $this->name . '"?')) {

            $company = Company::create([
                'name' => $name,
                'phone' => $phone,
            ]);
            $this->info($company->name . ' Company is Created');
        } else {

            $this->warn('No Company Add');
        }
    }
}
