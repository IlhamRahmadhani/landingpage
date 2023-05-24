<?php

if (!function_exists('indoDate')) {
    function indoDate($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = '')
    {
        if (trim($timestamp) == '') {
            $timestamp = time();
        } elseif (!ctype_digit($timestamp)) {
            $timestamp = strtotime($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace("/S/", "", $date_format);
        $pattern = array(
            '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
            '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
            '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
            '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
            '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
            '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
            '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
            '/November/', '/December/',
        );
        $replace = array(
            'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
            'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'Sepember',
            'Oktober', 'November', 'Desember',
        );
        $date = date($date_format, $timestamp);
        $date = preg_replace($pattern, $replace, $date);
        if ($suffix) {
            $date = "{$date} {$suffix}";
        }
        return $date;
    }
}

if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil = "Rp. " . number_format($angka, 0, '.', '.');
        return $hasil;
    }
}

if (!function_exists('alert')) {
    function alert($tipe, $message)
    {

        $alertClass = '';
        $alertIcon = '';
        switch ($tipe) {
            case 'info':
                $alertClass = "alert-info";
                $alertIcon = "info_outline";
                break;
            case 'success':
                $alertClass = "alert-success";
                $alertIcon = "check";
                break;
            case 'warning':
                $alertClass = "alert-warning";
                $alertIcon = "warning";
                break;
            case 'error':
                $alertClass = "alert-danger";
                $alertIcon = "error_outline";
                break;
            default:
                break;
        }

        $html = "";
        $html .= '<div class="alert ' . $alertClass . '">';
        $html .= '<div class="alert-icon">';
        $html .= '<i class="material-icons">' . $alertIcon . '</i>';
        $html .= '</div>';
        $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $html .= '<span aria-hidden="true"><i class="material-icons">clear</i></span>';
        $html .= '</button>';
        $html .= $message;
        $html .= '</div>';

        return $html;
    }
}

if (!function_exists('dateFormatConverter')) {
    function dateFormatConverter($inputDate, $inputFormat = 'Y-m-d', $outputFormat = 'd-m-Y')
    {
        $myDateTime = DateTime::createFromFormat($inputFormat, $inputDate);
        $newDateString = $myDateTime->format($outputFormat);
        return $newDateString;
    }
}