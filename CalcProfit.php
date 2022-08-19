<?php
require('Dates.php');

class CalcProfit {
    protected $deposit;
    private $sumLastMonth = 0;
    private $startDate; // дата открытия вклада
    private $sum; // сумма вклада
    private $term; // срок вклада в месяцах
    private $percent; // процентная ставка, % годовых
    private $sumAdd; // сумма ежемесячного пополнения вклада

    public function __construct(string $startDate, int $sum, int $term, float $percent,
                                float $sumAdd)
    {
        $this->startDate = $startDate;
        $this->sum = $sum;
        $this->term = $term;
        $this->percent = $percent;
        $this->sumAdd = $sumAdd;
    }

    /**
     * @throws Exception
     */
    public function Profit(): int
    {
        $dates = new Dates($this->startDate, $this->term);
        $arrDates = $dates->SplitMethod();

        for ($i = 1; $i <= $this->term; $i++) {
            $daysN = cal_days_in_month(CAL_GREGORIAN, $arrDates[$i][1], $arrDates[$i][2]);
            if ($i == 0 || $i == $this->term-1) $daysN -= $arrDates[$i][0];

            if ($i == 1) $this->sumLastMonth = $this->sum;
            $this->deposit = $this->sumLastMonth + $this->sumLastMonth * $daysN * (($this->percent / 100) / 365);
            $this->sumLastMonth = $this->deposit;
        }
         $this->deposit = $this->sumAdd * $this->term + $this->deposit;

        return (int)$this->deposit;
    }
}