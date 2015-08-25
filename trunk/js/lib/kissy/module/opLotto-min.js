KISSY.add(function(S, N, E, A, IO){
	var $ = S.all;
	var opLotto = {
		init: function(){
			this.imgList = $('.img-list').all('li');
			this.imgitems = $('.img-list').all('img');
			this.serverid = $("#serverid").val();
			this.uid = $("#uid").val();
			this.length = this.imgList.length;
			this.startIndex = 0;
		},
		_run: function(index){
			var next = index + 1 === this.length ? 0 : index + 1;
			this.imgList.removeClass('active');
			this.imgList.item(next).addClass('active');
			this.startIndex = next;
		},
		start: function(){
			this.imgitems.attr('src','http://www.97ng.com/images/hd/hd_1/cover.png');
			var self = this;
			self.timer = setInterval(function(){
				self._run(self.startIndex);
			}, 20);
		},
		pause: function(){
			this.timer && clearInterval(this.timer);
			this._animate(this.startIndex);
		},
		_animate: function(index) {
			var self = this;
			var selectedItem = self.imgList.item(index);
			var offsetTop = selectedItem.css('top');
			var offsetLeft = selectedItem.css('left');
			var cloneItem = selectedItem.one('img').clone().appendTo('.content');
			cloneItem.css({
				'width': '100px',
				'height': '100px',
				'position': 'absolute',
				'top': offsetTop,
				'left': offsetLeft,
				'border-radius': '0px'
			}).animate({
				'top': parseInt(offsetTop, 10) - 50
			}, 0.2, 'easeOut').animate({
				'top': 130,
				'left': 200,
				'opacity': 0
			}, 1, 'bounceOut', function() {
				cloneItem.remove();
				self._print(index);
			});
		},
		_print: function(index){
			IO.get('http://www.97ng.com/activity/hd_1/bet', {'index': index,'server_id':this.serverid}, function(data){
				if(data.code==-1){
					$('.detail').html('<br /><br />请先登录！<br /> <br /><a href=\"http://www.97ng.com/user/login\">去登录</a>').fadeIn(0.5);
				}else if(data.code==0){
					$('.detail').html('<br /><br />您没有抽奖机会了！').fadeIn(0.5);
				}else if(data.code==1){
					$('.detail').html('<br />恭喜您抽中了：'+data.card_name+'<br /><br />卡号：'+data.card_no+'<br /><br />请在游戏中用此卡号领取奖励!').fadeIn(0.5);
				}else{
					//$('.detail').html('<img src="' + data.url + '" /><br /><br />'+data.desc).fadeIn(0.5);
					$('.detail').html('<br /><br />'+data.msg).fadeIn(0.5);
				}
				
			}, 'json');
		}
	};

	return opLotto;

}, {requires: ['node', 'event', 'anim', 'ajax']});