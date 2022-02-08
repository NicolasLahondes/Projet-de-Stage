<?php

namespace Compass;

use Compass\Database;

class User
{
    private $id;
    private $username;
    private $firstname;
    private $lastname;
    private $mail;
    private $artists;
    private $password;
    private $accountcreationdate;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * getId
     *
     * @return void
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * setId
     *
     * @param  mixed $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * getUsername
     *
     * @return void
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * setUsername
     *
     * @param  mixed $username
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * getFirstname
     *
     * @return void
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * setFirstname
     *
     * @param  mixed $firstname
     * @return void
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * getLastname
     *
     * @return void
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * setLastname
     *
     * @param  mixed $lastname
     * @return void
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * getMail
     *
     * @return void
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * setMail
     *
     * @param  mixed $mail
     * @return void
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    public function getArtist()
    {
        return $this->artists;
    }

    /**
     * setArtist
     *
     * @param  mixed $artists
     * @return void
     */
    public function setArtist($artists)
    {
        $this->artists = $artists;
        return $this;
    }

    /**
     * getPassword
     *
     * @return void
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * setPassword
     *
     * @param  mixed $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * getAccountcreationDate
     *
     * @return void
     */
    public function getAccountcreationDate()
    {
        return $this->accountcreationdate;
    }

    /**
     * setAccountcreationDate
     *
     * @param  mixed $accountcreationdate
     * @return void
     */
    public function setAccountcreationDate($accountcreationdate)
    {
        $this->accountcreationdate = $accountcreationdate;
        return $this;
    }

    // getfunctions


    public function getUsers()
    {
        $users = $this->db->get('user', array ('username'));
        return $users;
    }
}
