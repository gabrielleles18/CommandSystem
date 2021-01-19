<?php


namespace Mini\Controller;


class Index {

    static function gerateBreadcrumb($array) {
        $html = '';
        $html .= "<div class='breadcrumb-component'><ul>";
        foreach ($array as $value) {
            $html .= "<li><a href='{$value['url']}'>{$value['text']}</a>
                       <svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-chevron-right' viewBox='0 0 16 16'>
                          <path fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/>
                       </svg></li>";
        }
        $html .= "</ul></div>";

        return $html;
    }

    static function finalizarPedido(){

    }

}
