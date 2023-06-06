<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		  $faker = Faker::create();

        foreach (range(1,30) as $index) {

            \DB::table('tickets')->insert([

                'line_number' => rand(8000,16000),

				'from' => $faker->randomElement(["Благоевград","Бургас","Варна","Велико Търново","Видин","Враца ","Габрово","Добрич","Кърджали","Кюстендил","Ловеч","Монтана","Пазарджик","Плевен","Перник","Пловдив","Разград","Русе","Силистра","Сливен","Смолян","София","Стара Загора","Търговище","Хасково","Шумен","Ямбол"]),
				
				'to' => $faker->randomElement(["Благоевград","Бургас","Варна","Велико Търново","Видин","Враца ","Габрово","Добрич","Кърджали","Кюстендил","Ловеч","Монтана","Пазарджик","Плевен","Перник","Пловдив","Разград","Русе","Силистра","Сливен","Смолян","София","Стара Загора","Търговище","Хасково","Шумен","Ямбол"]),

                'departure_date' => $faker->dateTimeInInterval('-1 week', '+1 month'),
				
				'class' => rand(1, 2),
				
				'seat' => rand(1, 100),
				
				'price' => rand(5, 30),
	
                'discount' => $faker->randomElement([0,10,25,50]),

            ]);

        }

        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

