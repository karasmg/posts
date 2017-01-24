<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
		  rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/css/angular-ui-tree.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">

</head>

<body ng-app="demoApp" ng-controller="BasicExampleCtrl">
<div id="fb-root"></div>
<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.8&appId=1117093858416886";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<div class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Сообщения</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-ex-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active">
					<a href="#">Главная</a>
				</li>
				<li>
					<a href="#">Сообщения</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<?php include 'application/views/'.$content_view; ?>
<script src="/js/angular.min.js"></script>
<script src="/js/angular-route.min.js"></script>
<script src="/js/ui-bootstrap-tpls.js"></script>

<script src="/js/main.js"></script>
<script src="/js/handleCtrl.js"></script>
<script src="/js/nodeCtrl.js"></script>
<script src="/js/nodesCtrl.js"></script>
<script src="/js/treeCtrl.js"></script>
<script src="/js/uiTree.js"></script>
<script src="/js/uiTreeHandle.js"></script>
<script src="/js/uiTreeNode.js"></script>
<script src="/js/uiTreeNodes.js"></script>
<script src="/js/helper.js"></script>

<script src="/js/basic-example.js"></script>
</body>

</html>