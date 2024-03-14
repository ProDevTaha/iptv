<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

  return[
    'client_id' => 'Ab-pA8spjG6h-sJF21NT8Z_MnLKdQ1WpPPGKekfeqf2FqHvXIAOUtTmao3faiY8TaoYKKwO9bU_zm02u',
    'secret'=>'EBPPglD04xdhFUEkTp3YdCqyx_15AWkyXZPWJF2KomxBx48E3vh1GPDGWTPnvK1kLper9zkZFIFIKgAR',
    'settings'=>array(
        'mode'=>'live',
        'http.ConnectionTimeOut'=>1000,
        'log.LogEnabled'=>true,
        'log.FileName'=>storage_path() .'/logs/paypal.log',
        'log.LogLevel'=>'FINE'
    ), 

      /***************************** test mode *********************************/
    // 'client_id' => 'ASe29TmRH2vphMsPHiHam-FetsMJj2ISgV6rqzSNJxqQrReT6uP3JMFAL1ZpnI31Ei8bGJH7CMz7qFp9',
    // 'secret'=>'ASe29TmRH2vphMsPHiHam-FetsMJj2ISgV6rqzSNJxqQrReT6uP3JMFAL1ZpnI31Ei8bGJH7CMz7qFp9',
    // 'settings'=>array(
    //     'mode'=>'sandbox', 
    //     'http.ConnectionTimeOut'=>1000,
    //     'log.LogEnabled'=>true,
    //     'log.FileName'=>storage_path() .'/logs/paypal.log',
    //     'log.LogLevel'=>'FINE'
    // ),
];


