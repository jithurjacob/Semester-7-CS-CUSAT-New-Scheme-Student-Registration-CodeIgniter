
<script src="<?php echo base_url();?>js/search/jquery.dataTables.min.js"></script>


<style type="text/css">
.noUi-handle {
    border: 1px solid #B4B4B4;
    border-radius: 50%;
    cursor: pointer;
}
.noUi-horizontal .noUi-handle {
    width: 24px;
    height: 24px;
    left: -17px;
    top: -4px;
}
.noUi-handle:after,
.noUi-handle:before {
    background: none;
}
.dataTables_length label,
.dataTables_filter label {
    display: -webkit-box;
    margin-right: 10px;
    font: 14px/18px'Open Sans', sans-serif;
    font-weight: bold;
    color: black;
}
.dataTables_filter input {
    width: 80%;
}
.dataTables_length select {
    width: 50%;
    margin-right: 10px;
    margin-left: 10px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    border-radius: 50%;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover{
    /*border-radius: 50%;*/
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover{
background-color: transparent;
background:transparent;
color: #000 !important;
border: 1px solid transparent;
}
</style>


<script type="text/javascript">
$.extend($.fn.dataTable.defaults, {
    "order": [
        [1, "asc"]
    ]//,
        
    //       columnDefs: [ {
    //         targets: [ 0 ],
    //         orderData: [ 0, 1,2,3,4,5,6 ],
    //         "searchable": false
    //     } ,
    //     {
    //         targets: [ 1 ],
    //         orderData: [  1 ]
    //     },
    //     {
    //         targets: [ 2 ],
    //         orderData: [ 2 ]
    //     },
    //     {
    //         targets: [ 3 ],
    //         orderData: [3 ]
    //      },
    //     {
    //         targets: [ 4 ],
    //         orderData: [ 4]
    //      },
    //     {
    //         targets: [ 5 ],
    //         orderData: [5 ]
    //      },
    //     {
    //         targets: [ 6 ],
    //         orderData: [ 6]
    //      },
    //     {
    //         targets: [ 7 ],
    //         orderData: [7 ]
    //      },
    //     {
    //         targets: [ 8 ],
    //         orderData: [ 8]
    //      },
    //     {
    //         targets: [ 9 ],
    //         orderData: [9 ]
    //      },
    //     {
    //         targets: [ 10 ],
    //         orderData: [ 10]
    //      },
    //     {
    //         targets: [ 11 ],
    //         orderData: [11 ]
    //      },
    //     {
    //         targets: [ 12 ],
    //         orderData: [ 12]
    //      },
    //     {
    //         targets: [ 13 ],
    //         orderData: [ 13]
    //      }//,
    //     // {
    //     //     targets: [ 5 ],
    //     //     orderData: [ 5]
    //     // }
    //     ]





});
</script>
