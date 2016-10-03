<tr>
	<td><?=$i;?></td>
	<td><?=$val;?></td>
	<td><span class="glyphicon glyphicon-<?= (filetype($p)=="file")?"file":"folder-open"; ?>"></span></td>
	<td><?php $sum=0; echo transFileByte(dirSize($p));?></td>
	<td><span class="glyphicon glyphicon-<?=is_readable($p)?"ok-circle":"remove-circle";?>"></span></td>
	<td><span class="glyphicon glyphicon-<?=is_writable($p)?"ok-circle":"remove-circle";?>"></span></td>
	<td><span class="glyphicon glyphicon-<?=is_executable($p)?"ok-circle":"remove-circle";?>"></span></td>
	<td><?=date("Y-m-d H:i:s",filectime($p));?></td>
	<td><?=date("Y-m-d H:i:s",filemtime($p));?></td>
	<td><?=date("Y-m-d H:i:s",fileatime($p));?></td>
	<td>
		<a href="index.php?path=<?=$p;?>" ><span class="glyphicon glyphicon-eye-open"></span></a> |
		<a href="index.php?act=renameFolder&path=<?=$path;?>&dirname=<?=$p;?>"><span class="glyphicon glyphicon-text-size" title="重新命名"></span></a> |
		<a href="index.php?act=copyFolder&path=<?=$path;?>&dirname=<?=$p;?>"><span class="glyphicon glyphicon-copy" title="複製"></span></a> |
		<a href="index.php?act=cutFolder&path=<?=$path;?>&dirname=<?=$p;?>"><span class="glyphicon glyphicon-scissors"></span></a> |
		<a href="#"  onclick="confirmDel('delFolder','<?=$p;?>','<?=$path;?>')"><span class="glyphicon glyphicon-remove" title="刪除"></span></a> |
	</td>		
</tr>