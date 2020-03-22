jQuery(document).ready(function () {
    let arrow = $('.cat-icon .icon-arrow-down');

    arrow.click(function () {
        document.querySelector('.list-produtos li ul').style.display = 'block';
        console.log("ddd");
    })
});