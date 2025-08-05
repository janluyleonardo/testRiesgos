<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();
        foreach ($user as $u) {
            for ($i = 0; $i < 10; $i++) {
                // Insert a question for each user
                DB::table('questions')->insert([
                    'question' => 'Pregunta de ejemplo' . $i + 1 . 'para ' . $u->name,
                    'answer' => 'Respuesta ' . $i + 1,
                    'option_one' => 'Opción uno',
                    'option_two' => 'Opción dos',
                    'option_three' => 'Opción tres',
                    'question_status' => true,
                    'user_id' => $u->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
