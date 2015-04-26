<?php

$access_token = "gJNlH-i4KjKDKMRZihRu3nwMhUjF7PJFG4_74a2HFAW1KqV5Uvy00Tjwe9cl1LbMShke6CL3r0zMHISc_FibjVAY1uiFfxdc6Zy4SlLeFqQ";

$jsonmenu = '{
    "button": [
        {
            "name": "查询入口",
            "sub_button": [
            {
              "type":"click",
              "name":"学 生 查询入口",
              "key":"student"
            },
            {
              "type":"click",
              "name":"管理员查询入口",
              "key":"admin" 
            }
            ]
        }, 
        {
            "name": "MIS 系统", 
            "sub_button": [
                {
                    "type": "view", 
                    "name": "Web Client", 
                    "url": "http://sdnuweb.sinaapp.com/"
                },
                {
                    "type": "view", 
                    "name": "Web Service", 
                    "url": "http://sdnuserver.sinaapp.com/"
                },
                {
                    "type": "view", 
                    "name": "关 于 系 统", 
                    "url": "http://qszhaozhe.com/index.php/mis.html"
                }, 
                {
                    "type": "view", 
                    "name": "关 于 作 者", 
                    "url": "http://qszhaozhe.com/index.php/start-page.html"
                }
            ]
        }
    ]
}';


$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

?>