$(document).on('click', '.update-sales', function () {
   const leadId = $(this).attr('lead-id');
   $.ajax({
       type: 'GET',
       url: '/get-sales/'+leadId,
       success: function (res) {
           $('#modal-assigned .modal-body').html(res);
       }
   })
});

$(document).on('submit', '#modal-assigned form', function(e){
    e.preventDefault();
    let form = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        url: '/leads/assigned',
        processData: false, // with formdata
        contentType: false, // with formdata
        data: form,
        // data: $(this).serialize(),
        success: function (res) {
            if(res.status == 200) {
                getAllLeads();
                alert(res.message);
                $('#modal-assigned').modal('hide')

            }
        }
    });
});





function getAllLeads() {
    $.ajax({
        type: 'GET',
        url: '/leads/ajax/table',
        success: function (res) {
            $('#lead-table-content').html(res);
        }
    });
}

