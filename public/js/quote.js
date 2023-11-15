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

            $("#travelPermissionLand").attr("required", true);
            $("#licensePlate").attr("required", true);
            $("#billOfLanding").attr("required", false);
            $("#airwayBill").attr("required", false);
            $("#shipName").attr("required", false);
            $("#vesselGroup").attr("required", false);
            $("#containerLoad").attr("required", false);
            $("#vesselMaterial").attr("required", false);
            $("#vesselType").attr("required", false);
            $("#classified").attr("required", false);
            $("#builtYear").attr("required", false);
            window.location.hash = "#land";
        } else if (valueConveyance === "Sea") {
            $("#billOfLandingSea").css("display", "block");
            $("#sea").css("display", "block");
            $("#travelPermissionLand").css("display", "none");
            $("#land").css("display", "none");
            $("#airwayBillAir").css("display", "none");
            $("#air").css("display", "none");

            $("#travelPermissionLand").attr("required", false);
            $("#licensePlate").attr("required", false);
            $("#billOfLanding").attr("required", true);
            $("#airwayBill").attr("required", false);
            $("#shipName").attr("required", true);
            $("#vesselGroup").attr("required", true);
            $("#containerLoad").attr("required", true);
            $("#vesselMaterial").attr("required", true);
            $("#vesselType").attr("required", true);
            $("#classified").attr("required", true);
            $("#builtYear").attr("required", true);
            window.location.hash = "#sea";
        } else if (valueConveyance === "Air") {
            $("#airwayBillAir").css("display", "block");
            $("#air").css("display", "block");
            $("#billOfLandingSea").css("display", "none");
            $("#sea").css("display", "none");
            $("#travelPermissionLand").css("display", "none");
            $("#land").css("display", "none");

            $("#travelPermissionLand").attr("required", false);
            $("#licensePlate").attr("required", false);
            $("#billOfLanding").attr("required", false);
            $("#airwayBill").attr("required", true);
            $("#shipName").attr("required", false);
            $("#vesselGroup").attr("required", false);
            $("#containerLoad").attr("required", false);
            $("#vesselMaterial").attr("required", false);
            $("#vesselType").attr("required", false);
            $("#classified").attr("required", false);
            $("#builtYear").attr("required", false);
            window.location.hash = "#air";
        }

        $("#btnCalculate").css("display", "block");
    });
});
