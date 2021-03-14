import $ from 'jquery';
import mask from 'jquery-mask-plugin';

export default function () {
    $(document).ready(function () {
        $('#telefone').mask('(00) 0 0000-0000');
        $('#cpf').mask('000.000.000-00');
        $('#preco').mask('#.##0,00', {reverse: true});
    });
}