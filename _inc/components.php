<?php
function html_nav(array $linky): string
{
    $aktualnaStranka = basename($_SERVER['SCRIPT_NAME']);
    $html = '';

    foreach ($linky as $link) {
        $aktivnyClass = basename($link['href']) === $aktualnaStranka ? 'active' : '';

        $html .= '<li class="nav-item">';
        $html .= '<a class="nav-link d-flex align-items-center gap-2 ' . $aktivnyClass . '" href="' . $link['href'] . '">';
        $html .= '<i class="fas ' . $link['ikona'] . ' mr-4"></i> <span>' . $link['text'] . '</span>';
        $html .= '</a>';
        $html .= '</li>';
    }

    return $html;
}
