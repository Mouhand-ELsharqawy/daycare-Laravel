<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Child;
use App\Models\Children;
use App\Models\Consumable;
use App\Models\CurriculumOption;
use App\Models\Employee;
use App\Models\FemaleParent;
use App\Models\MainOffice;
use App\Models\MaleParent;
use App\Models\Program;
use App\Models\SchoolTrip;
use App\Models\Toy;
use App\Models\Waitinglist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MaleParent::factory(100)->create();
        FemaleParent::factory(100)->create();
        Children::factory(100)->create();
        Waitinglist::factory(100)->create();
        Consumable::factory(100)->create();
        Employee::factory(100)->create();
        Program::factory(100)->create();
        MainOffice::factory(100)->create();
        Toy::factory(100)->create();
        Child::factory(100)->create();
        SchoolTrip::factory(100)->create();
        CurriculumOption::factory(100)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
