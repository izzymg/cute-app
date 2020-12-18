<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Lorem Ipsum',
            'text' => 'Dolores harum consectetur rerum. Nemo dolorem vel facere debitis itaque est alias. In ex dolores in necessitatibus nihil reiciendis magnam.
            
            Ut ipsam nihil nulla enim. Quod ad consequuntur et atque eum et molestias corrupti. Ut error magni et. Quisquam corporis in dolorum delectus et et est. Debitis non commodi ut. Nulla eum dolor porro magnam dolores laborum ad rem.
            
            Explicabo earum voluptas velit. Cupiditate sed adipisci perferendis quaerat eos. Ad eum repellat ducimus iste magni sit. Similique dicta perferendis in ut et. Nisi at id dolorem quaerat beatae eum deleniti quaerat.
            
            Esse doloremque nostrum adipisci. Optio aliquid omnis itaque possimus sunt rerum. Nisi rem cupiditate voluptatum rerum veniam sequi ut. Corporis eligendi et et et nobis. Qui quia eos labore dolor. Consectetur nesciunt repellendus non aut inventore consequuntur.
            
            Sequi sed corporis dolorem nostrum non officiis et ad. Ab et sequi enim aperiam repellendus ullam. Reiciendis officia eveniet omnis eveniet corporis mollitia cupiditate maxime. Sapiente sunt esse officiis iusto voluptas ut impedit. Incidunt rerum hic accusantium vitae eaque.
            ',
            'created_at' => now(),
        ]);
    }
}
