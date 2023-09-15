<?php

namespace App\Http\Services\Message\Email;

use App\Http\Interfaces\MessageInterface;

class EmailService implements MessageInterface
{
    private $details;
    private $subject;
    private $from = [
            ['address' => null , 'name' => null]
    ];
    private $to;

    public function fire()
    {

    }

    public function getDetails(){
        return $this->details;
    }

    public function setDetails($details){
        $this->details = $details;
    }

    public function getSubject(){
        return $this->subject;
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

    public function getFrom(){
        return $this->from;
    }

    public function setFrom($from){
        $this->from = $from;
    }

    public function getTo(){
        return $this->to;
    }

    public function setTo($to){
        $this->to = $to;
    }
}