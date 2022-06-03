$(document).ready(function() {
    // ====================================
    // Constant
    // ====================================

    
    // ====================================
    // DOM Events
    // ====================================
    $('#user_employee_toggle').on('change', function(){
        let selected = $(this).val();
        
        if (selected == 'employees') {
            $('#employees').removeClass('hide');
            $('#users').addClass('hide');
        } else {
            $('#employees').addClass('hide');
            $('#users').removeClass('hide');
        }
    });
});