<?php
return array (
    'plugmenu_typelist' => array(
        array('value'=>'link', 'name'=> '链接'),
        array('value'=>'tel', 'name' => '电话'),
        array('value'=>'map', 'name' => '导航'),
        array('value'=>'activity', 'name' => '活动'),
        array('value'=>'business', 'name' => '业务模块'),
        array('value'=>'car', 'name' => '微汽车'),
        array('value'=>'estate', 'name' => '微房产'),
        array('value'=>'food', 'name' => '微餐饮'),
        array('value'=>'shop', 'name' => '微商城'),
        array('value'=>'tg', 'name' => '微团购'),
    ),
    'plugmenu_typemap' => array(
        'link'=> '链接',
        'tel' => '电话',
        'map' => '导航',
        'activity' => '活动',
        'business' => '业务模块',
        'car' => '微汽车',
        'estate' => '微房产',
        'food' => '微餐饮',
        'shop' => '微商城',
        'tg' => '微团购',
    )

);

/*
 *
 *
 <option value="link,链接" <if condition="$info.type eq 'link'">selected="selected"</if>>链接</option>
            <option value="tel,电话" <if condition="$info.type eq 'tel'">selected="selected"</if>>电话</option>
            <option value="map,导航" <if condition="$info.type eq 'map'">selected="selected"</if>>导航</option>
            <option value="activity,活动" <if condition="$info.type eq 'activity'">selected="selected"</if>>活动</option>
            <option value="business,业务模块" <if condition="$info.type eq 'business'">selected="selected"</if>>业务模块</option>
            <option value="car,微汽车" <if condition="$info.type eq 'car'">selected="selected"</if>>微汽车</option>
            <option value="estate,微房产" <if condition="$info.type eq 'estate'">selected="selected"</if>>微房产</option>
            <option value="food,微餐饮" <if condition="$info.type eq 'food'">selected="selected"</if>>微餐饮</option>
            <option value="shop,微商城" <if condition="$info.type eq 'shop'">selected="selected"</if>>微商城</option>
            <option value="tg,微团购" <if condition="$info.type eq 'tg'">selected="selected"</if>>微团购</option>
 */