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
        let dataArray = JSON.parse(data);
        let html = '';

        dataArray.forEach((value, index) => {
            // console.log(value);
            html += `<p>${value.qt} ${value.nome} $ ${value.preco} </p>`;
        });

        card.html(html);
    }

    const addCard = () => {
        const itensProp = $('.itens');
        itensProp.find('.carrinho').click((e) => {
            e.preventDefault();
            let dataCard = JSON.stringify([$(e.currentTarget).data()]);

            if (Cookies.get('dataCard')) {
                let datacookie = JSON.parse(Cookies.get('dataCard'));
                let dataclick = $(e.currentTarget).data();

                datacookie.forEach((value) => {
                    if (value.id == dataclick.id) {
                        let qt = value.qt + dataclick.qt;
                        value.qt = qt;

                        setCookies(JSON.stringify(datacookie));

                    } else {
                        const dataCardNew = datacookie.concat([$(e.currentTarget).data()]);
                        setCookies(JSON.stringify(dataCardNew));
                    }
                })
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
