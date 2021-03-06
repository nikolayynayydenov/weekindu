$(document).ready(function (){
    
    $(".button-collapse").sideNav();
    $('.dropify').dropify({
        messages: {
            'default': 'Choose an avatar by drag and drop or click'
        }
    });
    
    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrain_width: false, // Does not change width of dropdown to that of the activator
            hover: false, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: false, // Displays dropdown below the button
            alignment: 'left' // Displays dropdown with edge aligned to the left of button
        }
    );
    
    $('.tooltipped').tooltip({delay: 50});
    
    $('.modal-trigger').leanModal({
        dismissible: true
    });
    
    $('.mobile-submit-button').on('click', function () {
        /*
         * mobile-submit-button is a circular button that can't otherwise
         * be submitted. So it has to be submitted using Javascript
         */
               
        $(this).closest('form').submit();
    });
    
    /*
     * Init datepicker (located on /event/{event_id}/edit)
     */

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 30 // Creates a dropdown of 15 years to control year
    });

    $('select').material_select();

    $('.timepicker').wickedpicker();
});