<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $messages = new Message();
       $messages->sender_id = '1';
       $messages->sent_to_id = '3';
       $messages->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
       sunt in culpa qui officia deserunt mollit anim id est laborum.';
       $messages->subject = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
       sunt in culpa qui officia deserunt mollit anim id est laborum.';
       $messages->save();

       $messages2 = new Message();
       $messages2->sender_id = '2';
       $messages2->sent_to_id = '3';
       $messages2->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
       sunt in culpa qui officia deserunt mollit anim id est laborum.';
       $messages2->subject = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
       sunt in culpa qui officia deserunt mollit anim id est laborum.';
       $messages2->save();
     }
}
