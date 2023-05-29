<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\CovidStatistic;

class UpdateCovidStat extends Command
{
    protected $signature = 'covid:update';
    protected $description = 'Fetches and updates COVID-19 statistics';

    public function handle()
    {
        $response = Http::withOptions(['verify' => false])->get('https://hpb.health.gov.lk/api/get-current-statistical');

        if ($response->successful()) {
            $data = $response->json();

            // Extract the required fields from the API response
            $statistics = [
                'update_date' => date('Y-m-d H:i:s', strtotime($data['data']['update_date_time'])),
                'local_new_cases' => $data['data']['local_new_cases'],
                'local_active_cases' => $data['data']['local_total_cases'] - $data['data']['local_deaths'] - $data['data']['local_recovered'],
                'local_total_cases' => $data['data']['local_total_cases'],
                'local_deaths' => $data['data']['local_deaths'],
                'local_recovered' => $data['data']['local_recovered'],
                'local_total_individuals_in_hospitals' => $data['data']['local_total_number_of_individuals_in_hospitals'],
                'global_new_cases' => $data['data']['global_new_cases'],
                'global_total_cases' => $data['data']['global_total_cases'],
                'global_deaths' => $data['data']['global_deaths'],
                'global_new_deaths' => $data['data']['global_deaths'] - $data['data']['global_recovered'],
                'global_recovered' => $data['data']['global_recovered'],
            ];

            // Save the statistics to the database
            CovidStatistic::create($statistics);

            $this->info('COVID-19 statistics updated successfully.');
        } else {
            $this->error('Failed to fetch COVID-19 statistics.');
        }
    }
}
