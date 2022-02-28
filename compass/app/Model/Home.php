<?php
namespace Compass;

class Home {

    public function __construct()
    {
        $this->db = new Database();
    }

    public function home()
    {
        $home = $this->db->get('user', array('username', 'firstname', 'lastname'));
        return $home;
    }

}