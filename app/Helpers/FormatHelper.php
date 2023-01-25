<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class FormatHelper
{
    public static function usernameFormat($input)
    {
        return str_replace(' ', '', Str::lower($input));
    }

    public static function rupiahFormat($input)
    {
        return number_format($input, 0, '.', '.');
    }

    public static function rupiahPost($input)
    {
        return (int)str_replace('.', '', $input);
    }

    public static function tanggalIndo($input)
    {
        return self::hari($input). ', ' .Carbon::parse($input)->format('d') .' '.self::bulan($input). ' ' .Carbon::parse($input)->format('Y');
    }

    static function hari($input)
    {
        switch(Carbon::parse($input)->format('D')) {
            case 'Mon':
                return 'Senin';
                break;
            case 'Tue':
                return 'Selasa';
                break;
            case 'Wed':
                return 'Rabu';
                break;
            case 'Thu':
                return 'Kamis';
                break;
            case 'Fri':
                return 'Jumat';
                break;
            case 'Sat':
                return 'Sabtu';
                break;
            case 'Sun':
                return 'Minggu';
                break;
            default:
                return 'Hari Tidak Tersedia';
                break;
        }
    }

    static function bulan($input) {
        switch(Carbon::parse($input)->format('M')) {
            case 'Jan':
                return 'Januari';
                break;
            case 'Feb':
                return 'Februari';
                break;
            case 'Mar':
                return 'Maret';
                break;
            case 'Apr':
                return 'April';
                break;
            case 'May':
                return 'Mei';
                break;
            case 'Jun':
                return 'Juni';
                break;
            case 'Jul':
                return 'Juli';
                break;
            case 'Aug':
                return 'Agustus';
                break;
            case 'Sep':
                return 'September';
                break;
            case 'Oct':
                return 'Oktober';
                break;
            case 'Nov':
                return 'November';
                break;
            case 'Dec':
                return 'Desember';
                break;
            default:
                return 'Bulan Tidak Tersedia';
                break;
        }
    }
}
