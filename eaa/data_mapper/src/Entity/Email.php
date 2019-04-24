<?php

namespace App\Entity;

/**
 * @Table(name=EMAIL)
 */
class Email
{
    /**
     * @Column(primary,name=ID)
     */
    private $id;

    /**
     * @Column(name=EMAIL_ID,relatedClass=App\Entity\Email)
     */
    private $email;
}
