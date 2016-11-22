$(function () {

    $("li").click(function () {
        $('.active').removeClass('active');
        $(this).addClass('active');

        if (this.id == "student") {
            $('#fstudent').css("display", "block");
        } else {
            $('#fstudent').css("display", "none");
        }

        if (this.id == "docent") {
            $('#fdocent').css("display", "block");
        } else {
            $('#fdocent').css("display", "none");
        }

        if (this.id == "coach") {
            $('#fcoach').css("display", "block");
        } else {
            $('#fcoach').css("display", "none");
        }

    });

    $("form").each(function(){
        $("input").addClass('field');
    });


});