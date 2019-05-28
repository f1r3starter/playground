<?php


namespace App\Repository\SelectionFactory;


class DoctorSelectionModel implements SelectionModel
{
    /**
     * @var string
     */
    private $speciality;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @return string
     */
    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    /**
     * @param string $speciality
     * @return DoctorSelectionModel
     */
    public function setSpeciality(string $speciality): DoctorSelectionModel
    {
        $this->speciality = $speciality;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return DoctorSelectionModel
     */
    public function setFirstName(string $firstName): DoctorSelectionModel
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return DoctorSelectionModel
     */
    public function setLastName(string $lastName): DoctorSelectionModel
    {
        $this->lastName = $lastName;
        return $this;
    }
}
