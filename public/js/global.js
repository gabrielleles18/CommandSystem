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

    openFrom()
}
