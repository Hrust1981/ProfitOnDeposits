<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Profit on deposits</title>
    <style>
        hr {
            border: none;
            background-color: rgba(0, 0, 0, 0.61);
            color: rgba(0, 0, 0, 0.61);
            height: 1px;
        }
    </style>
</head>
<body>
    <div class="rectangle">
        <img src="/assets/img/logo_iqdev.png" alt="">
        <p>Deposit Calculator</p>
    </div>
    <div class="container">
        <h1>Депозитный калькулятор</h1>
        <p>Калькулятор депозитов позволяет рассчитать ваши доходы после внесения
            суммы на счет в банке по опредленному тарифу.</p>
        <form id="form">
            <input class="date" type="date" id="date" name="date" placeholder="Date">
            <input class="months" type="number" id="term" name="term" placeholder="Срок вклада в мес.">
            <input class="deposit-amount" type="number" id="sum" name="sum" placeholder="Сумма вклада">
            <input class="interest-rate" type="number" id="percent" name="percent"
                   placeholder="Процентная ставка, % годовых">
            <input class="deposit" value="0" type="number" id="sumAdd" name="sumAdd"
                   placeholder="Сумма пополнения вклада" hidden>
            <div class="deposit-replenishment">
                <input class="deposit-replenishment_input" type="checkbox"
                       id="sumAdd-checkbox" name="sumAdd-checkbox">
                <p>Ежемесячное пополнение вклада</p>
            </div>
            <div class="error-term" id="errorMess"></div>
            <button class="btn_calc" type="button" id="btn-calc">Рассчитать</button>
        </form>
        <hr>
        <div class="summ" hidden>
            <span>Сумма к выплате</span>
            <label class="summ_label"></label>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>