import $ from 'jquery';

export default function () {
    $('.box .history ul.pedido-item li i').click(() => {
        $(this).find('ul.lastul').toggleClass('show');
    })
}
