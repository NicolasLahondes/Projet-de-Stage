<?php

namespace Compass;

use Compass\Database;

class Api
{
    public function __construct()
    {
    }

    public function return(bool $success, string $message)
    {
        $returnMessage = [
            "success" => $success,
            "message" => $message
        ];

        echo json_encode($returnMessage);
    }


    public function deleteArtist()
    {
        
        $this->return(false, "Error, cannot delete artist.");
    }
}
