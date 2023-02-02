<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\SocialShare;
use Illuminate\Console\Command;
use App\Http\Classes\AppTwitterApi;
use Illuminate\Support\Facades\Log;

class TwitterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Twitter Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @return int
     */
    public function handle()
    {
        $twitterapi = app(AppTwitterApi::class);
        /**
         * Run the cron job every 1 hour to get the latest replies from a tweet
         */
        $tweet = SocialShare::where('type', 'twitter')->whereNull('parentid')->get();
        foreach ($tweet as $row) {
            // get all replies
            $return = $twitterapi->searchTweet($row->socialid);
            //check if this tweet has been stored in the database
            if(isset($return['data'])){
                $data = $return['data'];

                for($x = 0; $x < count($data); $x++){
                    $id = $data[$x]['id'];
                    //check if exists

                    $count = SocialShare::where(['socialid' => $id])->count();

                    if($count == 0){

                        //get user details
                        $u = $twitterapi->getUser($data[$x]['author_id']);
                        SocialShare::create([
                            "postid"  => $row->postid,
                            "type" => "twitter",
                            "parentid" => $row->socialid,
                            "socialid" => $id,
                            "body" => $data[$x]['text'],
                            "userid" => $data[$x]['author_id'],
                            "name" => $u['data']['name'], //
                            "picture" => $u['data']['profile_image_url'] //
                        ]);

                        //create comment
                        Comment::create([
                            "postid" => $row->postid,
                            "author" => $data[$x]['author_id'],
                            "name" => $u['data']['name'], //
                            "picture" => $u['data']['profile_image_url'], //
                            "type" => "twitter",
                            "subject" => "Twitter",
                            "message" => $data[$x]['text'],
                        ]);
                    }
                }
            }

        }

    }
}
