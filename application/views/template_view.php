<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="/js/jquery.loadTemplate.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/css/angular-ui-tree.min.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
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