<?php

namespace App\Entity;

class IllnessHistory
{
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
     * @var int
     */
    private $idIllness;

    /**
     * @var \Patient
     */
    private $idPatient;


    /**
     * Set name.
     *
     * @param string $name
     *
     * @return IllnessHistory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return IllnessHistory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateTimeFound.
     *
     * @param \DateTime $dateTimeFound
     *
     * @return IllnessHistory
     */
    public function setDateTimeFound($dateTimeFound)
    {
        $this->dateTimeFound = $dateTimeFound;

        return $this;
    }

    /**
     * Get dateTimeFound.
     *
     * @return \DateTime
     */
    public function getDateTimeFound()
    {
        return $this->dateTimeFound;
    }

    /**
     * Set dateTimeHealed.
     *
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
     * Get idIllness.
     *
     * @return int
     */
    public function getIdIllness()
    {
        return $this->idIllness;
    }

    /**
     * Set idPatient.
     *
     * @param \Patient|null $idPatient
     *
     * @return IllnessHistory
     */
    public function setIdPatient(\Patient $idPatient = null)
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    /**
     * Get idPatient.
     *
     * @return \Patient|null
     */
    public function getIdPatient()
    {
        return $this->idPatient;
    }
}
