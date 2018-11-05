$(document).ready(function() {

    //Slow scrolling
    $('a[href*="#"]').click(function (event) {
        var target = $(this.hash);
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
    });

    //Contact form verification
    function testNameInput(field)
    {
        var regex = /^[a-zA-Z]{2,}$/;
        if(regex.test(field.value))
        {return true;}
        else {return false;}
    }

    function testEmail(field)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/ ;
        if(regex.test(field.value))
        {return true;}
        else{return false;}
    }

    function testMessageInput(field)
    {
        var regex = /^.{2,}$/;
        if(regex.test(field.value))
        {return true;}
        else{return false;}
    }

    function correctInputForm()
    {
        if (testNameInput(document.getElementById('nom')) && testNameInput(document.getElementById('prenom')) && testEmail(document.getElementById('email')) && testMessageInput(document.getElementById('message')))
        {
            $('#submit').addClass('ready');
            $('#submit').removeAttr('disabled');
        }
        else
        {
            $('#submit').removeClass('ready');
            $('#submit').attr('disabled', 'disabled');
        }
    }

    $('#form1').on('input', function()
    {
        correctInputForm();
    });

    $('#nom').on('input', function() {

        if (testNameInput(document.getElementById('nom'))) {
            $('#nom').addClass('good');
            $('#nom').removeClass('bad');
        }
        else {
            $('#nom').removeClass('good');
            $('#nom').addClass('bad');
        }
    });

    $('#prenom').on('input', function() {
        if(testNameInput(document.getElementById('prenom')))
        {
            $('#prenom').addClass('good');
            $('#prenom').removeClass('bad');
        }
        else
        {
            $('#prenom').removeClass('good');
            $('#prenom').addClass('bad');
        }
    });

    $('#email').on('input', function() {
        if(testEmail(document.getElementById('email')))
        {
            $('#email').addClass('good');
            $('#email').removeClass('bad');
        }
        else
        {
            $('#email').removeClass('good');
            $('#email').addClass('bad');
        }
    });

    $('#message').on('input', function() {
        if(testMessageInput(document.getElementById('message')))
        {
            $('#message').addClass('good');
            $('#message').removeClass('bad');
        }
        else
        {
            $('#message').removeClass('good');
            $('#message').addClass('bad');
        }
    });
});
