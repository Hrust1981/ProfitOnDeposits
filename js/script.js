$("#sumAdd-checkbox").on('click',function () {
    let $sumAdd = $("#sumAdd");
    this.checked === true ? $sumAdd.show() : $sumAdd.hide();
})

$("#date").on("change", function () {
    let date = $("#date").val();
    date !== "" ? document.querySelector('.date').style.border = "1px solid #33C4A0" :
        document.querySelector('.date').style.border = "1px solid #000000";
});

$("#date").on("focusout", function () {
    let date = $("#date").val();
    let $errorDate = $("#error-date");
    if (date !== "") $errorDate.hide();
    else $errorDate.show();
})
$("#term").on("focusout", function () {
    let term = $("#term").val().trim();
    let $errorMess = $("#errorMess");
    if (term > 0 && term <= 60) {
        $errorMess.hide();
        document.querySelector('.months').style.border = "1px solid #000000";
    }
    else {
        $errorMess.show();
        document.querySelector('.months').style.border = "1px solid #FF5A5F";
    }
})
$("#sum").on("focusout", function () {
    let sum = $("#sum").val().trim();
    let $errorSum = $("#error-sum");
    sum >= 1000 && sum <= 3000000 ? $errorSum.hide() : $errorSum.show();
})
$("#percent").on("focusout", function () {
    let percent = $("#percent").val().trim();
    let $errorPercent = $("#error-percent");
    percent >= 3 && percent <= 100 ? $errorPercent.hide() : $errorPercent.show();
})
$("#sumAdd").on("focusout", function () {
    let sumAdd = $("#sumAdd").val().trim();
    let $errorSumAdd = $("#error-sumAdd");
    sumAdd >=0 && sumAdd <= 3000000 ? $errorSumAdd.hide() : $errorSumAdd.show();
})

$("#btn-calc").on("click", function () {
    let term = $("#term").val().trim();
    let sum = $("#sum").val().trim();
    let percent = $("#percent").val().trim();
    let sumAdd = $("#sumAdd").val().trim();
    let date = $("#date").val();

    if (date === "") {
        $("#error-date").show();
        return false;
    }
    if (term > 60 || term <= 0) {
        $("#errorMess").show();
        document.querySelector('.months').style.border = "1px solid #FF5A5F";
        return false;
    }
    if (sum < 1000 || sum > 3000000) {
        $("#error-sum").show();
        return false;
    }
    if (percent < 3 || percent > 100 ) {
        $("#error-percent").show();
        return false;
    }
    if (sumAdd < 0 || sumAdd > 3000000) {
        $("#error-sumAdd").show();
        return false;
    }


    $.ajax({
        url: 'calc.php',
        type: 'POST',
        cache: false,
        data: {
            "startDate": date,
            "sum": sum,
            "term": term,
            "percent": percent,
            "sumAdd": sumAdd
        },
        dataType: 'json',
        success: function (data) {
            document.querySelector('.summ_label').textContent = '₽ ' + data;
            $(".summ").show();
        }
    });
});


