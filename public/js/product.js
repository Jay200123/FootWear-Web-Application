$(document).ready(function () {
    $('#ptable').DataTable({
        ajax:{
            url:"/api/products/all",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add Product',
                className: 'btn btn-primary',
                action: function(e, dt, node, config){
                    $("#pform").trigger("reset");
                    $('#productModal').modal('show');
                }
            }
        ],
        columns: [
        
            {data: 'id'},
            {data: 'brand'},
            {   data:null,
                render: function (data, type, row){
                    console.log(data.product_image)
                    return '<img src="public/images/${data.product_image}" width="50" height="60">';
                }
            },
            {data: 'description'},
            {data: 'cost_price'},
            {data: 'sell_price'},

            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class = 'editBtn' id='editbtn' data-id=" + data.id + "><i class='fa-solid fa-pen-to-square' aria-hidden='true' style='font-size:24px' ></i></a><a href='#' class='deletebtn' data-id=" + data.id + "><i class='fa-sharp fa-solid fa-trash' style='font-size:24px; color:red'></a></i>";
                },
            },
        ],
        
    })
    
    $("#productSubmit").on("click", function (e) {
        e.preventDefault();
        var data = $("#pform")[0];
        console.log(data);
    
        let formData = new FormData(data);
    
        console.log(formData);
        for (var pair of formData.entries()){
            console.log(pair[0] + ',' + pair[1]);
        }
    
        $.ajax({
            type: "POST",
            url: "/api/products/store",
            data:formData,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType:"json", 
    
            success:function(data){
                   console.log(data);
                   $("#productModal").modal("hide");
    
                   var $ptable = $('#ptable').DataTable();
                   $ptable.row.add(data.product).draw(false); 
            },
    
            error:function (error){
                console.log(error);
            }
        })
    });

    // $('#itable tbody').on('click', 'a.editBtn', function(e){

    //     e.preventDefault();
    //     var id = $(this).data('id');
    //     $('#itemModal').modal('show');
    //     // $('#editItemModal').modal('show');

    //     $.ajax({

    //         type: "GET",
    //         url: '/api/items/' + id + '/edit',
    //         headers: {'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content') },
    //         dataType:"json",

    //         success:function(data){
    //             console.log(data);

    //             $('#itemId').val(data.item_id);
    //             $('#title').val(data.title);
    //             $('#description').val(data.description);
    //             $('#cost_price').val(data.cost_price);
    //             $('#sell_price').val(data.sell_price);
    //             $('#imagePath').val(data.imagePath);
    //         },

    //         error:function(error){
    //             console.log(error);
    //         },
    //     });
    // });


    // $('#productUpdate').on('click', function(e){

    //     e.preventDefault();
    //     var id = $('#itemId').val();
    //     console.log(id);
        
    //     var table = $('#ptable').DataTable();
    //     var cRow = $("tr td:eq("+ id + ")").closest('tr');
    //     var data = $("#pform").serialize();

    //     $.ajax({

    //         type: "PUT",
    //         url: '/api/items/${id}',
    //         data:data,
    //         headers: {'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content')},
    //         dataType: "json",

    //         success: function(data){
    //             console.log(data);

    //             $('#itemModal').modal("hide");
    //             table.row(cRow).data(data).invalidate().draw(false);
    //             },

    //             error: function(error){
    //                 alert('error');
    //             }
    //         });

    // });

    // $("#ibody").on("click", ".deletebtn", function (e) {
    //     var id = $(this).data("id");
    //     var $tr = $(this).closest("tr");
    //     // var id = $(e.relatedTarget).attr('id');
    //     console.log(id);
    //     e.preventDefault();
    //     bootbox.confirm({
    //         message: "Do you want to delete this item",
    //         buttons: {
    //             confirm: {
    //                 label: "Yes",
    //                 className: "btn-success",
    //             },
    //             cancel: {
    //                 label: "No",
    //                 className: "btn-danger",
    //             },
    //         },
    //         callback: function (result) {
    //             if (result)
    //                 $.ajax({
    //                     type: "DELETE",
    //                     url: "/api/item/" + id,
    //                     headers: {
    //                         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                             "content"
    //                         ),
    //                     },
    //                     dataType: "json",
    //                     success: function (data) {
    //                         console.log(data);
                            
    //                         $tr.find("td").css('backgroundColor','hsl(0,100%,50%').fadeOut(2000, function () {
    //                             $tr.remove();
    //                         });
                            
                            
    //                     },
    //                     error: function (error) {
    //                         console.log(error);
    //                     },
    //                 });
    //         },
    //     });
    // });

});


