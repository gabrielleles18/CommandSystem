import $ from 'jquery';

export default function () {
    const openFrom = () => {
        $('.container h1 .icon').click(() => {
            $('.container .box.form').slideToggle();

            $([document.documentElement, document.body]).animate({
                scrollTop: $('.container .box.form').offset().top
            }, 1100);
        })
    }

    const addQt = () => {
        const item = $('.produtos fieldset li .center .quantidade');

        item.find('svg.bi-plus').click(function () {
            let input = $(this).parent().find('input');
            input.val(parseInt(input.val()) + 1);
        });
    }

    const removeQt = () => {
        const item = $('.produtos fieldset li .center .quantidade');

        item.find('svg.bi-dash').click(function () {
            let input = $(this).parent().find('input');
            if (input.val() > 0) {
                input.val(parseInt(input.val()) - 1);
            }
        });
    }

    addQt();
    removeQt();
    openFrom();
}
