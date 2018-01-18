<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('password_resets')->delete();
        DB::table('editions')->delete();
        DB::table('awards')->delete();
        DB::table('categories')->delete();
        DB::table('works')->delete();

        $this->command->info('Baza wyczyszczona.');

        $admin = App\User::create([
            'firstName' => 'Jakub',
            'lastName' => 'Nadolny',
            'email' => 'jnadolny@me.com',
            'password' => bcrypt("administrator123"),
            'country' => "Polska",
            'isActive' => true,
            'isAdmin' => true,
        ]);

        $this->command->info('Administrator stworzony. Hasło to administrator123');

        $adam = App\User::create([
            'firstName' => 'Adam',
            'lastName' => 'Waniak',
            'email' => 'awaniak@me.com',
            'password' => bcrypt("uzytkownik123"),
            'country' => "Niemcy",
            'isActive' => true,
            'isAdmin' => false,
        ]);

        $this->command->info('Użytkownik_1 stworzony. Hasło to uzytkownik123');

        $piotr = App\User::create([
            'firstName' => 'Piotr',
            'lastName' => 'Sajewicz',
            'email' => 'psajewicz@me.com',
            'password' => bcrypt("uzytkownik123"),
            'country' => "Ukraina",
            'isActive' => true,
            'isAdmin' => false,
        ]);

        $this->command->info('Użytkownik_2 stworzony. Hasło to uzytkownik123');

        $malysz = App\User::create([
            'firstName' => 'Adam',
            'lastName' => 'Małysz',
            'email' => 'amalysz@me.com',
            'password' => bcrypt("uzytkownik123"),
            'country' => "Polska",
            'isActive' => true,
            'isAdmin' => false,
        ]);

        $this->command->info('Użytkownik_3 stworzony. Hasło to uzytkownik123');
        $this->command->info('Wszyscy użytkownicy stworzeni.');

        for ($i = 2015; $i <= 2018; $i++) {
            App\Edition::create([
                'year' => $i,
                'revisionDate' => $i . '-03-05',
                'finalDate' => $i . '-05-05',
                'isActive' => false,
            ]);
            $this->command->info('Edycja_' . $i . ' stworzona');
        }


        for ($i = 1; $i <= 4; $i++) {
            App\Category::create([
                'name' => 'Rysunek',
                'edition_id' => $i
            ]);

            App\Category::create([
                'name' => 'Zdjęcie',
                'edition_id' => $i
            ]);

            App\Category::create([
                'name' => 'Film',
                'edition_id' => $i
            ]);

            $this->command->info('Kategorie dla edycji_' . $i . ' stworzone');
        }

        for ($i = 1; $i <= 12; $i++) {
            App\Award::create([
                'name' => '4000 zł',
                'description' => 'Cztery tysiące złotych',
                'place' => 1,
                'category_id' => $i,
            ]);

            App\Award::create([
                'name' => '2000 zł',
                'description' => 'Dwa tysiące złotych',
                'place' => 2,
                'category_id' => $i,
            ]);

            App\Award::create([
                'name' => '800 zł',
                'description' => 'Osiem stówek',
                'place' => 3,
                'category_id' => $i,
            ]);
            $this->command->info('Kategorie dla edycji_' . $i . ' stworzone');
        }

        // Prace
        $praca1 = App\Work::create([
            'name' => 'Harry Potter',
            'declarationDate' => '2018-05-05',
            'category_id' => 12
        ]);

        $praca2 = App\Work::create([
            'name' => 'Władca Pierścieni',
            'declarationDate' => '2018-05-05',
            'category_id' => 12
        ]);

        $admin->works()->attach($praca1);
        $admin->works()->attach($praca2);

        $adam->works()->attach($praca1);
        $piotr->works()->attach($praca1);

        $malysz->works()->attach($praca2);
    }
}
