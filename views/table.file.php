<tr>
	<td><?=$i;?></td>
	<td><?=$val;?></td>
	<td><span class="glyphicon glyphicon-<?=(filetype($p)=="file")?"file":"folder-open";?>"></span></td>
	<td><?=transFileByte(filesize($p));?></td>
	<td><span class="glyphicon glyphicon-<?=is_readable($p)?"ok-circle":"remove-circle";?>"></span></td>
	<td><span class="glyphicon glyphicon-<?=is_writable($p)?"ok-circle":"remove-circle";?>"></span></td>
	<td><span class="glyphicon glyphicon-<?=is_executable($p)?"ok-circle":"remove-circle";?>"></td>
	<td><?=date("Y-m-d H:i:s",filectime($p));?></td>
	<td><?=date("Y-m-d H:i:s",filemtime($p));?></td>
	<td><?=date("Y-m-d H:i:s",fileatime($p));?></td>
	<td>
		<?php if( in_array($ext,$imageExt) ): ?>	
		<a href="#"  onclick="showDetail('<?=$val;?>','<?=$p;?>')"><span class="glyphicon glyphicon-eye-open"></span></a> |
		<?php else:?>
		<a href="index.php?act=showContent&path=<?=$path;?>&filename=<?=$p;?>" ><span class="glyphicon glyphicon-eye-open"></span></a> |
		<?php endif; ?>
		<a href="index.php?act=editContent&path=<?=$path;?>&filename=<?=$p;?>"><span class="glyphicon glyphicon-edit"></span></a> |
		<a href="index.php?act=renameFile&path=<?=$path;?>&filename=<?=$p;?>"><span class="glyphicon glyphicon-text-size" title="重新命名"></span></a> |
		<a href="index.php?act=copyFile&path=<?=$path;?>&filename=<?=$p;?>"><span class="glyphicon glyphicon-copy" title="複製"></span></a> |
		<a href="index.php?act=cutFile&path=<?=$path;?>&filename=<?=$p;?>"><span class="glyphicon glyphicon-scissors"></span></a> |
		<a href="#"  onclick="confirmDel('delFile','<?=$p;?>','<?=$path;?>')"><span class="glyphicon glyphicon-remove"></span></a> |
		<a href="index.php?act=downFile&path=<?=$path;?>&filename=<?=$p;?>"><span class="glyphicon glyphicon-download-alt"></span></a>
	</td>		
</tr>