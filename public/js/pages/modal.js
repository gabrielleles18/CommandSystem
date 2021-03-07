import $ from 'jquery';
import Cookies from 'js-cookie';

export default function () {
    $(document).ready(() => {
        $('.modal-header .close').click(() => {
            $('#exampleModal').css('display', 'none');
            Cookies.set('alert', "", -1);
        })
    })
}