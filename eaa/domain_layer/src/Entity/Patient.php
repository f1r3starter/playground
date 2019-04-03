<?php

namespace App\Entity;

class Patient extends Person
{
    /**
     * @var string[]
     */
    private $illnessHistory = [];

    /**
     * @var string[]
     */
    private $allergiesHistory = [];

    /**
     * @return string[]
     */
    public function getIllnessHistory(): array
    {
        return $this->illnessHistory;
    }

    /**
     * @param string $illness
     *
     * @return self
     */
    public function diagnoseIllness(string $illness): self
    {
        $this->illnessHistory[] = $illness;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAllergiesHistory(): array
    {
        return $this->allergiesHistory;
    }

    /**
     * @param string $allergy
     *
     * @return self
     */
    public function diagnoseAllergy(string $allergy): self
    {
        $this->allergiesHistory[] = $allergy;

        return $this;
    }
}
