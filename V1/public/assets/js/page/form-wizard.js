'use strict';
$(function () {
    //Horizontal form basic
    $('#wizardHorizontalMenu').steps({
        headerTag: 'h2',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        labels: {
            finish: "Guardar",
            next: "Siguiente",
            previous: "Anterior"
        },
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            if (currentIndex == 3) {
                var $input = $('<input type="submit" id="btn-submit" class="btn btn-success btn-lg" value="Guardar"/>');
                $input.appendTo($('ul[aria-label=Pagination]'));
                $(event.currentTarget).find('[role="menu"] li:not(.disabled) [href="#finish"]').parent().hide();
            } else {
                $('#btn-submit').remove();
            }
        }
    });
});

function setButtonWavesEffect(event) {
    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
}

$('a [href="#finish"]').click(function() {
    alert('aqui');
    $('#wizard').submit();
})