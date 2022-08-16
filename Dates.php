<?php

class Dates {
    private $startDate;
    private $term;

    public function __construct(string $startDate, int $term)
    {
        $this->startDate = $startDate;
        $this->term = $term;
    }

    /**
     * @throws Exception
     */
    private function SplitTermByDate(): array
    {
        $arrDates = array();
        for ($i = 1; $i <= $this->term; $i++) {
            $date = new DateTime($this->startDate);
            $interval = new DateInterval('P'. $i. 'M');
            $newDate = $date->add($interval);

            $arrDates[$i] = $newDate->format('d m y');
        }
        return $arrDates;
    }

    /**
     * @throws Exception
     */
    public function SplitMethod(): array
    {
        $dates = $this->SplitTermByDate();
        $splitDatesByParts = array();
        $arrDates = array();

        for ($i = 1; $i <= $this->term; $i++) {
            $val = str_split($dates[$i], 3);
            for ($j = 0; $j < 3; $j++) {
                $splitDatesByParts[$j] = $val[$j];
            }
            $arrDates[$i] = $splitDatesByParts;
        }

        return $arrDates;
    }
}