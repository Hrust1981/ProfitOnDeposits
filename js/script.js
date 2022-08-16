$("#sumAdd-checkbox").on('click',function () {
    if (this.checked === true)
        $("#sumAdd").show();
    else
        $("#sumAdd").hide();
})

$("#date").on("change", function () {
    let date = $("#date").val();
    date !== "" ? document.querySelector('.date').style.border = "1px solid #33C4A0" :
        document.querySelector('.date').style.border = "1px solid #000000";
    this.date = date;
});

$("#btn-calc").on("click", function () {
    let term = $("#term").val().trim();
    let sum = $("#sum").val().trim();
    let percent = $("#percent").val().trim();
    let sumAdd = $("#sumAdd").val().trim();

    if (term > 60) {
        $("#errorMess").text("Не более 5 лет");
        document.querySelector('.months').style.border = "1px solid #FF5A5F";
        return false;
    }
    else if (sum < 1000 || sum > 3000000 || sumAdd < 0 ||
        sumAdd > 3000000 || percent < 3 || percent > 100 || term <= 0)
        return false;

    $("#errorMess").text("");
    document.querySelector('.months').style.border = "1px solid #000000";

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
        beforeSend: function () {
            $("#btn-calc").prop("disabled", true);
        },
        success: function (data) {
            document.querySelector('.summ_label').textContent = '₽ ' + data;
            $(".summ").show();
            $("#btn-calc").prop("disabled", false);
        }
    });
});


