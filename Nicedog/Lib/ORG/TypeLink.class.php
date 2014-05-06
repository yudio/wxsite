<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-6
 * Time: 下午4:01
 */

class TypeLink{

    private $data;

     static public function  getTypeLink($arr,$module){
         if ($module=='Plugmenu'){
             switch ($arr['type']){
                 case 'link':
                     //   /wesite/test/lists?show=1&classid=325
                     $arr['url'] = $arr['link'];
                     break;
                 case 'tel':
                     //   /wesite/test/lists?show=1&classid=325
                     $arr['url'] = 'tel:'.$arr['tel'];
                     break;
                 case 'map':
                     $arr['url'] = "http://api.map.baidu.com/marker?location={$arr['lat']},{$arr['lng']}&title={$arr['name']}&name=".$_SESSION['uname']."&content={$arr['place']}&output=html&src=nicepa";
                     break;
                 case 'activity':
                     if ($arr['activity_type']=='lottery'){ //大转盘
                        $arr['url'] = "/npWap/Lottery/index.act?actid={$arr['activity_value']}&token={$arr['token']}&wecha_id=FromUserName";
                     }
                     if ($arr['activity_type']=='coupon'){ //优惠券
                         $arr['url'] = '/WebActivity/'.$_SESSION['wxid'].'/coupon?actid='.$arr['activity_value'].'&wecha_id=FromUserName';
                     }
                     break;
                 case 'business':
                     switch ($arr['business_type']){
                         case 'official':
                             $arr['url'] = '/wesite/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'vcard':
                             $card = M('Vcard')->where(array('token'=>session('token')))->find();
                             $arr['url'] = '/vcard/'.$card['id'];
                             break;
                         case 'reservation':
                             $arr['url'] = '/reserve/'.$_SESSION['wxid'].'/index?rid='.$arr['business_value'].'&wecha_id=FromUserName';
                             break;
                         case 'albums':
                             $arr['url'] = '/album/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'message':
                             $arr['url'] = '/Webmessage/'.$_SESSION['wxid'].'/comment?wecha_id=FromUserName';
                             break;
                         case 'vipcard':
                             $arr['url'] = '/Webmember/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                     }
                     break;
                 default:
                     $arr['url'] = C('site_url')."/wesite/{$_SESSION['wxid']}/index?wecha_id=FromUserName";
             }
         }
         if ($module=='Img'){
             LOG::write('TL:'.$arr['type'],LOG::ERR);
             switch ($arr['type']){
                 case 'link':
                     $arr['url'] = $arr['link'];
                     break;
                 case 'tel':
                     $arr['url'] = 'tel:'.$arr['tel'];
                     break;
                 case 'map':
                     $arr['url'] = "http://api.map.baidu.com/marker?location={$arr['lat']},{$arr['lng']}&title={$arr['name']}&name=".$_SESSION['uname']."&content={$arr['place']}&output=html&src=nicepa";
                     break;
                 case 'activity':
                     if ($arr['activity_type']=='lottery'){ //大转盘
                         $arr['url'] = "/npWap/Lottery/index.act?actid={$arr['activity_value']}&token={$arr['token']}&wecha_id=FromUserName";
                     }
                     if ($arr['activity_type']=='coupon'){ //优惠券
                         $arr['url'] = '/WebActivity/'.$_SESSION['wxid'].'/coupon?actid='.$arr['activity_value'].'&wecha_id=FromUserName';
                     }
                     break;
                 case 'business':
                     switch ($arr['business_type']){
                         case 'official':
                             $arr['url'] = '/wesite/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'vcard':
                             $card = M('Vcard')->where(array('token'=>session('token')))->find();
                             $arr['url'] = '/vcard/'.$card['id'];
                             break;
                         case 'reservation':
                             $arr['url'] = '/reserve/'.$_SESSION['wxid'].'/index?rid='.$arr['business_value'].'&wecha_id=FromUserName';
                             break;
                         case 'albums':
                             $arr['url'] = '/album/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'message':
                             $arr['url'] = '/Webmessage/'.$_SESSION['wxid'].'/comment?wecha_id=FromUserName';
                             break;
                         case 'vipcard':
                             $arr['url'] = '/Webmember/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                     }
                     break;
                 default:
                     $arr['url'] = C('site_url')."/wesite/{$_SESSION['wxid']}/detail?id={$arr['id']}";
             }
         }
         if ($module=='Classify'){
             LOG::write('TL:'.$arr['type'],LOG::ERR);
             switch ($arr['type']){
                 case 'article':
                     //   /wesite/test/lists?show=1&classid=325
                     $arr['url'] = "/wesite/{$_SESSION['wxid']}/lists?classid={$arr['id']}";
                     break;
                 case 'link':
                     $arr['url'] = $arr['link'];
                     break;
                 case 'tel':
                     $arr['url'] = 'tel:'.$arr['tel'];
                     break;
                 case 'map':
                     $arr['url'] = "http://api.map.baidu.com/marker?location={$arr['lat']},{$arr['lng']}&title={$arr['name']}&name=".$_SESSION['uname']."&content={$arr['place']}&output=html&src=nicepa";
                     break;
                 case 'activity':
                     if ($arr['activity_type']=='lottery'){ //大转盘
                         $arr['url'] = "/npWap/Lottery/index.act?actid={$arr['activity_value']}&token={$arr['token']}&wecha_id=FromUserName";
                     }
                     if ($arr['activity_type']=='coupon'){ //优惠券
                         $arr['url'] = '/WebActivity/'.$_SESSION['wxid'].'/coupon?actid='.$arr['activity_value'].'&wecha_id=FromUserName';
                     }
                     break;
                 case 'business':
                     switch ($arr['business_type']){
                         case 'official':
                             $arr['url'] = '/wesite/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'vcard':
                             $card = M('Vcard')->where(array('token'=>session('token')))->find();
                             $arr['url'] = '/vcard/'.$card['id'];
                             break;
                         case 'reservation':
                             $arr['url'] = '/reserve/'.$_SESSION['wxid'].'/index?rid='.$arr['business_value'].'&wecha_id=FromUserName';
                             break;
                         case 'albums':
                             $arr['url'] = '/album/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'message':
                             $arr['url'] = '/Webmessage/'.$_SESSION['wxid'].'/comment?wecha_id=FromUserName';
                             break;
                         case 'vipcard':
                             $arr['url'] = '/Webmember/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                     }
                     break;
                 default:
                     $arr['url'] = C('site_url')."/wesite/{$_SESSION['wxid']}/lists?classid={$arr['id']}";
             }
         }

         if ($module=='Slide'){
             LOG::write('TL:'.$arr['type'],LOG::ERR);
             switch ($arr['type']){
                 case 'article':
                     //   /wesite/test/lists?show=1&classid=325
                     $arr['url'] = "/wesite/{$_SESSION['wxid']}/lists?classid={$arr['id']}";
                     break;
                 case 'link':
                     $arr['url'] = $arr['link'];
                     break;
                 case 'tel':
                     $arr['url'] = 'tel:'.$arr['tel'];
                     break;
                 case 'map':
                     $arr['url'] = "http://api.map.baidu.com/marker?location={$arr['lat']},{$arr['lng']}&title={$arr['name']}&name=".$_SESSION['uname']."&content={$arr['place']}&output=html&src=nicepa";
                     break;
                 case 'activity':
                     if ($arr['activity_type']=='lottery'){ //大转盘
                         $arr['url'] = "/npWap/Lottery/index.act?actid={$arr['activity_value']}&token={$arr['token']}&wecha_id=FromUserName";
                     }
                     if ($arr['activity_type']=='coupon'){ //优惠券
                         $arr['url'] = '/WebActivity/'.$_SESSION['wxid'].'/coupon?actid='.$arr['activity_value'].'&wecha_id=FromUserName';
                     }
                     break;
                 case 'business':
                     switch ($arr['business_type']){
                         case 'official':
                             $arr['url'] = '/wesite/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'vcard':
                             $card = M('Vcard')->where(array('token'=>session('token')))->find();
                             $arr['url'] = '/vcard/'.$card['id'];
                             break;
                         case 'reservation':
                             $arr['url'] = '/reserve/'.$_SESSION['wxid'].'/index?rid='.$arr['business_value'].'&wecha_id=FromUserName';
                             break;
                         case 'albums':
                             $arr['url'] = '/album/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'message':
                             $arr['url'] = '/Webmessage/'.$_SESSION['wxid'].'/comment?wecha_id=FromUserName';
                             break;
                         case 'vipcard':
                             $arr['url'] = '/Webmember/'.$_SESSION['wxid'].'/index?wecha_id=FromUserName';
                             break;
                     }
                     break;
                 default:
                     $arr['url'] = "#no_url";
             }
         }

        if ($arr['type']=='link'||$arr['type']=='tel'||$arr['type']=='map'||$arr['type']==''||$arr['type']=='0'){
            return $arr['url'];
        }else{
            return C('site_url').$arr['url'];
        }
    }


}

?>