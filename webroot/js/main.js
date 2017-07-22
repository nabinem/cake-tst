// device detection
var isMobile = false;
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
        
jQuery(document).ready(function($){
     //custom checkboxes & radios using jQuery Uniform plugin   
    if ($('.uniform_input').length){
        if (!$().uniform) {
            return;
        }
        $('.uniform_input').uniform();
    }
    
    $.validator.setDefaults({
        highlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').addClass("has-error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass("has-error");
        },
        errorClass: "help-block error-message",
        errorElement: "span"
    });
    
    $.validator.addMethod("notValueSame", function(value, element, secondElemId) {
        return this.optional(element) ||  $(element).val() != $('#'+secondElemId).val();
    }, "Please specify a different values or provide either of one.");
    
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size exceeds maximum allowed limit.');
    
    //initialize datetime picker only date with class
    if ($('.datetimepicker_date').length){
        if (!$().datetimepicker) {
            return;
        }
        $('.datetimepicker_date').datetimepicker({format: 'MM/DD/YYYY'});
    }
    
    //initialize datetime picker only time with class
    if ($('.datetimepicker_time').length){
        if (!$().datetimepicker) {
            return;
        }
        $('.datetimepicker_time').datetimepicker({format: 'LT', defaultDate: new Date()});
    }
    //initialize datetime picker with class
    if ($('.datetimepicker_datetime').length){
        if (!$().datetimepicker) {
            return;
        }
        $('.datetimepicker_datetime').datetimepicker({format: 'MM/DD/YYYY h:mm a'});
    }
    
    //Sticky table header
    if ($('table.sticky_thead').length){
        if (!$().floatThead) {
            return;
        }
        var $stickyTbl = $('.table.sticky_thead');
        $stickyTbl.floatThead({
            responsiveContainer: function($stickyTbl){
                return $stickyTbl.closest('.table-responsive');
            }, autoReflow: true
        });
        
        $MENU_TOGGLE.on('click', function() {
            $stickyTbl.trigger('reflow');
        });
        $('#horiz_topmenu').on('hidden.bs.collapse shown.bs.collapse', function () {
            $stickyTbl.trigger('reflow'); 
        });
    }
    //Portlet collapse link
    $('body').on('click', '.collapse-portlet', function() {
        var $portlet = $(this).closest('.portlet');
        var $icon = $portlet.find('.collapse-arrow-icon');
        var $portBody = $portlet.find('.portlet-body');
        // fix for some div with hardcoded fix class
        if ($portlet.attr('style')) {
            $portBody.slideToggle(200, function(){ $portlet.removeAttr('style'); });
        } else {
            $portBody.slideToggle(200); 
            $portlet.css('height', 'auto');  
        }
        $icon.toggleClass('fa-chevron-up fa-chevron-down');
    });
    //Initialize Bootsrap switch plugin
    if ($('.bootstrap_switch').length){
        if (!$().bootstrapSwitch) {
            return;
        }
        $('.bootstrap_switch').bootstrapSwitch({onText: 'Yes', offText: 'No', size: 'small', onColor: 'success', size: 'mini'});
    }
    if ($('.link_loadwait_showtext').length){
        $('.link_loadwait_showtext').click(function(){
            $(this).button('loading');
        });
    }
    //Fade away flash
    if ($('.flash_fade').length){
        ($('.flash_fade').fadeOut(5000, function(){$(this).remove();}));
    }
    
});