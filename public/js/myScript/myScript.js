$(document).ready(function(){
    hideDiv();
    $('.shiftCheckbox').shiftcheckbox();
    $('#checkbox').on('click', function(){
        if($('#checkbox>span').text() == 'check'){
            $("input[type=checkbox]").prop('checked', true);
            $('#checkbox>span').text('uncheck');
        }
        else {
            $("input[type=checkbox]").prop('checked', false);
            $('#checkbox>span').text('check');
        }


        //  $("input[type=checkbox]").prop('checked', false);
    });

    $('html').keydown(function(eventObject){ //����������� ������� ������
        if (event.keyCode == 46) { //���� ������ Enter, �� true
            $('#mail-form').submit();
        }
    });

    function hideDiv(){
        setTimeout(function(){$('.notification').fadeOut()}, 3000);
    }

});