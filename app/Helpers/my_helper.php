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

        if (is_array($message)) {
            $message = "<div class=\"list-error\"><ul><li>" . implode("</li><li>", $message) . "</li></ul></div>";
        }
        $html = '<div class="alert ' . $alertClass . ' alert-dismissible text-white fade show mb-0" role="alert">';
        $html .= '<span class="alert-icon align-middle">';
        $html .= '<span class="material-icons text-md">';
        $html .= $alertIcon;
        $html .= '</span>';
        $html .= '</span>';
        $html .= '<span class="alert-text">' . $message . '</span>';
        $html .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">';
        $html .= '<span aria-hidden="true">&times;</span>';
        $html .= '</button>';
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

if (!function_exists('sizeMB')) {
    function sizeMB(int $number)
    {
        return ['size' => $number * 1048576, 'description' => "$number MB"];
    }
}

// belum sempat buatnya.
if (!function_exists('sizeImage')) {
    function sizeImage()
    {
        return sizeMB(2);
    }
}

if (!function_exists('showMenu')) {
    function showMenu()
    {
        $menus = [
            [
                'title' => 'Dashboard',
                'icon' => 'dashboard',
                'link' => base_url('landingpage')
            ],
            [
                'title' => 'Banners',
                'icon' => 'collections',
                'link' => base_url('landingpage/banners')
            ],
            [
                'title' => 'Jenis Program',
                'icon' => 'content_copy',
                'link' => base_url('landingpage/jenis-program')
            ],
            [
                'title' => 'Fasilitas',
                'icon' => 'inventory_2',
                'link' => base_url('landingpage/fasilitas')
            ],
            [
                'title' => 'Biaya',
                'icon' => 'monetization_on',
                'link' => base_url('landingpage/biaya')
            ],
            [
                'title' => 'Kontak Kami',
                'icon' => 'contacts',
                'link' => base_url('landingpage/kontak-kami')
            ],
            [
                'title' => 'Pengaturan',
                'icon' => 'settings',
                'link' => base_url('landingpage/settings')
            ],
        ];

        $html = '';
        foreach ($menus as $k => $menu) {
            $currentUri = service('uri');
            $menuUri = new \CodeIgniter\HTTP\URI($menu['link']);

            $active = ($currentUri->getSegment(2) == $menuUri->getSegment(2)) ? 'active bg-gradient-secondary' : '';
            $html .= '<li class="nav-item">';
            $html .= '<a class="nav-link text-white ' . $active . '" href="' . $menu['link'] . '">';
            $html .= '<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">';
            $html .= '<i class="material-icons opacity-10">' . $menu['icon'] . '</i>';
            $html .= '</div>';
            $html .= '<span class="nav-link-text ms-1">' . $menu['title'] . '</span>';
            $html .= '</a>';
            $html .= '</li>';
        }
        return $html;
    }
}
