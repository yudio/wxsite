/**
 * ��������ͼ
 * 
 * @author 	�ݺ�(lrenwang)
 * @email	lrenwang@qq.com
 * @blog	blog.lrenwang.com
 * @qq		3142442
 * @version 1.2
 * ���� IE7 FireFox
 */
var bar = function (id,title,data){
	//չʾ��id
	this.id = '';

	//����
	this.title = '';

	//����
	this.data = '';

	//��
	this.width = 3000;
	
	//����ͼƬλ��
	this.bgimg = 'themes/images/plan.gif';
	
	//�����ٶ�
	this.speed = 5000;

	//ͶƱ����
	var num_all = 0;
	this.show = function (){
		//���һ��table����
		$("#"+this.id).append("<table width='"+this.width+"' cellpadding=0 cellspacing=6 border=0 style='font-size:12px;' ></table>")

		$("#"+this.id+" table").append("<tr><td colspan=3 align='center' ><span style='font:900 14px ;color:#444'>"+this.title+"</span></td></tr>")

		//��������
		$(this.data).each(function(i,n){
			num_all += parseInt(n[1]);
		})

		var that = this;

		//��ʼ
		var s_img = [0,-52,-104,-156,-208];
		//�м����ʼ����
		var c_img = [-312,-339,-367,-395,-420];
		//����
		var e_img = [-26,-78,-130,-182,-234];
		var that = this;
		var div;
		$(this.data).each(function(i,n){
			
			//�������
			var bili = (n[1]*100/num_all).toFixed(2);
			
			//����ͼƬ����, *0.96��Ϊ�˸�ǰ��ͼƬ���ռ� izcq
			var img = parseFloat(bili)*0.96;
	
			if(img>0)
			{
				div = "<div style='width:3px;height:16px;background:url("+that.bgimg+") 0px "+s_img[i]+"px ;float:left;'></div><div fag='"+img+"' style='width:0%;height:16px;background:url("+that.bgimg+") 0 "+c_img[i]+"px repeat-x ;float:left;'></div><div style='width:3px;height:16px;background:url("+that.bgimg+") 0px "+e_img[i]+"px ;float:left;'></div>";
			}
			else
			{
				div='';
			}
			$("#"+that.id+" table").append("<tr><td width='30%' align='right' >"+n[0]+"��</td><td width='60%' bgcolor='#fffae2' >"+div+"</td><td width='10%' nowrap >"+n[1]+"("+bili+"%)</td></tr>")
		})
		
		this.play();
	}

	this.play = function (){
		var that = this;		
		$("#"+this.id+" div").each(function(i,n){
			if($(n).attr('fag'))
			{
				$(n).animate( { width: $(n).attr('fag')+'%'}, that.speed )
			}
		})
	}
}