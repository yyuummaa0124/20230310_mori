<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'tag_id' => '1',
            'content' => 'あああ',
        ];
        Todo::create($param);
        $param = [
            'user_id' => '2',
            'tag_id' => '2',
            'content' => 'いいい',
        ];
        Todo::create($param);
        $param = [
            'user_id' => '3',
            'tag_id' => '3',
            'content' => 'ううう',
        ];
        Todo::create($param);
        $param = [
            'user_id' => '4',
            'tag_id' => '4',
            'content' => 'えええ',
        ];
        Todo::create($param);
        $param = [
            'user_id' => '5',
            'tag_id' => '5',
            'content' => 'おおお',
        ];
        Todo::create($param);
        $param = [
            'user_id' => '6',
            'tag_id' => '2',
            'content' => 'あいうえお',
        ];
        Todo::create($param);
    }
}
