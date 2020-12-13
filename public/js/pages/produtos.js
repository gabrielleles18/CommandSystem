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
        })
    }

    const construct = () => {
        addCard();
    };

    construct()
}
