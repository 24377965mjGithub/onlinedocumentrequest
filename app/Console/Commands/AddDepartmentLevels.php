<?php

namespace App\Console\Commands;

use App\Models\DepartmentLevels;
use Illuminate\Console\Command;

class AddDepartmentLevels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-department-levels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        DepartmentLevels::create(['departmentlevel' => 'ELEMENTARY Grade 1']);
        DepartmentLevels::create(['departmentlevel' => 'ELEMENTARY Grade 2']);
        DepartmentLevels::create(['departmentlevel' => 'ELEMENTARY Grade 3']);
        DepartmentLevels::create(['departmentlevel' => 'ELEMENTARY Grade 4']);
        DepartmentLevels::create(['departmentlevel' => 'ELEMENTARY Grade 5']);
        DepartmentLevels::create(['departmentlevel' => 'ELEMENTARY Grade 6']);

        DepartmentLevels::create(['departmentlevel' => 'JUNIOR HIGH SCHOOL Grade 7']);
        DepartmentLevels::create(['departmentlevel' => 'JUNIOR HIGH SCHOOL Grade 8']);
        DepartmentLevels::create(['departmentlevel' => 'JUNIOR HIGH SCHOOL Grade 9']);
        DepartmentLevels::create(['departmentlevel' => 'JUNIOR HIGH SCHOOL Grade 10']);

        DepartmentLevels::create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 11 - GAS']);
        DepartmentLevels::create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 11 - HUMMS']);
        DepartmentLevels::create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 11 - STEM']);
        DepartmentLevels::create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 11 - ICT']);
        DepartmentLevels::create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 12 - GAS']);
        DepartmentLevels::create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 12 - HUMMS']);
        DepartmentLevels::create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 12 - STEM']);
        DepartmentLevels::create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 12 - ICT']);

        dd('Department Levels Added Successfully');
    }
}
