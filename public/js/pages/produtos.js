import $ from 'jquery';
import Cookies from 'js-cookie';

export default function () {

    const setCookies = (data) => {
        try {
            Cookies.set('dataCard', data);
        } catch (err) {
            console.log(err);
        }
    }

    const renderCard = (data) => {
        const card = $('.sidebar-prod');
        let html = '';
        let dataArray = JSON.parse(data);
        console.log(dataArray.nome);


        card.html(html);
    }

    const addCard = () => {
        const itensProp = $('.itens');
        itensProp.find('.carrinho').click((e) => {
            e.preventDefault();
            let dataCard = JSON.stringify($(e.currentTarget).data());

            if (Cookies.get('dataCard')) {
                const dataCardNew = Cookies.get('dataCard').concat(JSON.stringify($(e.currentTarget).data()));
                setCookies(dataCardNew);
            } else {
                setCookies(dataCard);
            }
            renderCard(Cookies.get('dataCard'));
        })
    }

    const construct = () => {
        addCard();
        if (Cookies.get('dataCard')) {
            renderCard(Cookies.get('dataCard'));
        }
    };

    construct()
}
