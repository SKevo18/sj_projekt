<?php

class Odkaz
{
    public static function vykreslit(array $odkazy): string
    {
        $aktualnaStranka = basename($_SERVER['SCRIPT_NAME']);
        $html = '';

        foreach ($odkazy as $odkaz) {
            $aktivnyClass = basename($odkaz['href']) === $aktualnaStranka ? 'active' : '';

            $html .= '<li class="nav-item">';
            $html .= '<a class="nav-link d-flex align-items-center gap-2 ' . $aktivnyClass . '" href="' . $odkaz['href'] . '">';
            $html .= '<i class="fas ' . $odkaz['ikona'] . ' mr-4"></i> <span>' . $odkaz['text'] . '</span>';
            $html .= '</a>';
            $html .= '</li>';
        }

        return $html;
    }
}
