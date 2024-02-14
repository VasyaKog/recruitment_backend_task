<?php

declare(strict_types=1);

namespace Domain\Date\Dto;

final class ResultDto
{
    public string $timezoneMinutesOffsetWithUtc;

    public int $dayCountInFebruaryInSelectedYear;

    public int $selectedMonthDateDayCount;

    public string $selectedMonthName;

    public function getTimezoneMinutesOffsetWithUtc(): string
    {
        return $this->timezoneMinutesOffsetWithUtc;
    }

    public function setTimezoneMinutesOffsetWithUtc(string $timezoneMinutesOffsetWithUtc): ResultDto
    {
        $this->timezoneMinutesOffsetWithUtc = $timezoneMinutesOffsetWithUtc;

        return $this;
    }

    public function getDayCountInFebruaryInSelectedYear(): int
    {
        return $this->dayCountInFebruaryInSelectedYear;
    }

    public function setDayCountInFebruaryInSelectedYear(int $dayCountInFebruaryInSelectedYear): ResultDto
    {
        $this->dayCountInFebruaryInSelectedYear = $dayCountInFebruaryInSelectedYear;

        return $this;
    }

    public function getSelectedMonthDateDayCount(): int
    {
        return $this->selectedMonthDateDayCount;
    }

    public function setSelectedMonthDateDayCount(int $specifiedMonthDateDay): ResultDto
    {
        $this->selectedMonthDateDayCount = $specifiedMonthDateDay;

        return $this;
    }

    public function getSelectedMonthName(): string
    {
        return $this->selectedMonthName;
    }

    public function setSelectedMonthName(string $selectedMonthName): ResultDto
    {
        $this->selectedMonthName = $selectedMonthName;

        return $this;
    }
}