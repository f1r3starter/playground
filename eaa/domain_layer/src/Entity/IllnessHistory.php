<?php

namespace App\Entity;

class IllnessHistory
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var \DateTime
     */
    private $dateTimeFound;

    /**
     * @var \DateTime|null
     */
    private $dateTimeHealed;

    /**
     * @var Patient
     */
    private $patient;

    /**
     * @var Doctor
     */
    private $diagnosedBy;

    public static function addRecordToIllnessHistory(string $name, string $description, \DateTime $dateTimeFound, Patient $patient, Doctor $diagnosedBy, ?\DateTime $dateTimeHealed = null)
    {
        return new self($name, $description, $dateTimeFound, $patient, $diagnosedBy, $dateTimeHealed);
    }

    private function __construct(string $name, string $description, \DateTime $dateTimeFound, Patient $patient, Doctor $diagnosedBy, ?\DateTime $dateTimeHealed)
    {
        $this->name = $name;
        $this->description = $description;
        $this->dateTimeFound = $dateTimeFound;
        $this->dateTimeHealed = $dateTimeHealed;
        $this->patient = $patient;
        $this->diagnosedBy = $diagnosedBy;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return IllnessHistory
     */
    public function changeIllnessName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getIllnessName()
    {
        return $this->name;
    }

    /**
     * @param string $description
     *
     * @return IllnessHistory
     */
    public function changeDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return \DateTime
     */
    public function getDateTimeFound()
    {
        return $this->dateTimeFound;
    }

    /**
     * @param \DateTime|null $dateTimeHealed
     *
     * @return IllnessHistory
     */
    public function setDateTimeHealed($dateTimeHealed = null)
    {
        $this->dateTimeHealed = $dateTimeHealed;

        return $this;
    }

    /**
     * Get dateTimeHealed.
     *
     * @return \DateTime|null
     */
    public function getDateTimeHealed()
    {
        return $this->dateTimeHealed;
    }


    /**
     * Get patient.
     *
     * @return Patient|null
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Get diagnosedBy.
     *
     * @return Doctor|null
     */
    public function getDiagnosedBy()
    {
        return $this->diagnosedBy;
    }
}
