//preloader    
var preloader = document.getElementById("preloader_preload");
function fadeOutnojquery(el) {
    el.style.opacity = 1;
    var interpreloader = setInterval(function () {
        el.style.opacity = el.style.opacity - 0.05;
        if (el.style.opacity <= 0.05) {
            clearInterval(interpreloader);
            preloader.style.display = "none";
        }
    }, 16);
}

window.onload = function () {
    setTimeout(function () {
        fadeOutnojquery(preloader);
    }, 300); //время показа после загрузки 
};

$(document).ready(function () {
//button up

    $(window).scroll(function () {

        if ($(this).width() >= 768) { //если ширина окна >= 768 пикселов
            if ($(this).scrollTop() >= 200) {//показываем
                $('#button-up').css({'display': 'initial'});
            } else if ($(this).scrollTop() <= 200) {  //убираем
                $('#button-up').css({'display': 'none'});
            }
        }
    });
    $('#button-up').click(function (e) {
        $('html, body').animate({scrollTop: 0}, 800);
        $(this).css({
            'display': 'none'
        });
        e.preventDefault();
    });
    
    
//скролл при клике на якорь //TODO переделать на data

    $(".anchor__link").on("click", function (e) {
        //отменяем стандартную обработку нажатия по ссылке
        e.preventDefault();
        //для ссылокзабираем идентификатор блока с атрибута href
        var destination = $(this).attr('href'),
                //узнаем высоту от начала страницы до блока на который ссылается якорь
                top = $(destination).offset().top;
        //анимируем переход на расстояние - top за 1000 мс
        $('body,html').animate({scrollTop: top}, 1000);
    });

// Fancy-box. Images and gallery
    $("[data-fancybox]").fancybox({
        protect: true,
        toolbar: true
    });
    
    
//inputmask
    $('.tel_mask').inputmask({
        mask: '9-(999)-999-99-99',
        jitMasking: true
    });
//    $('.name_mask').inputmask({
//        mask: 'a{55}',
//        jitMasking: true
//    });
//    $('.email_mask').inputmask({
//        mask: "*{1,20}[.*{1,20}][.-{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
//        greedy: false,
//        onBeforePaste: function (pastedValue, opts) {
//            pastedValue = pastedValue.toLowerCase();
//            return pastedValue.replace("mailto:", "");
//        }
//    });
        
    //формы 
    
    //штзге range
    var range_qnt = $('#reg_input_gamers_qnt');
    var range_qnt_text = $('#reg_input_gamers_qnt_text');
    range_qnt_text.text('Количество игроков : ' + range_qnt.val());
    range_qnt.on('input', function(){
        range_qnt_text.text('Количество игроков : ' + range_qnt.val());
    });
    
   
    //вспомогательные функции для валидация полей.    
    function validateName(selector) {
        if (selector.val().length < 3) {
            selector.addClass('is-invalid');
            selector.focus();
            
        } else
            selector.removeClass('is-invalid');
            selector.addClass('is-valid');
    }
    
    function validateTel(selector) {
        if (selector.val().length !== 17) {
            selector.addClass('is-invalid');
        } else
            selector.removeClass('is-invalid');
            selector.addClass('is-valid');
    }
    
    function validateCheckBox(selector) {
        if(!selector.prop("checked")) {
            selector.addClass('is-invalid');
        } else
            selector.removeClass('is-invalid');
            selector.addClass('is-valid');

    }
    function validateEmail(selector) {
        var pattern = /.+@.+\..+/i;
        if(!pattern.test(selector.val())) {
            selector.addClass('is-invalid');
        } else
            selector.removeClass('is-invalid');
            selector.addClass('is-valid');
    }
                
    //обработка фомы            
    //Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
 
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                if (form.checkValidity() === false) {
                   
                    //форма регистрации
                        $('.check[name=reg_input_team]').keyup(function () {
                            validateName($('.check[name=reg_input_team]'));
                        });
                        $('.check[name=reg_input_name]').keyup(function () {
                            validateName($('.check[name=reg_input_name]'));
                        });
                        $('.check[name=reg_input_tel]').keyup(function () {
                            validateTel($('.check[name=reg_input_tel]'));
                        });
                        $('.check[name=reg_input_email]').keyup(function () {
                            validateEmail($('.check[name=reg_input_email]'));
                        });
                        $('#reg_input_check').change(function () {
                            validateCheckBox($('#reg_input_check'));
                        });
                    
                    //форма звонка
                        $('.check[name=call_input_name]').keyup(function () {
                            validateName($('.check[name=call_input_name]'));
                        });
                        $('.check[name=call_input_tel]').keyup(function () {
                            validateTel($('.check[name=call_input_tel]'));
                        });
                        $('.check[name=call_input_check], #call_input_check').change(function () {
                            validateCheckBox($('.check[name=call_input_check], #call_input_check'));
                        });
                    }   

                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false || $(this).find('.check').hasClass('is-invalid')) {
                        event.preventDefault();
                        event.stopPropagation();

                        //форма регистрации
                            validateName($('.check[name=reg_input_team]'));
                            $('.check[name=reg_input_team]').keyup(function () {
                                validateName($('.check[name=reg_input_team]'));
                            });
                            validateName($('.check[name=reg_input_name]'));
                            $('.check[name=reg_input_name]').keyup(function () {
                                validateName($('.check[name=reg_input_name]'));
                            });
                            validateTel($('.check[name=reg_input_tel]'));
                            $('.check[name=reg_input_tel]').keyup(function () {
                                validateTel($('.check[name=reg_input_tel]'));
                            });
                            validateEmail($('.check[name=reg_input_email]'));
                            $('.check[name=reg_input_email]').keyup(function () {
                                validateEmail($('.check[name=reg_input_email]'));
                            });
                            validateCheckBox($('#reg_input_check'));
                            $('#reg_input_check').change(function () {
                                validateCheckBox($('#reg_input_check'));
                            });
                        //форма звонка
                            validateName($('.check[name=call_input_name]'));
                            $('.check[name=call_input_name]').keyup(function () {
                                validateName($('.check[name=call_input_name]'));
                            });
                            validateTel($('.check[name=call_input_tel]'));
                            $('.check[name=call_input_tel]').keyup(function () {
                                validateTel($('.check[name=call_input_tel]'));
                            });
                            validateCheckBox($('.check[name=call_input_check], #call_input_check'));
                            $('.check[name=call_input_check], #call_input_check').change(function () {
                                validateCheckBox($('.check[name=call_input_check], #call_input_check'));
                            });

                    } else {
                        event.preventDefault();
                        var result_ = $('.result_');
                        sendAjaxForm(result_, $(form));
                    }
                    //form.classList.add('was-validated');

                }, false);
            });
        }, false);
    })();

    //функция отправки формы аяксом
    function sendAjaxForm(result_, form) {
        $.ajax({
            url: 'libs/mail.php', //url страницы 
            cache: false, // выключили кэш
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            data: form.serialize(), // Сеарилизуем объект
            success: function (response) { //Данные отправлены успешно
                var result = $.parseJSON(response);
                form.css({'display': 'none'});
                result_.removeClass('d-none');
                result_.text(result);
            },
            error: function (response) { // Данные не отправлены
                form.css({'display': 'none'});
                result_.removeClass('d-none');
                result_.text('Ошибка. Данные не отправленны.');
            }
        });
        
        $('#modal_call , #modal_reg').on('hidden.bs.modal', function () {
            $('form').css({'display': 'initial'});
            $('.result_').addClass('d-none');
            $('input').removeClass('is-valid is-invalid');
            $('form').trigger('reset');
            $('#reg_input_gamers_qnt_text').text('Количество игроков : 2');
        });

    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    if ($(window).width() >= 768) {
        $('.pulse').mouseover(function () {
            $(this).tooltip('show');
        });
    }
    //формирование данных формы

    let gameId;
    $('.timetable-item__btn').click(function () {
        gameId = $(this).data('game_id');
    });


    $('#modal_reg').on('show.bs.modal', function () {
        $.ajax({
            url: 'libs/getDataFormRegAjax.php', //url страницы 
            cache: false, // выключили кэш
            type: "POST", //метод отправки
            //dataType: "html", //формат данных
            data: {
                gameId: gameId
            },
            success: function (response) { //Данные отправлены успешно
                var result = $.parseJSON(response);
                $('#form-game-title').text(result.game_title);
                $('input[name=form_reg_gameid]').val(gameId);

            },
            error: function (response) { // Данные не отправлены

            },
            complete: function () {

            }
        });

    });
   
     $('#modal_call , #modal_reg').on('hidden.bs.modal', function () {
            $('input').removeClass('is-valid is-invalid');
            $('form').trigger('reset');
            $('#reg_input_gamers_qnt_text').text('Количество игроков : 2');
        });
                
   
//    опции карусельки
//    $('.carousel').carousel({
//        interval: 20000000
//    });
    
    
    
//end file
});


