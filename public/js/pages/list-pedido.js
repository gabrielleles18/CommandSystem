import $ from 'jquery';

export default function () {
    const showProds = () => {
        const icon = $('.box .history ul.pedido-item li i');
        icon.click(function () {
            $(this).parent().parent().find('ul.lastul').slideToggle();
        })
    }

    const showPed = () => {
        const icon = $('.box .history .mesa div i');
        icon.click(function () {
            let parrent = $(this).parent().parent().parent();
            parrent.find('ul.pedido-item').slideToggle();

            let total = parrent.find('.pedido-item .total_ever_hidden').data();
            parrent.find('.pedido-item .total_ever').html(total.total);
        })
    }

    showProds();
    showPed();
}
