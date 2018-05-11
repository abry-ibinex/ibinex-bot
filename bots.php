<?php
require_once('vendor/autoload.php');
 
$loop = React\EventLoop\Factory::create();
 
$client = new Slack\RealTimeClient($loop);
$client->setToken('xoxb-361644715173-ODpdwJHNbAVrEd2ZY2VvjpA5');
$client->connect();
 
$client->on('message', function ($data) use ($client) {
    $client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
        
        if ($data['text'] == "shuffle"){
        
        $a = ['Jovi',
'Reynaldo',
'Chester',
'Joshua',
'Cristina',
'Ricky',
'Kevin Jordan',
'Stephene',
'Gabriel',
'Joel',
'Ace',
'Abry',
'Lester',
'Mark',
'Sean',
'JC',
'Kevin Soriano',
'PJ',
'Philip',
'Leo',
'Melvin',
'Jeevon',
'Ariel',
'Michael',
'Rochelle',
'Ryan',
'Adrian',
'Nelson',
'Izza',
'Bryan',
'Eric',
'Dennis'];
        
        shuffle($a);
        $groupa = array_slice($a,0,11);
        $groupb = array_slice($a,11,11);
        $groupc = array_slice($a,23,10);
        
        $m = "Group A: \n";
        
        foreach ($groupa as $v){
            $m .= "$v, ";
        }
        
        $m .= "\nGroup B: \n";
            
        foreach ($groupb as $v){
            $m .= "$v, ";
        }
        
        $m .= "\nGroup C: \n";
            
        foreach ($groupc as $v){
            $m .= "$v, ";
        }
        
        $message = $client->getMessageBuilder()
                    ->setText($m)
                    ->setChannel($channel)
                    ->create();
        $client->postMessage($message);
            
        }
    });
});

$loop->run();
