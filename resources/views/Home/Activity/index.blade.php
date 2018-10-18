@extends('Home.Public.layout')

@section('yield','活动中心')

@section('content')
<div class="mymusicActivity" style="width:100%;height:700px;background-image: url('/homes/images/banner3.jpg');">
	
</div>
<!-- 左侧播放器 开始-->
<div id="jp_container_N" class="jp-video jp-video-270p jp-state-playing" role="application" aria-label="media player" style="left: 0px; height: 94px; bottom: 80px;">
	<div class="jp-type-playlist">
		<div id="jquery_jplayer_N" class="jp-jplayer" style="width: 90px; height: 90px;">

			<audio id="jp_audio_0" preload="metadata" src="/homes/MP3/shui.mp3" title="廖峻涛"></audio>
			<video id="jp_video_0" preload="metadata" title="廖峻涛" style="width: 0px; height: 0px;"></video>
		</div>
		<div class="jp-gui">
			<div class="jp-video-play" style="display: none;">
				<button class="jp-video-play-icon" role="button" tabindex="0">播放</button>
			</div>
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar" style="width: 100%;">
						<div class="jp-play-bar" style="overflow: hidden; width: 97.5219%;"></div>
					</div>
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">04:11</div>
				<div class="jp-duration" role="timer" aria-label="duration">04:17</div>
				<div class="jp-controls-holder">
					<div class="jp-controls">
						<button class="jp-previous" role="button" tabindex="0">上一曲</button>
						<button class="jp-play" role="button" tabindex="0">播放</button>
						<button class="jp-next" role="button" tabindex="0">下一曲</button>
						<button class="jp-stop" role="button" tabindex="0">暂停</button>
					</div>
					<div class="jp-volume-controls">
						<button class="jp-mute" role="button" tabindex="0">静音</button>
						<button class="jp-volume-max" role="button" tabindex="0">最大音量</button>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value" style="width: 10%;"></div>
						</div>
					</div>
					<div class="jp-toggles">
						<button class="jp-repeat" role="button" tabindex="0">重复</button>
						<button class="jp-shuffle" role="button" tabindex="0">随机</button>
						<!--<button class="jp-full-screen" role="button" tabindex="0">全屏</button>-->
					</div>
				</div>
				<div class="jp-details" style="display: none;">
					<div class="jp-title" aria-label="title">廖峻涛</div>
				</div>
			</div>
		</div>
		<div class="jp-playlist">
			<div class="jp-playlist-box" style="height: 0px;">
				<ul style="height: 1000px; display: block; top: 0px;">
					<li>
						<div>
							<a href="javascript:;" class="jp-playlist-item-remove">×</a>
							<a href="javascript:;" class="jp-playlist-item" tabindex="0">谁 <span class="jp-artist" style="transform: rotate(180deg);"> - 廖峻涛</span></a>
						</div>
					</li>
					<li class="">
						<div>
							<a href="javascript:;" class="jp-playlist-item-remove">×</a>
							<a href="javascript:;" class="jp-playlist-item" tabindex="0">Ellens Gesang III D839 <span class="jp-artist" style="transform: rotate(180deg);"> - Geoffrey Parsons</span></a>
						</div>
					</li>
					<li>
						<div>
							<a href="javascript:;" class="jp-playlist-item-remove">×</a>
							<a href="javascript:;" class="jp-playlist-item" tabindex="0">Fire <span class="jp-artist" style="transform: rotate(180deg);"> - Said The Sky</span></a>
						</div>
					</li>
					<li class="jp-playlist-current" style="display: list-item;">
						<div>
							<a href="javascript:;" class="jp-playlist-item-remove">×</a>
							<a href="javascript:;" class="jp-playlist-item jp-playlist-current" tabindex="0">兰若词 <span class="jp-artist" style="transform: rotate(180deg);"> - 刘亦菲</span></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="jp-no-solution" style="display: none;">
			<span style="transform: rotate(180deg);">升级需要</span> 您浏览器赞不支持播放，请更新版本
			<a href="" target="_blank">Flash插件</a>.
		</div>
	</div>
	<!--歌曲列表滚动条-->
	<div class="scrollBar" style="display: none;">
		<div class="bar" style="top: 0px;"></div>
	</div>
	<!--播放器展开隐藏按钮-->
	<button type="button" class="folded_bt" title="点击收缩" id="btnfold" style="top: 5px;">
  <span style="transform: rotate(180deg);"></span>
