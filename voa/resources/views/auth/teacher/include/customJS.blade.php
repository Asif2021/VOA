<script>
    $(document).ready(function () {
        /*===========================================##################========================================================*/
        /*=================================== Start Alert Notification | Khuram ================================================*/
        /*===========================================##################========================================================*/
        @if (session()->get('flash_success'))
        $.toast({
            text: "{!! is_array(json_decode(session()->get('flash_success'), true)) ?
                     implode('', session()->get('flash_success')->all(':message')) : session()->get('flash_success') !!}",
            position: 'top-right',
            showHideTransition: 'slide',
            hideAfter: 5000,
            icon: 'success',
            stack: false
        });
        @elseif (session()->get('flash_info'))
        $.toast({
            text: "{!! is_array(json_decode(session()->get('flash_info'), true)) ?
                         implode('', session()->get('flash_info')->all(':message')) : session()->get('flash_info') !!}",
            position: 'top-right',
            showHideTransition: 'slide',
            hideAfter: 5000,
            icon: 'info',
            stack: false
        });
        @elseif (session()->get('flash_error'))
        $.toast({
            text: "{!! is_array(json_decode(session()->get('flash_error'), true)) ?
                         implode('', session()->get('flash_error')->all(':message')) : session()->get('flash_error') !!}",
            position: 'top-right',
            showHideTransition: 'slide',
            hideAfter: 5000,
            icon: 'error',
            stack: false
        });
        @elseif (session()->get('flash_warning'))
        $.toast({
            text: "{!! is_array(json_decode(session()->get('flash_warning'), true)) ?
                         implode('', session()->get('flash_warning')->all(':message')) : session()->get('flash_warning') !!}",
            position: 'top-right',
            showHideTransition: 'slide',
            hideAfter: 5000,
            icon: 'warning',
            stack: false
        });
        @endif
        /*===========================================##################========================================================*/
        /*=================================== End Alert Notification | Khuram ================================================*/
        /*===========================================##################========================================================*/
    });
</script>