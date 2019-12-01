
  $(document).ready(function(){
    var timeToSend = calcTime(city, offset,selDate,selHours,selMinutes);

    //we are sending information to saveTimeToDB.php
    $.ajax('HomeController.php', {
        data: {time:timeToSend}//this is an object containing all the information you want to send               
    }).done(function(){
        //a function which gets called if the ajax call succeeded
        alert('the time has been saved');
    }).fail(function(){
        //a function which gets called if the ajax call failed
        alert('Uh-oh, something went wrong. We did not save the time');
    });
});