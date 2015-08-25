/*积分，瓜子抽奖*/
KISSY.add(function(S, N, E, A, IO){
	var $ = S.all;
	var SignCj = {
		init: function(){
			this.imgList = $('.img-list').all('li');
			this.imgitems = $('.img-list').all('img');
			this.uid = $("#uid").val();
			this.length = this.imgList.length;
			this.startIndex = 0;
			this.stopIndex = 0;
			this.got_back = 0;
			this.loop_count = 0;
			this.bet_status = 9999;
			this.bet_got = 0;
			this.last_chance = $("#last_chance").val();
		},
		_run: function(index){
			var next = index + 1 === this.length ? 0 : index + 1;
			this.imgList.removeClass('active');
			this.imgList.item(next).addClass('active');
			this.startIndex = next;
			this.loop_count++;
			if(next == this.stopIndex && this.got_back && this.loop_count>60){
				this.timer && clearInterval(this.timer);
				this.stop();
			}
		},
		start: function(){
			var self = this;			
			if(self.last_chance>0){
				self.timer = setInterval(function(){
					self._run(self.startIndex);
				}, 50);
				self._bet();
			}else{
				if(self.last_chance==0){
					self._msg("没有抽奖机会了");
				}else{
					self._msg("未登录");	
				}
				
			}
			
		},
		pause: function(){			
			this.timer && clearInterval(this.timer);
			this._animate(this.startIndex);
		},
		stop: function(){
			var self = this;
			self.loop_count=0;
			self.startIndex=0;			
			this._animate(self.stopIndex);
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
				'opacity': 1
			}, 1, 'bounceOut', function() {
				cloneItem.remove();
				self._print();
			});
		},
		_print: function(){
				var self = this;
				if(self.bet_status ==-1){
					$('.detail').html('<br /><br />请先登录！<br /> <br /><a href=\"http://www.97ng.com/user/login\">去登录</a>').fadeIn(0.5);
				}else if(self.bet_status ==0){
					$('.detail').html('<br /><br />您没有抽奖机会了！').fadeIn(0.5);
				}else if(self.bet_status ==1){
					$('.detail').html('恭喜您抽中了：'+self.bet_got+'瓜子').fadeIn(0.5);
					$('.detail').html('恭喜您抽中了：'+self.bet_got+'瓜子<br/><br/><img src="http://www.97ng.com/images/hd/jfcj/' + (self.stopIndex+1) + '.jpg" />').fadeIn(0.5);
				}				
				
				
				self.stopIndex=0;
				self.got_back=0;
				self.bet_got = 0;
				self.bet_status =9999;
				$("#start").html("再抽一次").show();
				$("#last_chance_show").html(self.last_chance);
	
		},
		_msg: function(msg){
				$('.detail').html('<br /><br />'+msg).fadeIn(0.5);
		},		
		_bet: function(){
			var self = this;
			IO.get('http://www.97ng.com/activity/sign_cj/bet', {}, function(data){	
				self.bet_status = data.status;
				self.stopIndex = data.gift_index-1;				
				self.bet_got = data.gift;
				self.got_back = 1;	
				self.last_chance = data.last_chance;
			}, 'json');
		}		
	};

	return SignCj;

}, {requires: ['node', 'event', 'anim', 'ajax']});