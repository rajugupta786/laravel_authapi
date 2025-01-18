<?php

namespace Database\Seeders;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PersonSeeder extends Seeder
{
    public function run()
    {
        $ramesh = Person::create(['name' => 'Ramesh']);
        $gaurav = Person::create(['name' => 'Gaurav', 'parent_id' => $ramesh->id]);
        Person::create(['name' => 'Shalu', 'parent_id' => $ramesh->id]);

        $deepu = Person::create(['name' => 'Deepu']);
        $amit = Person::create(['name' => 'Amit', 'parent_id' => $deepu->id]);
        Person::create(['name' => 'Sham Lal', 'parent_id' => $amit->id]);
        $kapil = Person::create(['name' => 'Kapil', 'parent_id' => $deepu->id]);

        Person::create(['name' => 'Prem Chopra']);
    }
}
