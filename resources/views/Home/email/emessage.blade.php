<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p style="text-align: center;">尊敬的{{$req['username']}}:</p>
	
	<p>
    &nbsp;&nbsp;您好，感谢您注册 音悦杂志社（yinyue.com）。这是一封注册验证邮件。
    <br> 
	请点击以下链接完成确认： <a href="http://yinyue.com/home/activate?id={{$id}}&token={{$token}}">http://myapp.com/home/jihuo?id={{$id}}&token={{$token}}</a>
	<br> 
	如果链接不能点击，请复制地址到浏览器，然后直接打开。</p> 

	<p style="text-align: right;">
													
													音悦杂志社
												</p>

	<br>

</body>
</html>
