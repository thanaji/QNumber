$(document).ready(function () {
    $('.cancel-doc').click(function () {
        
        confirm("คุณต้องการที่จะยกเลิกข้อมูลนี้หรือไม่?");

        // get data form view btn
        var date = $(this).attr('data-date');
        var num = $(this).attr('data-num');
        var resvname = $(this).attr('data-resvname');
        var sentname = $(this).attr('data-sentname');
        var text = $(this).attr('data-text');
        //var status = $(this).attr('data-status');

        // $(".cancel-doc").css("display", "none");
        // $(".edit-doc").css("display", "none");

        // เอาไปโชว์ใน class นี่ id นี้ v
        document.getElementById('date-doc-can').innerHTML = '<del>' + date + '</del>';
        document.getElementById('num-doc-can').innerHTML = '<del>' + num + '</del>';
        document.getElementById('resvname-doc-can').innerHTML = '<del>' + resvname + '</del>';
        document.getElementById('sentname-doc-can').innerHTML = '<del>' + sentname + '</del>';
        document.getElementById('text-doc-can').innerHTML = '<del>' + text + '</del>';
        //document.getElementById('status-doc-can').innerHTML = '<del>' + status + '</del>';





    });
});