jQuery(document).ready(function($){
    $('.qa-edit').on('click', function () {
        $(this).hide().parent().find('.qa-delete').hide();
        $(this).parent().find('.qa-update,.qa-cancel').show();
        var col_q = $(this).parent().parent().find('.col_qa_question div');
        var col_a = $(this).parent().parent().find('.col_qa_answer div');
        var val_q = col_q.html();
        var val_a = col_a.html();
        col_q.html("<textarea class='edit-question'>" + val_q + "</textarea>");
        col_a.html("<textarea class='edit-answer'>" + val_a + "</textarea>");

    });
    $('.qa-cancel').on('click', function () {
        $(this).parent().find('.qa-update,.qa-cancel').hide();
        $(this).parent().find('.qa-delete,.qa-edit').show();
        var col_q = $(this).parent().parent().find('.col_qa_question div');
        var col_a = $(this).parent().parent().find('.col_qa_answer div');

        col_q.html($(this).parent().parent().find('.qa_question_value').val());
        col_a.html($(this).parent().parent().find('.qa_answer_value').val());
    });

    $('.qa-update').on('click', function(){
        var id = $(this).parent().parent().find('.col_qa_id').html();
        $.ajax({
            type: "POST",
            url: qa_object.ajax_url,
            data: "action=qa_update&id=" + id + "&q=" + $(this).parent().parent().find('.col_qa_question textarea').val() + "&a=" + $(this).parent().parent().find('.col_qa_answer textarea').val(),
            success: function (result) {
                if (result == ""){
                    location.reload();
                }
            }
        });
    });

    $('.qa-delete').on('click', function(){
        if (confirm(qa_object.delete_confirm_msg)){
            var id = $(this).parent().parent().find('.col_qa_id').html();
            $.ajax({
                type: "POST",
                url: qa_object.ajax_url,
                data: "action=qa_delete&id=" + id,
                success: function (result) {
                    if (result == ""){
                        location.reload();
                    }
                }
            });
        }
    });
});