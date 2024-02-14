<?php

declare(strict_types=1);

namespace Domain\Date;

use Domain\Date\Dto\InputDto;
use Domain\Date\Dto\ResultDto;
use DateTime;
use DateTimeZone;

final class DateManager
{
    private const SECONDS_IN_HOUR = 60;
    public function process(
        InputDto $inputDto
    ): ResultDto {
        $result = new ResultDto();

        $dateTime = self::getDateTimeForSpecificDate($inputDto->getDate(), $inputDto->getTimezone());

        $result->setTimezoneMinutesOffsetWithUtc($this->getOffsetWithUtcInMinutes($dateTime));

        $result->setDayCountInFebruaryInSelectedYear($this->getCurrentYearFebruaryDayCount($dateTime));

        $result->setSelectedMonthDateDayCount($this->getSelectedMonthDayCount($dateTime));

        $result->setSelectedMonthName($this->getSelectedMonthName($dateTime));

        return $result;
    }


    private function getOffsetWithUtcInMinutes(DateTime $dateTime): string
    {
        $offsetInMinutes = $dateTime->getOffset() / self::SECONDS_IN_HOUR;

        return sprintf('%+d', $offsetInMinutes);
    }

    private function getSelectedMonthDayCount(DateTime $dateTime): int
    {
        return (int) $dateTime->format('t');
    }

    private function getCurrentYearFebruaryDayCount(DateTime $dateTime): int
    {
        return (int) (clone $dateTime)
            ->modify('first day of february')
            ->format('t')
        ;
    }

    private function getDateTimeForSpecificDate(
        string  $date,
        ?string $timezone = null
    ): DateTime {
        return new DateTime($date, $timezone ? new DateTimeZone($timezone) : null);
    }

    private function getSelectedMonthName(DateTime $dateTime): string
    {
        return $dateTime->format('F');
    }
}