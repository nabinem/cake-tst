<?php
$this->append('pluginJs'); 
    echo $this->Html->script(['../vendors/ckeditor/ckeditor.js']);
$this->end();
$this->append('scriptBottom');
?>

<script>
    var Befree = {};
    var fullEditor = [ 
                        {name: 'forms'},
                        {name: 'tools'},
                        {name: 'document', groups: ['mode', 'document', 'doctools']},
                        {name: 'others'},
                        '/',
                        {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
                        {name: 'source', items: ['Source']},
                        {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                        {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                        {name: 'colors', items: ['TextColor', 'BGColor']},
                        {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
                        {name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt']},
                        '/',
                        {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']},
                        {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                        {name: 'insert', items: ['Image', 'HorizontalRule', 'PageBreak', 'Iframe','Table', 'Youtube']},
                    ];
       var basicEditor = [ 
                        {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
                        {name: 'colors', items: ['TextColor', 'BGColor']},
                        {name: 'basicstyles', items: ['Bold', 'Italic','Underline']},
                        {name: 'paragraph', items: ['NumberedList', 'BulletedList', 'Blockquote']},
                        {name: 'styles', items: ['Format','FontSize']},
                        {name: 'insert', items: ['HorizontalRule']},
                    ]
    Befree.webroot = "<?php echo $this->request->webroot; ?>";
    jQuery(document).ready(function() {
       
        /*we have created custom ckeditor_lite and ckeditor_basic for banners backend*/
        /*since two fields cannot use same id ckeditor_lite is for banners_title*/
        if (jQuery('.ckeditor').length > 0) {
            
            jQuery(".ckeditor").each(function(){
                var editorType = jQuery(this).hasClass('full_ckeditor') ? fullEditor : basicEditor;
                var field_name = jQuery(this).attr("id");
                CKEDITOR.replace(field_name,
                {
                    toolbar: 'Befree',
                    toolbar_Befree: editorType
                });
                var height = 500;
                if (editorType == basicEditor){
                    height = 200;
                }
                var ckHeight = $(this).attr('data-ckeditor_height');
                if (typeof ckHeight !== typeof undefined && ckHeight !== false) {
                    var height = ckHeight;
                }
                CKEDITOR.config.height = height;
                CKEDITOR.config.forcePasteAsPlainText = true;
            });          
        }
        
        
    });
    
</script>
<?php $this->end(); ?>