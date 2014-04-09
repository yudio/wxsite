<?php
class AuthService
{
    private $appid;
    private $appsecret;
    private $code;

    public function __construct($apidata)
    {
        $this->appid = $apidata['appid'];
        $this->appsecret = $apidata['appsecret'];
    }
    //高级接口
    //用户授权
    public function auth2url($reurl,$scope,$state='default'){
        return 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appid.'&redirect_uri='.urlencode($reurl).'&response_type=code&scope='.$scope.'&state='.$state.'#wechat_redirect';
    }

    public function auth2($code){
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->appsecret.'&code='.$code.'&grant_type=authorization_code';
        return json_decode($this->curlGet($url),true);
    }

    public function auth_userinfo($access,$openid){
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access.'&openid='.$openid.'&lang=zh_CN';
        return json_decode($this->curlGet($url),true);
    }

    public function auth_refresh($retoken){
        $url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$this->appid.'&grant_type=refresh_token&refresh_token='.$retoken;
        return json_decode($this->curlGet($url),true);
    }

    function curlPost($url, $data){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        //LOG::write('curlPost Result:'.$tmpInfo,LOG::ERR);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }else{
            return $tmpInfo;
        }
    }
    function curlGet($url){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        //LOG::write('curlGet Result:'.$temp,LOG::ERR);
        return $temp;
    }
}