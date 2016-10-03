<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">您確定要删除嗎?</h4>
      </div>
      <div class="modal-body">
        <p>删除之後無法恢復!</p>
        <input type="hidden" name="bookId" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="del('delFile','<?=$path;?>')">Ok</button>
      </div>
    </div>
  </div>
</div>