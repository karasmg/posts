<script>
	var init_posts = <?=$data['posts'].';';?>
</script>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-sm-2">
							<label for="inputEmail3" class="control-label">Текст сообщения</label>
						</div>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail3" placeholder="Сообщение">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Отправить</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Nested node template -->
<script type="text/ng-template" id="nodes_renderer.html">
	<div ui-tree-handle class="tree-node tree-node-content">
		<a class="btn btn-success btn-xs" ng-if="node.nodes && node.nodes.length > 0" data-nodrag   ng-click="toggle(this)">
			<span class="glyphicon"	ng-class="{'glyphicon-chevron-right': collapsed, 'glyphicon-chevron-down': !collapsed}">
			</span>
		</a>
		{{'(' + node.p_date+ '): ' +node.p_text}}
		<?php /*
		<a class="pull-right btn btn-danger btn-xs" data-nodrag ng-click="remove(this)"><span
					class="glyphicon glyphicon-remove"></span></a>
		<a class="pull-right btn btn-primary btn-xs" data-nodrag ng-click="newSubItem(this)" style="margin-right: 8px;"><span
					class="glyphicon glyphicon-plus"></span></a>
		 */ ?>
	</div>
	<ol ui-tree-nodes="" ng-model="node.nodes" ng-class="{hidden: collapsed}">
		<li ng-repeat="node in node.nodes" ui-tree-node ng-include="'nodes_renderer.html'">
			<input id="actionText" class="form-control" ng-show="showInput"/>
			<div><a style="float: right;" href="#" ng-click="showInput" >Ответить</a>
				<br style="clear: both"></div>
		</li>
	</ol>
</script>

<div class="section">
	<div class="container">

		<div class="row">
			<div class="col-sm-12">
				<button ng-click="expandAll()">Развернуть все</button>
				<button ng-click="collapseAll()">Свернуть все</button>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div ui-tree data-nodrop-enabled="true" id="tree-root">
					<ol ui-tree-nodes data-nodrop-enabled="true" ng-model="data">
						<li ng-repeat="node in data" ui-tree-node ng-include="'nodes_renderer.html'"></li>
					</ol>
				</div>
			</div>


		</div>
	</div>
</div>

<?php /*

<div class="section">
	<div class="container">

		<div class="row" ng-controller="BasicExampleCtrl">

			<div class="col-md-4">
				<div class="well">

					<div class="form-group row">
						<label for="actionText">Сообщение:</label>
						<input id="actionText" class="form-control" ng-model="post.action"/>
					</div>

					<!-- При введении значений в поля action и priority angular автоматически создает объект task и устанавливает для него свойства. -->
					<button class="btn btn-primary btn-block" ng-click="addPost(post)">Отправить</button>
				</div>
			</div>

			<div class="col-md-8 panel-primary">
				<div class="panel-heading">
					<div class="panel-title">
                        <span class="label label-info">
                            {{(posts | filter : {complete : 'false'} ).length}}
                        </span>
						</h3>
					</div>
				</div>

				<table class="table">
					<tbody>
					<tr ng-repeat="post in posts">
						<td>{{post.action}}</td>
						<td>{{post.priority}}</td>
						<td><input type="checkbox" ng-model="post.complete"/></td>
					</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

 */
?>