<?php

use Illuminate\Database\Seeder;
use App\Carrer;

class CarrerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('carrers')->delete();

      $faker = \Faker\Factory::create();

      Carrer::create([
          'name' => "Ingenieria en Sistemas Computacionales",
          'key' => "ISIC–2010-224",
          'alias' => "ISIC"
      ]);

      Carrer::create([
          'name' => "Ingenieria en Informática",
          'key' => "IINF-2010-220",
          'alias' => "IINF"
      ]);

      Carrer::create([
          'name' => "Ingenieria en Bioquímica",
          'key' => "IBQA-2010-207",
          'alias' => "IBQA"
      ]);

      Carrer::create([
          'name' => "Ingenieria en Civil",
          'key' => "ICIV-2010-208",
          'alias' => "ICIV"
      ]);

      Carrer::create([
          'name' => "Ingenieria en Gestion Empresarial",
          'key' => "IGEM-2009-201",
          'alias' => "IGEM"
      ]);

      Carrer::create([
          'name' => "Ingenieria en Innovación Agrícola Sustentable",
          'key' => "IIAS-2010-221",
          'alias' => "IIAS"
      ]);

      Carrer::create([
          'name' => "Ingenieria Industrial",
          'key' => "IIND-2010-227",
          'alias' => "IIND"
      ]);

      Carrer::create([
          'name' => "Contador Público",
          'key' => "COPU-2010-205",
          'alias' => "COPU"
      ]);
    }
}
