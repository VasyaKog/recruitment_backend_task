<?php

declare(strict_types=1);

namespace Domain\Date\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class InputDto
{
    /**
     * @Assert\Date()
     * @Assert\NotBlank()
     */
    private string $date;

    /**
     * @Assert\Timezone()
     * @Assert\NotBlank()
     */
    private string $timezone;

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): InputDto
    {
        $this->date = $date;

        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): InputDto
    {
        $this->timezone = $timezone;

        return $this;
    }
}