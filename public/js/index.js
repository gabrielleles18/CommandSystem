import produtos from './pages/cart';
import pedido from './pages/list-pedido';
import mask from './pages/mask';
import modal from './pages/modal';
import global from './global';

((fn) => {
    if (document.attachEvent ? document.readyState === 'complete' : document.readyState !== 'loading') {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
})(() => {
    produtos();
    global();
    pedido();
    mask();
    modal();
});
