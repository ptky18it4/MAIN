var p = document.querySelector("#timeout");
var tet = new Date("Jan 9,2020 24:00:00").getTime();
//Tổng số giây
var countDown = setInterval(run, 1000);

function run() {
    var now = new Date().getTime();
    //Số s đến thời gian hiện tại
    var timeRest = tet - now;
    //Số s còn lại để đến tết;
    var day = Math.floor(timeRest / (1000 * 60 * 60 * 24));
    //Số ngày còn lại
    var hours = Math.floor(
        (timeRest % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    // Số giờ còn lại
    var minute = Math.floor((timeRest % (1000 * 60 * 60)) / (1000 * 60));
    // Số phút còn lại
    var sec = Math.floor((timeRest % (1000 * 60)) / 1000);

    p.innerHTML =
        "<li><div><h3>" + day +
        "</h3><span>Days</span></div></li><li><div><h3 >" + hours +
        "</h3><span>Hours</span></div></li><li><div><h3 >" + minute +
        "</h3><span>Mins</span></div></li><li><div><h3 >" + sec +
        "</h3><span>Secs</span></div></li>";

    if (timeRest <= 0) {
        clearInterval(counDown);
        p.innerHTML = "NGÀY MAI THI TỐT NHÉ CHÀNG TRAI";
    }
}
