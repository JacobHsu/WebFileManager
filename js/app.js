function show(id){
	$("#"+id).removeClass('hidden');
}

function showDetail(title, filename) {
	$("#showImg").attr("src",filename);
	$("#showDetail").dialog({
      	height:"auto",
        width:"auto",
        position: {my: "center", at: "center",  collision:"fit"},
        modal:false,
        draggable:true,
        resizable:true,
        title:title,
        show:"slide",
        hide:"explode"
	});
}

function goBack(back){
    location.href="index.php?path="+back;
}

// act= delFile delFolder
function confirmDel(act, filename, path){
    $('input[name=bookId]').val(filename);
    $('#myModal').modal();
    // if( window.confirm("您確定要删除嗎?删除之後無法恢復!") ){
    //     //location.href="index.php?act="+act+"&filename="+filename+"&path="+path;
    // }
}
function del(act, path){
    $('#myModal').modal('hide');
    var filename = $('input[name=bookId]').val();
    location.href = "index.php?act="+act+"&filename="+filename+"&path="+path;
}