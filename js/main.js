$(function () {
    function fixedfooter () {
        $("footer").removeClass("fix_bottom");
            var th = document.body.scrollHeight,
                wh = window.innerHeight;
        if (!(th > wh)) {
            $("footer").addClass("fix_bottom");
        }else{
            $("footer").removeClass("fix_bottom");
        }
    };
    fixedfooter();
    $(window).resize(fixedfooter);
});


function deletecar (val) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            $code = xmlhttp.response;
            if ($code = 1) {
                alert("Car Deleted");
                location.reload();
            }
            
        }
    };
    xmlhttp.open("GET", "delete_car.php?carid="+val, true);
    xmlhttp.send();
}