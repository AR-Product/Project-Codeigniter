<?php

if (!function_exists('waktu_lalu')) {
    function waktu_lalu($datetime) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        
        if ($diff->d > 7) {
            return date('d M Y', strtotime($datetime));
        } elseif ($diff->d > 0) {
            return $diff->d . ' hari lalu';
        } elseif ($diff->h > 0) {
            return $diff->h . ' jam lalu';
        } elseif ($diff->i > 0) {
            return $diff->i . ' menit lalu';
        } else {
            return 'Baru saja';
        }
    }
}