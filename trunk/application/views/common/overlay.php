
<style>
#overlay-container-1 {
	z-index: 11;
}

#content-settings-page {
	min-width: 620px;
}

section {
	-webkit-padding-start: 18px;
	margin-bottom: 24px;
	margin-top: 8px;
	max-width: 600px;
}

section>h3 {
	-webkit-margin-start: -18px;
}

.controlled-setting-with-label {
	-webkit-box-align: center;
	display: -webkit-box;
	padding-bottom: 7px;
	padding-top: 7px;
}

.controlled-setting-with-label>input+span {
	-webkit-box-align: center;
	-webkit-box-flex: 1;
	-webkit-margin-start: 0.6em;
	display: -webkit-box;
}
</style>
<link rel="stylesheet" href="/css/form/widgets.css">
<link rel="stylesheet" type="text/css" href="/css/overlay/overlay.css">


<div id="overlay-container-1" class="overlay" style="display: none">
	<div id="content-settings-page" class="page" style="max-height: 400px">
		<div class="close-button"></div>
		<h1 i18n-content="contentSettingsPage">内容设置</h1>
		<div class="content-area">
			<!-- Cookie filter tab contents -->
			<section>
				<h3 i18n-content="cookies_tab_label">Cookie</h3>
				<div>
					<div class="radio">
						<span class="controlled-setting-with-label"> <input id="cookies-allow" type="radio" name="cookies" value="allow"> <span> <label for="cookies-allow" i18n-content="cookies_allow">允许设置本地数据（推荐）</label>
								<span class="bubble-button controlled-setting-indicator" content-setting="cookies" value="allow">
									<div tabindex="0" role="button"></div>
							</span>
						</span>
						</span>
					</div>
					<div class="radio">
						<span class="controlled-setting-with-label"> <input id="cookies-session" type="radio" name="cookies" value="session"> <span> <label for="cookies-session" i18n-content="cookies_session_only">只在我退出浏览器之前保留本地数据</label>
								<span class="bubble-button controlled-setting-indicator" content-setting="cookies" value="session">
									<div tabindex="0" role="button"></div>
							</span>
						</span>
						</span>
					</div>
					<div class="radio">
						<span class="controlled-setting-with-label"> <input id="cookies-block" type="radio" name="cookies" value="block"> <span> <label for="cookies-block" i18n-content="cookies_block">阻止网站设置任何数据</label>
								<span class="bubble-button controlled-setting-indicator" content-setting="cookies" value="block">
									<div tabindex="0" role="button"></div>
							</span>
						</span>
						</span>
					</div>
					<div class="checkbox">
						<span class="controlled-setting-with-label"> <input id="block-third-party-cookies" pref="profile.block_third_party_cookies" type="checkbox"> <span> <label for="block-third-party-cookies"
								i18n-content="cookies_block_3rd_party">阻止第三方 Cookie 和网站数据</label> <span class="bubble-button controlled-setting-indicator" pref="profile.block_third_party_cookies">
									<div tabindex="0" role="button"></div>
							</span>
						</span>
						</span>
					</div>
					<!-- TODO(jochen): remove the div with the clear cookies on exit option
	              				once this has shipped. -->
					<div class="checkbox" guest-visibility="disabled" hidden="">
						<label> <input id="clear-cookies-on-exit" pref="profile.clear_site_data_on_exit" type="checkbox"> <span i18n-content="cookies_lso_clear_when_close" class="clear-plugin-lso-data-enabled">关闭浏览器时清除
								Cookie 以及其他网站数据和插件数据</span> <span i18n-content="cookies_clear_when_close" class="clear-plugin-lso-data-disabled">关闭浏览器时清除 Cookie 和其他网站数据</span>
						</label>
					</div>
					<div class="settings-row">
						<button class="exceptions-list-button" contenttype="cookies" i18n-content="manageExceptions">管理例外情况...</button>
						<button id="show-cookies-button" i18n-content="cookies_show_cookies">所有 Cookie 和网站数据...</button>
					</div>
				</div>
			</section>

			<section guest-visibility="disabled">
				<h3 i18n-content="protectedContentTabLabel" class="content-settings-header">受保护的内容</h3>
				<div>
					<div class="settings-row">
						<p i18n-content="protectedContentInfo">有些内容服务会使用机器标识符来标识您的个人身份，以便授予您访问受保护内容的权限。</p>
					</div>
					<div class="checkbox">
						<label> <input pref="settings.privacy.drm_enabled" type="checkbox"> <span i18n-content="protectedContentEnable">允许将标识符用于受保护内容（可能需要重新启动计算机）</span>
						</label>
					</div>
					<div class="settings-row">
						<button id="protected-content-exceptions" class="exceptions-list-button" contenttype="protectedContent" i18n-content="manageExceptions">管理例外情况...</button>
					</div>
				</div>
			</section>

			<!-- MIDI system exclusive messages filter -->
			<section id="experimental-web-midi-settings" hidden="true">
				<h3 i18n-content="midi-sysex_header">MIDI 完全控制</h3>
				<div>
					<div class="radio">
						<label> <input type="radio" name="midi-sysex" value="allow"> <span i18n-content="midiSysExAllow">允许所有网站使用系统专有消息来访问 MIDI 设备</span>
						</label>
					</div>
					<div class="radio">
						<label> <input type="radio" name="midi-sysex" value="ask"> <span i18n-content="midiSysExAsk">在网站想要使用系统专有消息访问 MIDI 设备时询问我（推荐）</span>
						</label>
					</div>
					<div class="radio">
						<label> <input type="radio" name="midi-sysex" value="block"> <span i18n-content="midiSysExBlock">禁止任何网站使用系统专有消息访问 MIDI 设备</span>
						</label>
					</div>
					<div class="settings-row">
						<button class="exceptions-list-button" contenttype="midi-sysex" i18n-content="manageExceptions">管理例外情况...</button>
					</div>
				</div>
			</section>
		</div>
		<div class="action-area">
			<div class="button-strip" reversed="">
				<button id="content-settings-overlay-confirm" class="default-button" i18n-content="done">完成</button>
			</div>
		</div>
	</div>
</div>


<style>
#overlay-container-1 {
	z-index: 11;
}

#content-settings-page {
	min-width: 620px;
}

section {
	-webkit-padding-start: 18px;
	margin-bottom: 24px;
	margin-top: 8px;
	max-width: 600px;
}

section>h3 {
	-webkit-margin-start: -18px;
}

.controlled-setting-with-label {
	-webkit-box-align: center;
	display: -webkit-box;
	padding-bottom: 7px;
	padding-top: 7px;
}

.controlled-setting-with-label>input+span {
	-webkit-box-align: center;
	-webkit-box-flex: 1;
	-webkit-margin-start: 0.6em;
	display: -webkit-box;
}
</style>
<link rel="stylesheet" href="/css/form/widgets.css">
<link rel="stylesheet" type="text/css" href="/css/overlay/overlay.css">
<div id="overlay-container-1" class="overlay" style="display:none ">
	<div id="content-settings-page" class="page" style="max-height: 400px">
		<div class="close-button"></div>
		<h1>选择物料</h1>
		<div class="content-area loading" id="material-select-box" style="min-height:100px;">
		</div>
		<div class="action-area">
			<div class="button-strip" >
				<button id="content-settings-overlay-confirm" class="default-button" >完成</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){ 
	$(".overlay .close-button").click(function() {
		$(".overlay").hide();
	});
});
</script>

