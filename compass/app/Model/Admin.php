<?php

namespace Compass;

use Compass\Database;

class Admin
{

    public function __construct()
    {
        $this->db = new Database();
    }


    public function admin()
    {
    }

    public function manageArtists()
    {
        // $artists = $this->db->get('artist', array('spotify_id', 'name', 'popularity', 'id_image'));

        $artists = $this->db->getUserArtist();

        print_r($artists);

        foreach ($artists as $artist) {
            
            echo $artist->name;
            echo "<br>";
            echo $artist->id_user;
            echo "<br>";

        }
        exit;

        return $artists;
    }
}
