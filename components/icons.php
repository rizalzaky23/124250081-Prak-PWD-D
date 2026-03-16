<?php
if (!function_exists('icon')) {
    function icon(string $name, int $size = 16, string $color = 'currentColor'): string {
        $map = [
            'home'                => 'house',
            'menu'                => 'menu',
            'close'               => 'x',
            'arrow-right'         => 'arrow-right',
            'chevron-down'        => 'chevron-down',
            'truck'               => 'truck',
            'package'             => 'package',
            'package-open'        => 'package-open',
            'warehouse'           => 'warehouse',
            'route'               => 'route',
            'map-pin'             => 'map-pin',
            'navigation'          => 'navigation',
            'cpu'                 => 'cpu',
            'radar'               => 'radar',
            'activity'            => 'activity',
            'zap'                 => 'zap',
            'shield-check'        => 'shield-check',
            'lock'                => 'lock',
            'user'                => 'user',
            'user-check'          => 'user-check',
            'users'               => 'users',
            'phone'               => 'phone',
            'mail'                => 'mail',
            'check'               => 'check',
            'check-circle'        => 'circle-check',
            'check-circle-filled' => 'circle-check-big',
            'alert-triangle'      => 'triangle-alert',
            'info'                => 'info',
            'star'                => 'star',
            'star-filled'         => 'star',
            'quote'               => 'quote',
            'trending-up'         => 'trending-up',
            'dollar-sign'         => 'circle-dollar-sign',
            'clock'               => 'clock',
            'refresh'             => 'refresh-cw',
            'send'                => 'send',
            'hash'                => 'hash',
            'plus-circle'         => 'circle-plus',
            'instagram'           => 'instagram',
            'linkedin'            => 'linkedin',
            'leaf'                => 'leaf',
        ];

        $lucide = $map[$name] ?? $name;
        $c = htmlspecialchars($color);
        return "<i data-lucide=\"{$lucide}\" style=\"width:{$size}px;height:{$size}px;color:{$c};flex-shrink:0;display:inline-block;vertical-align:middle;\"></i>";
    }
}