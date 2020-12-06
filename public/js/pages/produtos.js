export default function () {
    $(document).ready(function () {
        const itensProp = $('.itens');

        itensProp.find('.carrinho').click((e) => {
            e.preventDefault();

            const dataProd = [
                itensProp.find('img').attr('data-src'),
                itensProp.find('h2').attr('data-nome'),
                itensProp.find('h5').attr('data-preco'),
                itensProp.find('.bottom p').attr('data-descricao'),
            ]

            console.log(JSON.stringify(dataProd));
        })
    });
}
