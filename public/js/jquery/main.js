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
    
    $('select').material_select();
    
    $("#participants").autocomplete({
        source: "/user/get-json",
        minLength: 1,
        select: function (event, ui){
        }        
    }).data('ui-autocomplete')._renderItem = function (ul, item){
        //console.log(item);
        console.log(ul);
        
        return $('<li>').addClass('avatar')
            .append('<img src="/images/user-avatars/' + item.avatar + '" width="40" class="circle">')
            .append('<span class="title"> ' + item.fullName + (item.name ? ' (' + item.name + ')' : '') + '</span>')
            .appendTo(ul);
    };
    
    tinymce.init({ 
        selector: '.textarea-tinymce',
        plugins: 'placeholder'
    });
    
    $('.modal-trigger').leanModal();
});