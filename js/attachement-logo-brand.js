jQuery(document).ready( function() {
    var slz_media_upload;

    jQuery('#change-attachment').click(function(e) {
        e.preventDefault();

        // If the uploader object has already been created, reopen the dialog
        if( slz_media_upload ) {
            slz_media_upload.open();
            return;
        }

        // Extend the wp.media object
        slz_media_upload = wp.media.frames.file_frame = wp.media({
            title: 'Choose a file',
            button: { text: 'Choose a file' },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        slz_media_upload.on( 'select', function() {
            attachment = slz_media_upload.state().get( 'selection' ).first().toJSON();
            jQuery('#attachment').val( attachment.id );
            jQuery('#thumbnail').empty();
            jQuery('#thumbnail-image').empty();
            jQuery('#attachment-title-logo').empty();
            jQuery('#attachment-title-logo').append(attachment.name);
            jQuery('#thumbnail').append( "<iframe src='"+ attachment.url + "' style='width:100%; height:500px' frameborder='0'><\/iframe>" );
            jQuery('#thumbnail-image').append( "<img src='"+ attachment.url + "' style='width:100%; height:auto'>" );
        });

        //Open the uploader dialog
        slz_media_upload.open();
    });

    jQuery('#remove-attachment').click(function(e) {
        jQuery('#attachment').val('');
        jQuery('#attachment-title-logo').empty();
        jQuery('#thumbnail').empty();
        jQuery('#thumbnail-image').empty();
    });
});
