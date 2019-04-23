<?php

namespace App\Entity;

class Person
{
    /**
     * @Mapper(type=int,field=ID)
     */
    private $id;

    /**
     * @var int
     * @Mapper(type=string,field=FIRST_NAME)
     */
    private $firstName;

    /**
     * @Mapper(type=string,field=LAST_NAME)
     */
    private $lastName;

    /**
     * @Mapper(type=int,field=EMAIL_ID,relatedClass=App\Entity\Email,mappedBy=id)
     */
    private $email;
}
