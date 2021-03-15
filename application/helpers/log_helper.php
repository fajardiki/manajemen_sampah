<?php
function helper_log($tipe = ""){
    $CI =& get_instance();
     $CI->load->model('m_log');
    if (strtolower($tipe) == "login"){
        $param['Admin_idAdmin']      = $CI->session->userdata('idAdmin');
        $CI->m_log->save_log($param);
    }
    elseif(strtolower($tipe) == "logout")
    {
        $param2['Admin_idAdmin']      = $CI->session->userdata('idAdmin');
        $CI->m_log->save_logout($param2);
    }
    elseif(strtolower($tipe) == "barang")
    {
        $param2['Admin_idAdmin']      = $CI->session->userdata('idAdmin');
        $CI->m_log->save_barang($param2);
    }
   
}
?>