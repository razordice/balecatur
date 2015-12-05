<?php

    function tgl_indo($tgl){
        
    $tanggal = substr($tgl,8,2);
    $bulan   = getBulan(substr($tgl,5,2));
    $tahun   = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
}
function getBulan($bln){
    switch ($bln){
        case 1:
            return "Jan";
        break;
        case 2:
            return "Feb";
        break;
        case 3:
            return "Mar";
        break;
        case 4:
            return "April";
        break;
        case 5:
            return "Mei";
        break;
        case 6:
            return "Juni";
        break;
        case 7:
            return "Juli";
        break;
        case 8:
            return "August";
        break;
        case 9:
            return "Sept";
        break;
        case 10:
            return "Okto";
        break;
        case 11:
            return "Nov";
        break;
        case 12:
            return "Des";
    break;
    }
}

?>