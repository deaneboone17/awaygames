<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShareTrip extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //public $data;
    public $depart;
    public $return;
    public $ticket;
    public $hotel;
    public $poi;
    public $trip;
    public $sender;
    public $connectCount;
    public $connectCountR;
    public $tripDurationD;
    public $tripDurationC;

    public function __construct($depart,$return,$ticket,$hotel,$poi,$trip,$sender,$connectCount,$connectCountR,$tripDurationD,$tripDurationC)
    {
        //
        $this->depart = $depart;
        $this->return = $return;
        $this->ticket = $ticket;
        $this->hotel = $hotel;
        $this->poi = $poi;
        $this->trip = $trip;
        $this->sender = $sender;
        $this->connectCount = $connectCount;
        $this->connectCountR = $connectCountR;
        $this->tripDurationD = $tripDurationD;
        $this->tripDurationC = $tripDurationC;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('share@awaygames.com')
                    ->view('emails.share')
                    ->subject('Shared Trip From AwayGames')
                    ;
        //->with(['depart'=>$this->depart],['return'=>$this->return]);
    }
}
