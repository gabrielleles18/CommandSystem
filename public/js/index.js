import produtos from './pages/cart';
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
});
