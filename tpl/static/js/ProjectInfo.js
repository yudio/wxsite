
//主题置顶模板
var toptmp = "<div class='moudule-radiusfrm'><div class='a-title'>{0}</div><div class='a-divimg' value='{2}' projname='{3}'><img alt='' src='{1}' /></div></div>";
//内容标题模板
var contexttitletmp = "<div class='moudule-radiusfrm'><div class='b-title'>在售项目</div></div>";
//内容详情列表模板
var contexttmp = "<div class='b-detailfrm' value='{0}' projname='{1}'><div class='b-divimg'><img alt='' src='{2}' /></div>"
                + "<div class='b-context'><div style = 'color: #000000;font-weight: bold;'>【{3}】<span></span></div><div>地址：{4}</div><div>户型：{5}</div><div>电话：<a class='tel' href='' telephone='{6}'>{6}</a></div></div></div>";


//通过AJAX JSON 获取数据
function loadProjectInfo(data) {
    var list = eval("(" + data + ")");
    //得到置顶数据并加载到<主题置顶模板>
    CreateTop(list.top);
    //得到内容详情并加载到<内容详情列表模板>
    CreateContext(list.plist);
    //加载页面必要事件
    BindEvent();
}

function CreateTop(top) {
    var divtop = $("#projtop");
    len = top.length;
    var tophtml = "";
    if (len > 0) {
        tophtml = toptmp.format(top[0].Subject, top[0].PicUrl, top[0].wxuid, top[0].Subject);
    } else {
        divtop.hide();
    }
    divtop.append(tophtml);
}
function CreateContext(context) {
    var divcontent = $("#projlist");
    var content = "";
    var len = context.length;

    if (len > 0) {
        divcontent.append(contexttitletmp);
        for (var i = 0; i < context.length; i++) {
            var obj = $(contexttmp);
            if (i == context.length - 1) {
                obj = obj.css('border-bottom', '0px solid #dedede');
            }
            if (context[i].ProjStatus == "热卖中") {
                var span = obj.find('.b-context span'); //<span>Hot !</span>
                span.html('Hot !');
                content += obj[0].outerHTML.format(context[i].id, context[i].title, context[i].banner, context[i].title, context[i].place, context[i].desc, context[i].tel);
            } else {
                content += obj[0].outerHTML.format(context[i].id, context[i].title, context[i].banner, context[i].title, context[i].place, context[i].desc, context[i].tel);
            }
        }
    } else {
        divcontent.hide();
    }
    $('.b-title').after(content);

}

function BindEvent() {
    //点击电话事件屏蔽掉行点击事件
    $('.tel').on("click", function(event) {
        var telephone = $(this).attr('telephone');
        $(this).attr('href', 'tel:' + telephone.toString());
        event.cancelBubble = true
        event.stopPropagation();
    })
    //加载行点击事件
    $('.b-detailfrm').click(function() {
        var value = $(this).attr("value");
        var wxuid = $('#wxuid').attr('value');
        var name = $(this).attr("projname");
		window.location.href='/WebEstate/'+wxuid+'/detail?id='+value;
    });
}
 