$(document).ready(function () {
    $(".detail-qty").each(function () {
        var qtyval = parseInt($(this).find(".qty-val").text(), 10);
        $(".qty-up").on("click", function (event) {
            event.preventDefault();
            qtyval = qtyval + 1;
            $(this).prev().text(qtyval);
        });
        $(".qty-down").on("click", function (event) {
            event.preventDefault();
            qtyval = qtyval - 1;
            if (qtyval > 1) {
                $(this).next().text(qtyval);
            } else {
                qtyval = 1;
                $(this).next().text(qtyval);
            }
        });
    });
});
