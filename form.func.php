<?php

function showForm($filename)
{
	$content = file_get_contents($filename);
	if (strlen($content)) {
		$newContent=highlight_string($content,true);
		echo <<<EOF
		<table width='100%' bgcolor='pink' cellpadding='5' cellspacing="0" >
			<tr>
				<td>{$newContent}</td>
			</tr>
		</table>
EOF;

	} else {
		alertMes("文件没有内容，請編輯再查看！",null);
	}
}

function editForm($path, $filename)
{
    $content = file_get_contents($filename);
    echo <<<EOF
	<form action='index.php?act=doEdit' method='post'> 
		<textarea name='content' cols='190' rows='10'>{$content}</textarea><br/>
		<input type='hidden' name='filename' value='{$filename}'/>
		<input type="hidden" name="path" value="{$path}" />
		<input type="submit" value="修改文件内容"/>
	</form>
EOF;
}

function renameFileForm($filename)
{
	echo <<<EOF
	<form action="index.php?act=doRename" method="post"> 
	請填寫新文件名:<input type="text" name="newname" placeholder="重命名"/>
	<input type='hidden' name='filename' value='{$filename}' />
	<input type="submit" value="重命名"/>
	</form>
EOF;
}

function renameFolderForm($path, $dirname)
{
	echo <<<EOF
	<form action="index.php?act=doRenameFolder" method="post"> 
	請填寫新文件夾名稱:<input type="text" name="newname" placeholder="重命名"/>
	<input type="hidden" name="path" value="{$path}" />
	<input type='hidden' name='dirname' value='{$dirname}' />
	<input type="submit" value="重命名"/>
	</form>
EOF;
}

function copyFolderForm($path, $dirname)
{
	echo <<<EOF
	<form action="index.php?act=doCopyFolder" method="post"> 
	將文件夾複製到：<input type="text" name="dstname" placeholder="將文件夾複製到"/>
	<input type="hidden" name="path" value="{$path}" />
	<input type='hidden' name='dirname' value='{$dirname}' />
	<input type="submit" value="複製文件夾"/>
	</form>
EOF;
}

function cutFileForm($path, $filename)
{
	echo <<<EOF
	<form action="index.php?act=doCutFile" method="post"> 
	將文件剪切到：<input type="text" name="dstname" placeholder="將文件剪切到"/>
	<input type="hidden" name="path" value="{$path}" />
	<input type='hidden' name='filename' value='{$filename}' />
	<input type="submit" value="剪切文件"/>
	</form>
EOF;
} 

function cutFolderForm($path, $dirname)
{
	echo <<<EOF
	<form action="index.php?act=doCutFolder" method="post"> 
	將文件夾剪切到：<input type="text" name="dstname" placeholder="將文件剪切到"/>
	<input type="hidden" name="path" value="{$path}" />
	<input type='hidden' name='dirname' value='{$dirname}' />
	<input type="submit" value="剪切文件夾"/>
	</form>
EOF;
} 

function copyFileForm($path, $dirname)
{
	echo <<<EOF
		<form action="index.php?act=doCopyFile" method="post"> 
		將文件复制到：<input type="text" name="dstname" placeholder="將文件複製到"/>
		<input type="hidden" name="path" value="{$path}" />
		<input type='hidden' name='filename' value='{$filename}' />
		<input type="submit" value="複製文件"/>
		</form>
EOF;
}

