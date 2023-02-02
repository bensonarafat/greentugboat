<?php

namespace App\Http\Classes;

use Coderjerk\BirdElephant\BirdElephant;
use Coderjerk\BirdElephant\Users\UserLookup;

class AppTwitterApi{

    private $consumer_secret;

    private $consumer_key;

    private $access_token_secret;

    private $access_token;

    private $appid;

    private $bearer_token;

    private $twitter;

    private $user;

    public function __construct(){
        $this->consumer_secret = "qO73GMskiymcsgf1YaTqnV4U5jRmqel0yG6St1mevolCqfPW9q";
        $this->consumer_key = "6gH71f36jkuvR8pVRF3vKM0A8";
        $this->access_token = "1523643984534454272-pnRrbLRJT77connPQOREq3Qg1A2hjB";
        $this->access_token_secret = "7bCzVD1SpQJE1HEO33H4yRITRkPf26scOcCIGpfEVJcQ8";
        $this->appid = "25000713";
        $this->bearer_token = "AAAAAAAAAAAAAAAAAAAAAAl7fQEAAAAAh0THA6%2FBquNqboKneW6ekd4QuWY%3DN3GnkYPsKu3ehorYiwyl8e6vT3247bp1NLao9BI8NmDyZVm1CU";
        $credentials = array(
            'bearer_token' => $this->bearer_token,
            'consumer_key' => $this->consumer_key,
            'consumer_secret' => $this->consumer_secret,
            'token_identifier' => $this->access_token,
            'token_secret' => $this->access_token_secret,
        );
        $this->twitter = new BirdElephant($credentials);
        $this->user = new UserLookup($credentials);
    }


    public function postTweet($tweet, $attachment){

        // first, use the tweeets()->upload method to upload your image file
        $image = $this->twitter->tweets()->upload($attachment);
        //pass the returned media id to a media object as an array
        $media = (new \Coderjerk\BirdElephant\Compose\Media)->mediaIds(
            [
                $image->media_id_string
            ]
        );
        $tweet = (new \Coderjerk\BirdElephant\Compose\Tweet)->text($tweet)->media($media);
        return $this->twitter->tweets()->tweet($tweet);
    }

    public function searchTweet($tweetid){

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitter.com/2/tweets/search/recent?query=conversation_id:'.$tweetid.'&tweet.fields=in_reply_to_user_id,author_id,created_at,conversation_id&user.fields=description,id,name,url,username',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAAl7fQEAAAAAh0THA6%2FBquNqboKneW6ekd4QuWY%3DN3GnkYPsKu3ehorYiwyl8e6vT3247bp1NLao9BI8NmDyZVm1CU',
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

        return json_decode($response, true);
    }

    public function deleteTweet($tweet_id){
        $tweets = $this->twitter->tweets();
        $tweets->delete($tweet_id);
    }

    public function getUser($id){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.twitter.com/2/users/'. $id .'?user.fields=description,id,name,url,username,profile_image_url',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAAl7fQEAAAAAh0THA6%2FBquNqboKneW6ekd4QuWY%3DN3GnkYPsKu3ehorYiwyl8e6vT3247bp1NLao9BI8NmDyZVm1CU',
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);

    }
}
?>
