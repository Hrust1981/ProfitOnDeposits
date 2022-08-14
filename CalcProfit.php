<?php
require('Dates.php');

class CalcProfit {
    protected $deposit;
    private $sumLastMonth;
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
    public function Profit()
    {
        $dates = new Dates($this->startDate, $this->term);
        $arrDates = $dates->SplitMethod();

        for ($i = 0; $i < $this->term; $i++) {
            $daysN = cal_days_in_month(CAL_GREGORIAN, $arrDates[$i][1], $arrDates[$i][2]);
            if ($i == 0) {
                $daysN -= $arrDates[$i][0];
            }
            else if ($i == $this->term-1) {
                $daysN -= $arrDates[$i][0];
            }
            $this->deposit = $this->sumLastMonth + ($this->sumLastMonth + $this->sumAdd) * $daysN * ($this->percent / 365);
            $this->sumLastMonth = $this->deposit;
        }


        return (int)$this->deposit;
    }
}