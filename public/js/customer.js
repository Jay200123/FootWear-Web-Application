$(document).ready(function () {
    $("#ctable").DataTable({
        ajax: {
            url: "/api/customer/all",
            dataSrc: "",
        },
        dom: '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
        buttons: [
            {
                extend: "pdf",
                className: "btn btn-success glyphicon glyphicon-file",
            },
            {
                extend: "excel",
                className: "btn btn-success glyphicon glyphicon-list-alt",
            },
             {
                text: "Add Customer",
                className: "btn btn-success",
                action: function (e, dt, node, config) {
                    $("#cform").trigger("reset");
                    $("#customerModal").modal("show");
                },
            },
        
        ],
        columns: [
            {
                data: "id",
            },
            {
                data: "fname",
            },
            {
                data: "lname",
            },

            {
                data: "address",
            },
            {
                data: "town",
            },
            {
                data: "city",
            },
             {
                data: "phone",
            },
            {
                data: null,
                render: function (data, type, JsonResultRow, row) {
                    return `<img src= ${data.customer_image} "height="100px" width="100px">`;
                },
            },
              {
                data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='editBtn' id='editbtn' data-id=" +
                        data.id +
                        "><i class='fa-solid fa-pen' aria-hidden='true' style='font-size:24px' ></i></a><a href='#' class='deletebtn' data-id=" + data.id + "><i class='fa-solid fa-trash-can' style='font-size:24px; color:red; margin-left:15px;'></a></i>";
                },
            },
        ],
    });

     $("#customerSubmit").on("click", function (e) {
        e.preventDefault();
        var data = $("#cform")[0];
        console.log(data);
        let formData = new FormData(data);
        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + "," + pair[1]);
        }

        $.ajax({
            type: "POST",
            url: "/api/customer/store",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#customerModal").modal("hide");
                var $ctable = $("#ctable").DataTable();
                $ctable.row.add(data.customer).draw(false);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });



    });