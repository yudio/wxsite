<?php 
return array (
  'email' => 'true',
  'email_server' => 'smtp.exmail.qq.com',
  'email_port' => '25',
  'email_user' => '',
  'email_pwd' => '',
  'pwd_email_title' => '密码找回',
  'pwd_email_content' => '尊敬的用户{username}:
      这一封是来自远方的信,目的是测试找回您遗失的密码.

请将以下网址复制到浏览器进行验证 {code} 进行验证! ^_^',
    'THINK_EMAIL' => array(
        'SMTP_HOST'   => 'smtp.exmail.qq.com', //SMTP服务器
        'SMTP_PORT'   => '465', //SMTP服务器端口
        'SMTP_USER'   => 'no-reply@nicepa.cn', //SMTP服务器用户名
        'SMTP_PASS'   => 'nice2014', //SMTP服务器密码
        'FROM_EMAIL'  => 'no-reply@nicepa.cn', //发件人EMAIL
        'FROM_NAME'   => '奈斯伙伴', //发件人名称
        'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
        'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
    ),
);