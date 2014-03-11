var Utils = (function() {
	return {
		/**
		 * 格式化价格，保留几位小数
		 */
		formatMoney : function(money, digit) {
			return money.toFixed(digit);
		},
		/**
		 * 计算页面被卷入的高度
		 */
		getScrollTop : function(self) {
			var doc = self ? document : parent.document;
			return doc.body.scrollTop || doc.documentElement.scrollTop;
		},
		getScrollLeft : function(self) {
			var doc = self ? document : parent.document;
			return doc.body.scrollLeft || doc.documentElement.scrollLeft;
		},
		/**
		 * 判断dom对象是否被隐藏了
		 * @param dom
		 * @returns
		 */
		isHide : function(dom) {
			if(dom.style.display == "none") {
				return true;
			}
			return false;
		},
		/**
		 * 切换class
		 * @param dom	要切换class的dom
		 * @param oldClass	旧class
		 * @param newClass	新class
		 */
		changeClass : function(dom, oldClass, newClass) {
			$delClass(dom, oldClass);
			$addClass(dom, newClass);
		},
		/**
		 * 计算字符串的长度，包括utf-8
		 * @param str String 要计算长度的字符串
		 */
		getStrLength : function(str) {
			var len = 0;
			for(var i=0, l=str.length; i<l; i++) {
				if ((str.charCodeAt(i) & 0xff00) != 0) {
					len ++;
				}
				len ++;
			}
			len = Math.ceil(len / 2);
			return len;
		},
		/**
		 * 计算还剩下多少字
		 * @param contentValue String 要计算的内容
		 * @param contentLengthDom document 展示提示的dom对象
		 */
		countLetters : function(contentValue, contentLengthDom, limit, cutCount) {
			var _cut = 0;
			if(cutCount && cutCount > 0) {
				_cut = cutCount;
			}
			if(!limit) {
				limit = 140;
			}
			var len = Utils.getStrLength(contentValue) + _cut;
			if (len <= limit) {
				contentLengthDom.innerHTML = "<span>"+len+"</span>/"+limit;
			} else {
				contentLengthDom.innerHTML = "<span class='num'>"+len+"</span>/"+limit;
			}
		},
		/**
		 * 绑定输入字符的计数器事件
		 * @param inputDom document 输入框对象
		 * @param tipsDom document 输入字数提示dom对象
		 * @param limit number 上限数值
		 * @param cutCount number 需要被加入统计的字数（即不包括文本内容，但是要统计字数的数量）
		 */
		bindCharCounter : function(inputDom, tipsDom, limit, cutCount) {
			Utils.countLetters(inputDom.value, tipsDom, limit, cutCount);
			inputDom.onkeyup = function() {
				Utils.countLetters(inputDom.value, tipsDom, limit, cutCount);
			};
			inputDom.onpaste = inputDom.onfocus = function() {	// 粘贴或者聚焦的时候，都统计字数
				setTimeout(function() {
					Utils.countLetters(inputDom.value, tipsDom, limit, cutCount);
				}, 50);
			};
		},
		/**
		 * 向textarea控件中的光标所在处插入字符串
		 *
		 * @param objid:textarea控件的id
		 * @param str:欲插入的字符串
		 */
		setTextareaValue : function(objid, str) {
			var myField = $id("" + objid);
			if (document.selection) {	// IE浏览器
				myField.focus();
				sel = document.selection.createRange();
				sel.text = str;
				sel.select();
			}else if (myField.selectionStart || myField.selectionStart == '0') {
				// 得到光标前的位置
				var startPos = myField.selectionStart;
				// 得到光标后的位置
				var endPos = myField.selectionEnd;
				// 在加入数据之前获得滚动条的高度
				var restoreTop = myField.scrollTop;
				myField.value = myField.value.substring(0, startPos) + str
						+ myField.value.substring(endPos, myField.value.length);
				// 如果滚动条高度大于0
				if (restoreTop > 0) {
					// 返回
					myField.scrollTop = restoreTop;
				}
				myField.focus();
				myField.selectionStart = startPos + str.length;
				myField.selectionEnd = startPos + str.length;
			} else {
				myField.value += str;
				myField.focus();
			}
		},
		/**
		 * 根据属性和属性值寻找父节点
		 * @param child
		 * @param attr
		 * @param attrValue
		 * @param root	寻找到这个节点为止
		 * @returns
		 */
		findParentByAttr : function(child, attr, attrValue, root) {
			if(child === root && child.getAttribute(attr) != attrValue) {
				return null;
			}
			var node = child.parentNode;
			if(!root) {
				root = document.body;
			}
			do {
				if(node.getAttribute(attr) == attrValue) {
					return node;
				}else {
					if(node === root) {
						return null;
					}
					node = node.parentNode;
				}
			}while(node !== null);
		},
		loadJsFile : function(url, charset) {
			var a = document.createElement('script');
			a.setAttribute('type', 'text/javascript');
			a.setAttribute('charset', charset?charset:'utf-8');
			a.setAttribute('src', url);
			document.getElementsByTagName('head')[0].appendChild(a);
		},
		addCalendar : function(option) {
			var opt = {
					inputDom : null,
					iconDom : null,
					unit : "day",
					fn : null
			};
			for(var i in option) {
				opt[i] = option[i];
			}
			if(opt.inputDom) {
				opt.inputDom.onclick = function(e) {
					e = e || window.event;
					var _self = this;
					$calendars({
				        el:this,
				        callback:function (n) {
				            _self.value = n;
				            if(opt.fn) {
								opt.fn();
							}
				        },
				        unit : opt.unit,
				        nowDate: this.value,
				        e:e
					});
					if($id("frmCalendar")) {	// 在IE7一下，该日历框太高了，影响市容，修理一下
						$id("frmCalendar").style.height = "200px";
					}
					$id("elCalendarWrap").style.zIndex = "10000";
				};
				if(opt.iconDom) {
					opt.iconDom.onclick = function(e) {
						$stopBubble(e);	// 停止冒泡，防止弹出的日历框因失去焦点而消失
						$fireEvent(opt.inputDom);
					};
				}
			}
		},
		getRadioValueByName : function(name) {
			var names = $attr("name", name, root);
			for(var i in names) {
				if(names[i].checked == true) {
					return names[i].value;
				}
			}
			return null;
		},
		getCheckboxValueByName : function(name) {
			var names = $attr("name", name, root);
			var values = [];
			for(var i in names) {
				if(names[i].checked == true) {
					values.push(names[i].value);
				}
			}
			return values;
		},
		/**
		 * 通过图片原图地址替换要是用到size的地址
		 * @param initUrl
		 * @param size
		 * @returns
		 */
		getImgUrlBySize : function(initUrl, size) {
			if(!initUrl) {
				return "";
			}
			return initUrl.replace(/(.+)(\/\d+)$/g, '$1/'+size);
		},
		getPaipaiImgUrlBySize : function(initUrl, size) {
			if(!initUrl) {
				return "";
			}
			return initUrl.replace(/(.+)(\.[\w]+)$/g, '$1.'+size+'x'+size+'$2');
		},

		getUrlBySize : function(url,size){
			if(url.indexOf('http://p.qpic.cn/ecc_merchant/') === 0){
				if('MEDIUM' === size){
					size = 450;
				}else if('SMALL' == size){
					size = 200;
				}
				return Utils.getImgUrlBySize(url,size);
			}else{
				if('MEDIUM' === size){
					size = 300;
				}else if('SMALL' == size){
					size = 200;
				}
				return Utils.getPaipaiImgUrlBySize(url,size);
			}

		},



		/**
		 *
		 * @returns
		 */
		setAnchor : function(anchor) {
			var loc = window.location.href;
			if(loc.indexOf("#") != -1) {
				window.location = loc.replace(/#.+/g, '#'+anchor);
			}else {
				window.location = loc + "#" + anchor;
			}
		},
		setGray : function(dom) {
			dom.style.color = "#999";
		},
		setBlack : function(dom) {
			dom.style.color = "#000";
		},
		changeUrlByPageNumber : function(pageNumber){
				var locationHash=window.location.hash;
				var locationUrl=window.location.href;
				if(locationHash){
					if(locationHash==""){
						window.location.href=locationUrl+"#pageNumber="+pageNumber;
					}else{
						var hashIndex=locationUrl.indexOf(locationHash);
						var requestUrl=locationUrl.substring(0,hashIndex);
						window.location.href=requestUrl+"#pageNumber="+pageNumber;
					}
				}else{
					window.location.href=locationUrl+"#pageNumber="+pageNumber;
				}
		},
		getPageNumberFromAnchor : function(){
			var locationHash=window.location.hash;
			var locationUrl=window.location.href;
			if(locationHash){
				if(locationHash==""){
					return 1;
				}else{
					var pageNumberStr="pageNumber=";
					var hashIndex=locationUrl.indexOf(locationHash);
					var anchor=locationUrl.substring(hashIndex);
					var pageNumberIndex=anchor.indexOf(pageNumberStr);
					if(pageNumberIndex>0){
						var pageNumber=anchor.substring(pageNumberIndex+pageNumberStr.length);
						var result=parseInt(pageNumber);
						if(isNaN(result)){
							return 1;
						}else{
							return result;
						}
					}else{
						return 1;
					}
				}
			}else{
				return 1;
			}
		},
		/**
		 * 支持date，number类型的格式化
		 * @param date
		 * @param formatStr
		 * @returns
		 */
		formatDate : function(date, formatStr) {
			if(typeof date == "number") {
				date = new Date(date);
			}
			return $formatDate(date, formatStr);
		},
		/**
		 * 阻止事件冒泡
		 */
		stopBubble : function(event) {
			$stopBubble(event);
		},
		encodeHtml : function(html) {
			return $htmlEncode(html);
		},
		decodeHtml : function(content) {
			return typeof(content) != "string" ? "" : content.replace(/&lt;/g, "<")
					.replace(/&gt;/g, ">")
					.replace(/&quot;/g, "\"")
					.replace(/&#39;/g, "\'")
					.replace(/&nbsp;/g, " ")
					.replace(/&#92;/g,"\\")
					.replace(/&amp;/g, "&");
		},
		getFileSize : function(sizeNum) {
			if(typeof sizeNum != 'number') {
				return sizeNum;
			}
			if(sizeNum > 1048576) {
				return (sizeNum/1048576).toFixed(1)+"MB";
			}else if(sizeNum > 1024) {
				return (sizeNum/1024).toFixed(1)+"KB";
			}else if(sizeNum > 0) {
				return sizeNum+"B";
			}else {
				return sizeNum;
			}
		},
		getFormatTime : function(seconds) {
			var _getTen = function(s) {
				if(s<10) {
					return "0"+s;
				}else {
					return s;
				}
			};
			return Math.floor(seconds/60)+":"+_getTen(seconds%60);
		},
		addEvent : function(dom, type, fn) {
			$addEvent(dom, type, fn);
		},
		trim : function(str) {
			if(typeof str == "string") {
				return str.replace(/(^\s+)|(\s+$)/g, "");
			}else {
				return str;
			}
		},

		parseInt : function(str){
			return window.parseInt(str);
		},

		setPageHeight : function(height) {
		},
		// 是否被嵌入了iframe
		isEmbeddedIframe : function() {
			return window.self != window.parent;
		},
		isColorValue : function(colorValue) {
			var reg = /^#[A-Fa-f0-9]{0,6}$/;
			return reg.test(colorValue);
		},
		/**
		 * 浅层复制对象
		 * @param o
		 * @returns
		 */
		object : function(o) {
			var F = function() {};
			F.prototype = o;
			return new F();
		},
		extend : function(subType, superType) {
			var prototype = Utils.object(superType.prototype);
			prototype.constructor = subType;
			subType.prototype = prototype;
		},
		isEmpty : function(obj) {
			for(var name in obj) {
		        return false;
		    }
		    return true;
		},
		getUrlParam : function(name, url) {
			var search = url || window.location.search;
			var reg = new RegExp('[\\?&]'+name+'=([^&^#]+)', 'g');
			reg.test(search);
			return RegExp.$1;
		}
	};
})();

if (window.define) {
	define(function(require, exports) {
	  var legos=require('legos');
	  exports.utils=window.Utils;
	});
}