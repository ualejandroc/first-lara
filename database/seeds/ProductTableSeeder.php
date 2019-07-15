<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();

        $arrayPeliculas = array(
            array(
            'name'=>'Nuevo',
            'year'=>'2019',
            'creator'=>'Anonimo',
            'image_url'=>'google.com',
            'rented'=>true,
            'synopsis'=>'Sinopsis 1' )
           ,
            array(
            'name'=>'Nuevo2',
            'year'=>'2019',
            'creator'=>'Anonimo',
            'image_url'=>'google.com',
            'rented'=>true,
            'synopsis'=>'Sinopsis 1' )
            );
            
        

        foreach( $arrayPeliculas as $pelicula ) {
            $p = new Product;
            $p->name = $pelicula['name'];
            $p->year = $pelicula['year'];
            $p->creator = $pelicula['creator'];
            $p->image_url = $pelicula['image_url'];
            $p->rented = $pelicula['rented'];
            $p->synopsis = $pelicula['synopsis'];
            $p->save();
        }

    }
}
