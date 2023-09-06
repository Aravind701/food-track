$(document).on('change', '.group_list', function () {
    let group = $(this).data('group');
    $('.menu_' + group).prop('checked', this.checked);
    if($('.menu_' + group + ':checked').length > 0){
        $('#'+$(this).attr('id')).prop('checked', this.checked);
    }
});

$(document).on('change', '.menu_list', function () {
    let group_name = $(this).data('group');
    $('.menu_' + group_name).length == $('.menu_' + group_name + ':checked').length ? $('#' + group_name).prop('checked', 'checked') : $('#' + group_name).prop('checked', '');

    if($('.menu_' + group_name + ':checked').length > 0){
        $('#'+$(this).attr('id')).prop('checked', this.checked);
    }
});
