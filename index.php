<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Manager</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<?php 
		require_once 'act.php';
		require_once 'views/modal.php';
	?>
</head>
<body>
	<h1>在線文件管理器</h1>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="index.php" title="主目錄"><span class="glyphicon glyphicon-home"></span></a>
		    </div>
		    <ul class="nav navbar-nav">
		        <li class="active">
		        	<a href="#" onclick="show('createFile')" title="新建文件">
		        	<span class="glyphicon glyphicon-file"></span></a>
		        </li>	
		        <li>
		        	<a href="#" onclick="show('createFolder')" title="新建文件夹">
		        	<span class="glyphicon glyphicon-folder-open"></span></a>
		        </li>
		        <li>
		        	<a href="#" onclick="show('uploadFile')" title="上傳文件">
		        	<span class="glyphicon glyphicon-upload"></span></a>
		        </li>
		        <li>
		        	<?php $back = ($path=="file")?"file":dirname($path);?>
		        	<a href="#" onclick="goBack('<?=$back;?>')" title="返回上級目錄">
		        	<span class="glyphicon glyphicon-arrow-left"></span></a>
		        </li>
	        </ul>	
		</div>
	</nav>
	
	<div id="showDetail"  style="display:none"><img src="" id="showImg" alt=""/></div>

	<form action="index.php" method="post" enctype="multipart/form-data">
		<table class="table table-bordered">
			<div id="createFile" class="form-group hidden">
			    <label>請輸入文件名稱</label>
				<input type="text"  name="filename" />
				<input type="hidden" name="path" value="<?=$path;?>"/>
				<input type="submit" name="act" value="創建文件" />	
		  	</div>
			<div id="createFolder" class="form-group hidden">
		  		<label>請輸入入文件夾名稱</label>
				<input type="text" name="dirname" />
				<input type="hidden" name="path" value="<?=$path;?>"/>
				<input type="submit" name="act"  value="創建文件夾"/>
		  </div>
		  <div id="uploadFile" class="form-group row hidden">
		    <div class="col-xs-2">
		    	<label>請選擇要上傳的文件</label>
			</div>
			<div class="col-xs-10">
				<input type="file" name="myFile" />
				<input type="submit" name="act" value="上傳文件" />	
			</div>
		  </div>

			<tr>
				<td>#</td>
				<td>名稱</td>
				<td>類型</td>
				<td>大小</td>
				<td>可讀</td>
				<td>可寫</td>
				<td>可執行</td>
				<td>創建時間</td>
				<td>修改時間</td>
				<td>訪問時間</td>
				<td>操作</td>
			</tr>
		<?php 
		if($info['file']){
			$i=1;
			foreach($info['file'] as $val){
				$p=$path."/".$val;
				//得到文件拓展名
				$ext=strtolower(end(explode(".",$val)));
				$imageExt=array("gif","jpg","jpeg","png");
				require 'views/table.file.php';
				$i++;
			}
		}

		if($info['dir']){
			$i=$i==null?1:$i;
			foreach($info['dir'] as $val){
				$p=$path."/".$val;
				require 'views/table.dir.php';
				$i++;
			}
		}

		?>

		</table>
	</form>

</body>
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</html>