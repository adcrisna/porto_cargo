$(document).ready(function () {
    $("#continueButton").on("click", function () {
        let conveyanceType = $("#conveyance");
        let valueConveyance = conveyanceType.val();

        $("#shipmentDetails").css("display", "block");

        if (valueConveyance === "Land") {
            $("#travelPermissionLand").css("display", "block");
            $("#land").css("display", "block");
            $("#billOfLandingSea").css("display", "none");
            $("#sea").css("display", "none");
            $("#airwayBillAir").css("display", "none");
            $("#air").css("display", "none");
            window.location.hash = "#land";
        } else if (valueConveyance === "Sea") {
            $("#billOfLandingSea").css("display", "block");
            $("#sea").css("display", "block");
            $("#travelPermissionLand").css("display", "none");
            $("#land").css("display", "none");
            $("#airwayBillAir").css("display", "none");
            $("#air").css("display", "none");
            window.location.hash = "#sea";
        } else if (valueConveyance === "Air") {
            $("#airwayBillAir").css("display", "block");
            $("#air").css("display", "block");
            $("#billOfLandingSea").css("display", "none");
            $("#sea").css("display", "none");
            $("#travelPermissionLand").css("display", "none");
            $("#land").css("display", "none");
            window.location.hash = "#air";
        }

        $("#btnCalculate").css("display", "block");
    });
});


