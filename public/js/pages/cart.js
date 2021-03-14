import $ from 'jquery';
import Cookies from 'js-cookie';

export default function () {

    const setCookies = (data) => {
        try {
            Cookies.set('dataCard', data);
        } catch (err) {
            console.log("Error in set Cookies ".err);
        }
    }

    const renderCard = (data) => {
        const card = $('.sidebar-carrinho');
        let dataArray = JSON.parse(data);
        let html = '';
        let total = 0;
        let input = '';

        if(GET_PED !== undefined){
            input = `<input type="hidden"  name="pedido_id" value="${GET_PED}"/>`
        }

        html += `<form action="https://localhost/CommandSystem/pedido/add" method="POST">
                  <input type="hidden"  name="mesa_id" value="${GET}"/>
                  ${input}
                <li class="itens-cart">Itens do pedido</li>`;
        dataArray.forEach((value, index) => {
            total = total + (value.qt * value.preco);
            html += `
                    <li>
                        <img src="${value.image}" alt="">
                        <div class="center">
                            <hgroup>
                                <h5 class="title">${value.nome}</h5>
                                <h6 class="des">${value.descricao}</h6>
                            </hgroup>
                            <div class="quantidade">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                     fill="currentColor"
                                     class="bi bi-dash"
                                     viewBox="0 0 16 16">
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                                <h4 class="qt" data-id="${value.id}" data-qt="${value.qt}">${value.qt}</h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                     fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" data-id="${value.id}"
                                 class="bi bi-x"
                                 viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            <div class="preco">R$ ${(value.qt * value.preco).toFixed(2)}</div>
                        </div>
                    </li>
             `;
        });

        Cookies.set('total-cart', total);

        let total_garco = (total * 0.05) + total;

        html += `<textarea rows="2" name="observacoes" placeholder="Observações"></textarea>
                 <h5 class="total">Total: R$ ${total_garco.toFixed(2)}</h5>
                <button class="finalizar" type="submit" name="cadastar_pedido">Finalizar Pedido</button>
                </form>
                `;

        card.html(html);
        addItem();
        removeItem();
    }

    const addCard = () => {
        const itensProp = $('.itens');
        itensProp.find('.carrinho').click((e) => {
            e.preventDefault();
            let dataCard = JSON.stringify([$(e.currentTarget).data()]);

            if (Cookies.get('dataCard')) {
                let control = true;
                let datacookie = JSON.parse(Cookies.get('dataCard'));
                let dataclick = $(e.currentTarget).data();

                datacookie.forEach((value) => {
                    if (value.id == dataclick.id) {
                        control = false;
                        let qt = value.qt + dataclick.qt;
                        value.qt = qt;
                        Cookies.set('dataCard', datacookie);
                    }
                })

                if (control) {
                    const dataCardNew = datacookie.concat([$(e.currentTarget).data()]);
                    setCookies(JSON.stringify(dataCardNew));
                }

            } else {
                setCookies(dataCard);
            }
            renderCard(Cookies.get('dataCard'));
            removeItemCart();
        })
    }

    const addItem = () => {
        const li = $('.sidebar-carrinho li');
        li.find('.quantidade svg.bi-plus').click(function () {
            let data = $(this).parent().find('.qt').data()
            $(this).parent().find('.qt').html(++data.qt);
            const datacookie = JSON.parse(Cookies.get('dataCard'));

            datacookie.forEach((value) => {
                if (value.id == data.id) {
                    value.qt = parseInt($(this).parent().find('.qt').text());
                }
            })
            Cookies.set('dataCard', JSON.stringify(datacookie))
            renderCard(Cookies.get('dataCard'));
        });
    }

    const removeItem = () => {
        const li = $('.sidebar-carrinho li');
        li.find('.quantidade svg.bi-dash').click(function () {
            let data = $(this).parent().find('.qt').data();
            if (data.qt > 0) {
                $(this).parent().find('.qt').html(--data.qt);
                const datacookie = JSON.parse(Cookies.get('dataCard'));

                datacookie.forEach((value) => {
                    if (value.id == data.id) {
                        value.qt = parseInt($(this).parent().find('.qt').text());
                    }
                })
                Cookies.set('dataCard', JSON.stringify(datacookie))
                renderCard(Cookies.get('dataCard'));
            }
        });
    }

    const openCart = () => {
        const cart = $('main .right .header .top .cart-user .cart');
        cart.click(() => {
            cart.parent().find('.sidebar-carrinho').toggle('show');

            if (!cart.hasClass('background')) {
                cart.addClass('background');
            } else {
                cart.removeClass('background');
            }
        });
    }

    const openUser = () => {
        const cart = $('main .right .header .top .cart-user .user');
        cart.click(() => {
            cart.parent().find('.info').toggle('show');

            if (!cart.hasClass('background')) {
                cart.addClass('background');
            } else {
                cart.removeClass('background');
            }
        });
    }

    const finalizarPedido = () => {
        $('.sidebar-carrinho .finalizar').click(() => {
            window.location = `https://localhost/CommandSystem/produtos/listar?id=12`;
        })
    }

    const removeItemCart = () => {
        $('.sidebar-carrinho li .right svg.bi-x').click(function (e) {
            console.log(e);
            let dataClose = $(e.currentTarget).data();
            let datacookie = JSON.parse(Cookies.get('dataCard'));
            let posicao = null;

            datacookie.forEach((value, index) => {
                if (value.id == dataClose.id) {
                    posicao = index;
                }
            });
            datacookie.splice(posicao, 1);
            Cookies.set('dataCard', JSON.stringify(datacookie))
            renderCard(Cookies.get('dataCard'));
        });
    }

    const construct = () => {
        addCard();
        openCart();
        openUser();
        if (Cookies.get('dataCard')) {
            renderCard(Cookies.get('dataCard'));
            finalizarPedido();
            removeItemCart();
        }
    };

    construct();
}
