<?php

namespace App\Http\Controllers;

use App\RoughTest;
use Illuminate\Http\Request;

class MessangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //receive the JSON from facebook
        $feedData = file_get_contents('php://input');
        //$this->saveToDB($feedData);
        //exit;

        $data = json_decode($feedData);
        $field = $data->entry[0]->changes[0]->field;
        //$this->saveToDB($field);

        if ($field == "feed") { //all types of feed notification like,add comments,remove comments
            $id = $data->entry[0]->changes[0]->value->from->id;
            $name = $data->entry[0]->changes[0]->value->from->name;
            $permalink_url = $data->entry[0]->changes[0]->value->post->permalink_url;
            $comments_txt = $data->entry[0]->changes[0]->value->message;

            $this->saveToDB($feedData);
            $this->saveToDB($comments_txt);


            if(preg_match("/#/",$comments_txt)){

                $this->saveToDB("truely true");
                $msg_for_send = "hello, $name! $permalink_url";
                $this->sendMessage2($id, $msg_for_send);
            }else{
                $this->saveToDB("false");
            }

        }/*else{
            $this->saveToDB("message");
        }*/

        exit;


        //$this->verifyAccess();
        $rough_test = new RoughTest();
        $rough_test->json = $id;
        $rough_test->save();

        //$message = $feedData['entry'][0]['messaging']['message']['text'];

        /*$response = [

            'recipient' => ['id' => $id],
            'message' => ['text' => 'Hello World! :)']
        ];*/


        //$this->sendMessage($response);

        $msg = "hello, $name!";
        $this->sendMessage2($id, $msg);
        exit;

        if (isset($_GET['hub_mode']) && isset($_GET['hub_challenge']) && isset($_GET['hub_verify_token'])) {

            //here we can verify the webhook
            //i create a method for that
            $this->verifyAccess();
        } else {

            $feedData = file_get_contents('php://input');
            //save the feedback to database

            $this->saveToDB($feedData);


            $data = json_decode($feedData);

            if ($data->object == "no") {
                //$comment_id = $data->entry[0]->changes[0]->value->from->name;
                $comment_id = $data->entry[0]->changes[0]->value->comment_id;

                //page access token
                $accessToken = "EAAaIKirgOfkBABZCrKHLZA9ZB9bxhYXTykLaPWZAIuFOxjx9jYBKqNL3voKzrdFWQ4H4X24KXLisiN7gsr5zF8LfBd22JM1OBvilCiF6M6HDPwkNgtSEcZCHN6SGjlsbaaGQJCRUa5QwoibkGWLl7ipSD8B65lokIoZCUiqlsU73julnoaPX0e";
                $reply = "Hey i have got your comment !! :) its a test :P ignore it";


                $this->saveToDB($comment_id);


                /*cURL for replying on comments by specific comment id
                        we use cUrl to send information to one place to another just like Ajax

                */
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //we don't want to verify host
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //we also don't want to verify peer
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //we want to return the transfer from this
                curl_setopt($ch, CURLOPT_POSTFIELDS, "message=$reply&access_token=$accessToken");     //what we are sending to the facebook
                curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v3.2/$comment_id/private_replies");     //what we are sending to the facebook

                //the last option to set
                curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36");  //how to get user agent?-> https://www.whoishostingthis.com/tools/user-agent/

                /*Now we need to execute this code handle*/
                $response = curl_exec($ch);
                curl_close($ch);

                //save the feedback to database
                $this->saveToDB("response:" . $response);



            }

            //exit;
            /* $handle = fopen('test.txt','w');
             fwrite($handle,$feedData);
             fclose($handle);
             http_response_code(200);*/


            //receive the JSON from facebook
            $input = json_decode(file_get_contents('php://input'), true);

            $id = $input['entry'][0]['messaging'][0]['sender']['id'];

            $message = $input['entry'][0]['messaging']['message']['text'];

            $response = [

                'recipient' => ['id' => $id],
                'message' => ['text' => 'Hello World! :)']
            ];


            //$this->sendMessage($response);

            $this->sendMessage2($id);


        }

    }

    public function saveToDB($data)
    {
        $rough_test = new RoughTest();
        $rough_test->json = $data;
        $rough_test->save();
    }

    public function verifyAccess()
    {
        $this->saveToDB("hello");

        //echo "hello";

        $local_token = env('FACEBOOK_MESSENGER_WEBHOOK_TOKEN'); //token saved in local

        $hub_verify_token = request('hub_verify_token'); //token collected from live


        //condition if our local token is equal to hub_verify_token
        if ($hub_verify_token == $local_token) {

            //echo the hub_challenge in able  to verify

            echo request('hub_challenge');

            //exit;
        }


    }


    public function sendMessage($response)
    {
        //dd($response);
        //set our post
        $ch = curl_init('https://graph.facebook.com/v3.2/me/messages?access_token=' . env('PAGE_ACCESS_TOKEN'));

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));

        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);

        curl_exec($ch);
        curl_close($ch);
    }


    public function sendMessage2($id, $msg)
    {

        $page_accessToken = "EAAFmjwN4vMsBAJoswxUaNxkZA52zquV8YZBygpxXokksUXFb6yV9ZCiFKa20nNA599Tdf0gqzkaeZAhQWUGU67JJWDFjQ7uDWxV9e784fhPKLHZAgyZCf7ujwE4x8oZAPvZAy7K9ZA7AoxmUiZB1KZAv0CgRC3Cl02EZAKO9BGFUiZCnwTAZDZD";


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.6/me/messages?access_token=' . $page_accessToken);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"recipient\":{\n    \"id\":\"$id\"\n  },\n  \"message\":{\n    \"text\":\"$msg\"\n  }\n}");
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
            $this->saveToDB("curl err :-> " . curl_error($ch));
        } else {
            $this->saveToDB("result : " . $result);
        }
        curl_close($ch);
    }

    public function test()
    {
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/

        $user_id = env('USER_ID');
        $app_id = env('APP_ID');
        $page_access_token = env('PAGE_ACCESS_TOKEN');
        $appsecret_proof = env('APP_SECRET');


        $ch = curl_init();

        //curl_setopt($ch, CURLOPT_URL, '/{user-id}/ids_for_apps?app=10152368852405295&access_token=[page_access_token]&appsecret_proof=[appsecret_proof]');
        curl_setopt($ch, CURLOPT_URL, '/' . $user_id . '/ids_for_apps?app=' . $app_id . '&access_token=' . $page_access_token . '&appsecret_proof=' . $appsecret_proof);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        dd($result);
        //echo "test";
    }

    public function webhook()
    {
        echo "webhook";
    }


}
