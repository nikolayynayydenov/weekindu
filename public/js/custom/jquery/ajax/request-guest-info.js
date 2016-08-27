$(document).ready(function (){
    $('.guest-name-container').on('click', function (event){
        let guestNameContainer = $(this);
        let guestId = guestNameContainer.attr('data-guest-id');
        let eventInvitationCode = guestNameContainer.attr('data-event-invitation-code');
        let url = window.location.protocol + "//" + window.location.host + "/";
        let data = {
            guestId: guestId,
            eventInvitationCode: eventInvitationCode
        };

        $.ajax({
            url: url + 'invitation/get-guest-details',
            method: 'post',
            data: data,
            success: function (data){
                if(guestNameContainer.attr('data-ever-called') != 'true') {
                    let modal = $(' <div id="modal-' + data['_guestId_'] + '" class="modal">' +
                        '<div class="modal-content">' +
                        '<h4>' + data._guestName_ + '</h4>' +
                        '<p>' +
                        '<table>' +
                        '<thead>' +
                        '<th data-field="key">Key</th>' +
                        '<th data-field="value">Value</th>' +
                        '</thead>' +
                        '<tbody>' +
                        '</tbody>' +
                        '</table>' +
                        '</p>' +
                        '</div>' +
                        '<div class="modal-footer">' +
                        '<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" id="modal-closer-' + data['_guestId_'] + '">Close</a>' +
                        '</div>' +
                        '</div>');

                    $.each(data.choices, function(index, value) {
                        modal.find('tbody')
                            .append($('<tr>')
                                .append($('<td>').text(index))
                                .append($('<td>').text(value)));
                    });

                    guestNameContainer
                        .siblings('.modal-container')
                        .html(modal);

                    $('#modal-' + data['_guestId_']).openModal();

                    $('#modal-closer-' + data['_guestId_']).click(function (){
                        $('.lean-overlay').remove();
                    });

                    guestNameContainer.attr('data-ever-called', 'true');
                }
            }
        });
    });
});