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
        $artists = $this->db->get('artist', array('spotify_id', 'name', 'popularity', 'id_image'));

        var_dump($artists);

        return $artists;
    }
}
