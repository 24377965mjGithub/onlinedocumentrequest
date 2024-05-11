<?php

namespace Database\Seeders;

use App\Models\DepartmentLevels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentLevels::factory()->create(['departmentlevel' => 'PRE-ELEMENTARY Nursery']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'PRE-ELEMENTARY Kinder 1']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'PRE-ELEMENTARY Kinder 2']);

        DepartmentLevels::factory()->create(['departmentlevel' => 'ELEMENTARY Grade 1']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'ELEMENTARY Grade 2']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'ELEMENTARY Grade 3']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'ELEMENTARY Grade 4']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'ELEMENTARY Grade 5']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'ELEMENTARY Grade 6']);

        DepartmentLevels::factory()->create(['departmentlevel' => 'JUNIOR HIGH SCHOOL Grade 7']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'JUNIOR HIGH SCHOOL Grade 8']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'JUNIOR HIGH SCHOOL Grade 9']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'JUNIOR HIGH SCHOOL Grade 10']);

        DepartmentLevels::factory()->create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 11 - GAS']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 11 - HUMMS']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 11 - STEM']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 11 - ICT']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 12 - GAS']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 12 - HUMMS']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 12 - STEM']);
        DepartmentLevels::factory()->create(['departmentlevel' => 'SENIOR HIGH SCHOOL Grade 12 - ICT']);
    }
}
