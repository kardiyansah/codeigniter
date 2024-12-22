<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PeopleSeeder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('fr_FR');

    // single data
    for ($i = 0; $i < 100; $i++) {
      $data = [
        'name'       => $faker->name,
        'address'    => $faker->address,
        'created_at' => Time::createFromTimestamp($faker->unixTime()),
        'updated_at' => Time::now()
      ];

      // Using Query Builder Single
      $this->db->table('people')->insert($data);
    }

    // List data
    // $data = [
    //   [
    //     'name'       => 'John Doe',
    //     'address'    => '176 mountain hill',
    //     'created_at' => new Time('now'),
    //     'updated_at' => new Time('now')
    //   ],
    //   [
    //     'name'       => 'Alexander',
    //     'address'    => '176 milano',
    //     'created_at' => new Time('now'),
    //     'updated_at' => new Time('now')
    //   ]
    // ];

    // Simple Queries
    // $this->db->query('INSERT INTO people (name, address, created_at, updated_at) VALUES(:name:, :address:, :created_at:, :updated_at:)', $data);


    // Using Query Builder Single Batch
    // $this->db->table('people')->insertBatch($data);
  }
}
