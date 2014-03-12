<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-6
 * Time: 下午4:01
 */

class KeyWord{

    static public function update($data,$module='Public'){

        $db = M('Keyword');
        $delwhere['pid']    = $data['pid'];
        $delwhere['module'] = $module;
        $delwhere['token']  = $data['token'];
        $keys = $db->where($delwhere)->find();
        if ($keys){
            $msg = $db->where($delwhere)->delete();
        }
        $data['module'] = $module;
        $keys = explode(' ',trim($data['keyword']));
        foreach($keys as $vo){
            $insertDa = $data;
            $insertDa['keyword'] = mb_strtoupper($vo,'UTF-8');
            $db->data($insertDa)->add();
            if ($db->getError()){
                LOG::write('Keyword:'.$db->getError()." SQL:".$db->getLastSql(),LOG::ERR);
            }
        }
        return true;
    }

    static public function select($data){
        $db = M('Keyword');
        $keys = explode(' ',trim($data['keyword']));
        foreach($keys as $key){
            $key = mb_strtoupper($key,'UTF-8');
            if ($data['match_type'] == '2'){
                $where['keyword'] = array('like','%'.$key.'%');
                $where['token']   = $data['token'];
                $where['module']  = array('neq','Public');
                $where['match_type'] = 2;
                $where['pid']     = array('neq',$data['pid']);
                return $db->where($where)->find();
            }else if ($data['match_type'] == '1'){
                $where['keyword'] = $key;
                $where['token']   = $data['token'];
                $where['module']  = array('neq','Public');
                $where['match_type'] = 1;
                $where['pid']     = array('neq',$data['pid']);
                return $db->where($where)->find();
            }
        }
        return array();
    }


}

?>