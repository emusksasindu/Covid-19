<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidStatistic extends Model
{
    use HasFactory;

    protected $table = 'covid_statistics';

    protected $fillable = [
        'update_date',
        'local_new_cases',
        'local_active_cases',
        'local_total_cases',
        'local_deaths',
        'local_recovered',
        'local_total_individuals_in_hospitals',
        'global_new_cases',
        'global_total_cases',
        'global_deaths',
        'global_new_deaths',
        'global_recovered',
    ];
}
