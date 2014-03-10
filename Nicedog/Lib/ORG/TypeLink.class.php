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
                     break;
                 case 'business':
                     switch ($arr['business_type']){
                         case 'official':
                             $arr['url'] = '/wesite/'.$arr['uid'].'/index?wecha_id=FromUserName';
                             break;
                         case 'vipcard'://会员卡
                             break;
                     }
                     break;
                 default:
                     $arr['url'] = "/wesite/{$arr['uid']}/detail?id={$arr['id']}";
             }
         }
         if ($module=='Classify'){
             switch ($arr['type']){
                 case 'article':
                     //   /wesite/test/lists?show=1&classid=325
                     $arr['url'] = "/wesite/{$arr['uid']}/lists?classid={$arr['id']}";
                     break;
                 default:
                     $arr['url'] = "/wesite/{$arr['uid']}/detail?id={$arr['id']}";
             }
         }

        return $arr['url'];
    }


}

?>