function get_workflow_processor(){
  //$('.table-service-check-all').hide();
}

function select_workflow(){

  var value = $(this).val(); //harus id row yang akan di approve
  //var ck = document.getElementById(this.id).checked;
  $('#idrow').val(value);

  //get_action_workflow(ck);
  //disable or enable other checkbox
  /*
  var x = document.getElementsByName(this.name);
  var i;
  for (i = 0; i < x.length; i++) {
    if (x[i].type == "checkbox") {
      x[i].disabled = ck;
    }
  }
  document.getElementById(this.id).disabled = false;
  */

  //console.log(value);

  //$('.table').closest('tr').addClass('active');

  ck = true;
  get_action_workflow(ck);
}

function get_action_workflow(ck){

  var baseURL = $('body').data('baseurl')
  var menu = $('#actionworkflow').data('menu');
  var submenu = $('#actionworkflow').data('submenu');
  var module = $('#actionworkflow').data('module');
  var controller = module.capitalize() + "_controller";
  //module id for action workflow
  var module_id = $('#page').data('module_id');
  var url = baseURL + menu + '/' + submenu + '/' + controller + '/get_button_workflow';
  var row_id = $('#idrow').val();

  if (ck){

    $.ajax(
  	{
  		type: 'POST',
  		data: { 'module_id':module_id, 'row_id':row_id },
  		cache: false,
  		url: url,
  		success: function(response)
  		{
        $('#workflowbutton').html(response);

        $.ajax({
          type:'POST', data :{ 'module_id':module_id, 'row_id':row_id }, chace: false,
          url : baseURL + menu + '/' + submenu + '/' + controller + '/get_last_actiontaken',
          success: function(msg)
      		{
            $('#lastactiontaken').html(msg);
          }
        });
  		}
  	})

  }else{
    $('#workflowbutton').html("");
    $('#lastactiontaken').html("");
  }
}

function action_workflow(action,id_row,button='',submitby = '0'){

  var baseURL = $('body').data('baseurl')
  var menu = $('#actionworkflow').data('menu');
  var submenu = $('#actionworkflow').data('submenu');
  var module = $('#actionworkflow').data('module');
  var controller = module.capitalize() + "_controller";
  //module id for action workflow
  var module_id = $('#page').data('module_id');
  var url = baseURL + menu + '/' + submenu + '/' + controller + '/action_workflow';
  var row_id = $('#idrow').val();

  if (action == 'view'){

    view_history();

  }else{
    $.ajax(
    {
      type: 'POST',
      data: { 'module_id':module_id, 'row_id':id_row, 'action_id': action, 'buttonid':button, 'submitid':submitby },
      cache: false,
      url: url,
      success: function(result)
      {
        //$('#workflowbutton').html(response);
        var msg = $.trim(result);
        if (msg == 'OK') {
            //return false;
            location.reload();
            //console.log(msg);
        }else{
          alert(msg);
        }
      }
    })
  }
} //end function

function view_history(){
  Metro.dialog.create({
           title: "Workflow Hostory",
           content: "<div></div>",
           actions: [
               {
                   caption: "Close",
                   cls: "js-dialog-close",

               }
           ]
       });

}
