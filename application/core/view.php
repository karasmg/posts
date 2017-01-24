<?php
namespace Posts\Core;

class View
{

    /*
     * $content_file - виды отображающие контент страниц;
     * $template_file - общий для всех страниц шаблон;
     * $data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
     *
     * */
    function generate($content_view, $template_view = null, $data = null)
    {
        if (!$template_view)
            include 'application/views/' . $content_view;
        else
            include 'application/views/' . $template_view;
    }
}
