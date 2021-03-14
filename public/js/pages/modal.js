import $ from 'jquery';
import Cookies from 'js-cookie';

export default function () {
    $(document).ready(() => {
        $('.modal-header .close').click(() => {
            $('#exampleModal').css('display', 'none');
            $('body').css('overflow', 'auto');
            Cookies.set('alert', "", -1);
        })
    })
}