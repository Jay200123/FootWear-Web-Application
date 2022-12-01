$(document).ready(function () {
    $('#stable').DataTable({
        ajax:{
            url:"/api/services/all",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add Service',
                className: 'btn btn-primary',
                action: function(e, dt, node, config){
                    $("#sform").trigger("reset");
                    $('#serviceModal').modal('show');
                }
            }
        ],
        columns: [
        
            {data: 'id'},
            {data: 'description'},
            {   data:null,
                render: function (data, type, row){
                    console.log(data.service_image)
                    return `<img src="storage/${data.service_image}" width="70px" height="80px">`;
                }
            },
            {data: 'cost_price'},
            {data: 'sell_price'},

            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class = 'editBtn' id='editbtn' data-id=" + data.id + "><i class='fa-solid fa-pen-to-square' aria-hidden='true' style='font-size:24px' ></i></a><a href='#' class='deletebtn' data-id=" + data.id + "><i class='fa-sharp fa-solid fa-trash' style='font-size:24px; color:red'></a></i>";
                },
            },
        ],
        
    })

    //post
$("#serviceSubmit").on("click", function (e) {
    e.preventDefault();
    var data = $("#sform")[0];
    console.log(data);

    let formData = new FormData(data);

    console.log(formData);
    for (var pair of formData.entries()){
        console.log(pair[0] + ',' + pair[1]);
    }

    $.ajax({
        type: "POST",
        url: "/api/services/store",
        data:formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType:"json", 

        success:function(data){
               console.log(data);
               $("#serviceModal").modal("hide");

               var $stable = $('#stable').DataTable();
               $stable.row.add(data.service).draw(false); 
        },

        error:function (error){
            console.log(error);
        }
    })
});

//edit
$('#stable tbody').on('click', 'a.editBtn', function(e){

    e.preventDefault();
    $('#serviceModal').modal('show');
    var id = $(this).data('id');

    $.ajax({
        type: "GET",
        url: '/api/services/' + id + '/edit',
        headers: {'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content') },
        dataType:"json",

        success:function(data){
            console.log(data);

            $('#service_id').val(data.id);
            $('#description').val(data.description);
            $('#cost_price').val(data.cost_price);
            $('#sell_price').val(data.sell_price);
            $('#imagePath').val(data.service_image);
        },

        error:function(error){
            console.log(error);
        },
    });
});

//update
$('#serviceUpdate').on('click', function(e){

    e.preventDefault();
    var id = $('#service_id').val();
    var data = $("#sform")[0];

    let formData = new FormData(data);
    console.log(formData);

    for (var pair of formData.entries()){
        console.log(pair[0] + "," + pair[1]);
    }

    var table = $("#stable").DataTable();
    console.log(id);

    $.ajax({

        type: "POST",
        url: "/api/services/" + id,
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content'), },
        dataType: "json",

        success: function(data){
            console.log(data);
            $("#serviceModal").modal("hide");
            table.ajax.reload();

            // $('#productModal').modal("hide");
            // table.row(cRow).data(data).invalidate().draw(false);
            },

            error: function(error){
                alert('Error');
            },
        });

});

//delete
$("#sbody").on("click", ".deletebtn", function (e) {
    var id = $(this).data("id");
    var $tr = $(this).closest("tr");
    // var id = $(e.relatedTarget).attr('id');
    console.log(id);
    e.preventDefault();
    bootbox.confirm({
        message: "Do you want to delete this service",
        buttons: {
            confirm: {
                label: "Yes",
                className: "btn-success",
            },
            cancel: {
                label: "No",
                className: "btn-danger",
            },
        },
        callback: function (result) {
            if (result)
                $.ajax({
                    type: "DELETE",
                    url: "/api/services/" + id,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        
                        $tr.find("td").css('backgroundColor','hsl(0,100%,50%').fadeOut(2000, function () {
                            $tr.remove();
                        });
                        
                        
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
        },
    });
});

});
