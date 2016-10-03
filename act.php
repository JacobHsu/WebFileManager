<?php
require_once 'common.func.php'; 
require_once 'file.func.php';
require_once 'dir.func.php';
require_once 'form.func.php';

$act = $_REQUEST['act'];
$filename = $_REQUEST['filename'];
$dirname = $_REQUEST['dirname'];
$path = $_REQUEST['path'] ? $_REQUEST['path'] : "file";
$info = readDirectory($path);
if( !$info ) {
	echo "<script>alert('No file or directory！');location.href='index.php';</script>";
}


$redirect="index.php?path={$path}";

switch ($act) {
	case '創建文件':
		$mes = createFile("$path/$filename");
		alertMes($mes,$redirect);
		break;
	case '創建文件夾':
		$mes = createFolder("$path/$dirname");
		alertMes($mes,$redirect);
		break;
	case '上傳文件':
		$fileInfo = $_FILES['myFile'];
		$mes = uploadFile($fileInfo,$path);
		alertMes($mes,$redirect);
		break;
	case 'doEdit':
		$content = $_REQUEST['content'];
		$mes = file_put_contents($filename,$content) ? "文件修改成功" : "文件修改失敗";
		alertMes($mes,$redirect);
		break;
	case 'doRename':
		$newname = $_REQUEST['newname'];
		$mes = renameFile($filename,$newname);
		alertMes($mes,$redirect);
		break;
	case 'doCopyFile':
		$dstname = $_REQUEST['dstname'];
		$mes = copyFile($filename,"$path/$dstname");
		alertMes($mes,$redirect);
		break;
	case 'doCutFile':
		$dstname = $_REQUEST['dstname'];
		$mes = cutFile($filename,"$path/$dstname");
		alertMes($mes,$redirect);
		break;
	case 'delFile':
		$mes = delFile($filename);
		alertMes($mes,$redirect);
		break;
	case 'downFile':
		$mes = downFile($filename);
		break;
	case 'doRenameFolder':
		$newname = $_REQUEST['newname'];
		$mes = renameFolder($dirname,"$path/$newname");
		alertMes($mes,$redirect);
		break;
	case 'doCopyFolder':
		$dstname = $_REQUEST['dstname'];
		$mes = copyFolder($dirname,$path."/".$dstname."/".basename($dirname));
		alertMes($mes,$redirect);
		break;
	case 'doCutFolder':
		$dstname = $_REQUEST['dstname'];
		$mes = cutFolder($dirname,$path."/".$dstname);
		alertMes($mes,$redirect);
		break;
	case 'delFolder':
		$mes = delFolder($dirname);
		alertMes($mes,$redirect);
		break;

	default:
		# code...
		break;
}


switch ($act) {
	case 'showContent':
		showForm($filename, $filename);
		break;
	case 'editContent':
		editForm($path, $filename);
		break;
	case 'renameFile':
		renameFileForm($filename);
		break;
	case 'renameFolder':
		renameFolderForm($path, $dirname);
		break;	
	case 'copyFile':
		copyFileForm($path, $filename);
		break;
	case 'copyFolder':
		copyFolderForm($path, $dirname);
		break;	
	case 'cutFile':
		cutFileForm($path, $filename);
		break;	
	case 'cutFolder':
		cutFolderForm($path, $dirname);
		break;	
	
	default:
		# code...
		break;
}