</button>
	<div id="listRemove" style="display: none;"></div>
	<!--移除全部歌曲按钮-->
	<div id="listClose"></div>
	<!--歌曲列表展开收缩按钮-->
</div>
<!-- 左侧播放器 结束-->
<div id="wrap" class="container clearfix">
                <section id="content" class="primary" role="main">
                    <article id="post-13827" class="content-excerpt post-13827 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-nomusic tag-t">
                        <h2 class="post-title entry-title">
                            <a href="javascript:void(0)" rel="bookmark">
                                2018年：我真的喜欢做一些让人喜欢的东西
                            </a>
                        </h2>
                        <div class="postmeta">
                            {{$begintime}}
                        </div>
                        <div class="entry clearfix">
                            <p>
                                <img class="" src="/homes/images/TB2uFTbg7OWBuNjSsppXXXPgpXa_!!13533312.jpg" align="absmiddle">
                                <br>
                                2018年音悦杂志社。
                            </p>
                            <a class="mymusicActivity_get more-link" href="javascript:void(0);" id="activity" @if(session('homeuser')) myid="{{session('homeuser')->id}}" @endif myactivity="{{$activityid}}" flag="{{$flag}}">点击获取积分</a>
                        </div>
                    </article>
                </section>
                <section id="sidebar" class="secondary clearfix" role="complementary">
                    <aside id="search-8" class="widget widget_search clearfix">
                        <h3 class="widgettitle">
                            <span>
                                搜索
                            </span>
                        </h3>
                        <form role="search" method="get" class="search-form" action="">
                            <label>

                            </label>
                            <button type="submit" class="search-submit">
                                <span class="fa fa-search" style="color: #aaa;">
                                </span>
                            </button>
                        </form>
                    </aside>
                    </aside>
                    <aside id="text-8" class="widget widget_text clearfix">
                        <h3 class="widgettitle">
                            <span>
                                麦田车载CD
                            </span>
                        </h3>
                        <div class="textwidget">
                            <a href="https://www.mtyyw.com/18639/" rel="nofollow" target="_blank">
                                <img src="" alt="麦田音乐CD" width="350" height="337" class="alignnone size-full wp-image-11045">
                            </a>
                        </div>
                    </aside>
                </section>
            </div>
@stop

@section('js')
	<!--播放器js-->
	<script src="/homes/js/player.js"></script>
	<script src="/homes/js/playlist.js"></script>
	<script src="/homes/js/player_database.js"></script>
	<!--播放器js-->
	<script type="text/javascript">
		$('.mymusicActivity_get').click(function(){
			@if(session('homeuser'))
				if($('#activity').attr('flag') != 1){
					$.post('/home/activity/get',{
						"_token":"{{csrf_token()}}",
						"uid":$('#activity').attr('myid'),
						"aid":$('#activity').attr('myactivity')},function(data){
							console.log(data);
						if(data.flag == 1){
							swal("温馨提示","你已经领过了哦","error");
						}else if(data.flag == 2){
							swal("温馨提示","领取失败","error");
						}else if(data.flag == 0){
							$('#activity').attr('flag',1);
							swal("温馨提示","恭喜你领取到"+data.myactivity+"积分","success");
						}
					})
				}else{
					swal("温馨提示","你已经领过了哦","error");
				}
			@else
				swal("温馨提示","请登录后领取哦","error");
			@endif
		})
	</script>
@stop