$(document).ready(function(){

    // functions that generate the html for the slider

    function addRow(recieverElementId, cols, multiple, rowIsLast) {
        // the main purpose of this function is to simplify the
        // creation of the ui, needed for creating a new event

        // on each row you can add one, two or three cols

        // define which grid classes to use(depending on the number of cols)
        let colClass = '';

        switch(cols.length) {
            case 1:
                colClass = 'col offset-l4 offset-s4 offset-m4 s4 m4 l4';
                break;

            case 2:
                colClass = 'col offset-l2 offset-s2 offset-m2 s4 m4 l4';
                break;

            case 3:
                colClass = 'col l4 m4 s12';
                break;

            default:
                alert('You must use 1, 2 or 3 cols for each row!');
                break;
        }

        let row = $('<div>').addClass('row');

        if (multiple === 'multiple') {
            // if the multiple parameter is set to "multiple"
            // add data-multiple="true" to the row

            row.attr('data-multiple', 'true');
        }

        $.each(cols, function (index, value){
            row.append('<div class="' + colClass + '">' +
                '<div class="card small hoverable create-event-option">' +
                '<div class="card-image">' +
                '<img class="responsive-img" src="/images/' + value.imgLocation + '">' +
                '</div>' +
                '<div class="card-content center">' +
                '<p>' +
                '<div class="inner-title">' +
                '<strong class="blue-text">' + value.cardTitle + '</strong>' +
                '</div>' +
                '<div class="divider"></div>' +
                '<div class="inner-content">' + value.cardContent + '</div>' +
                '</p>' +
                '</div>' +
                '</div>' +
                '</div>');
        });

        if (rowIsLast === 'last') {
            if (multiple === 'multiple') {
                var multipleAttr = 'data-multiple="true"';
            } else {
                var multipleAttr = '';
            }

            let newValueFieldHtml = $('<div class="add-new-values blue-text">' +
                '<div class="center flow-text">You can also enter yourself:</div>' +
                '<div class="new-values"></div>' +
                '<input placeholder="New value" type="text" ' + multipleAttr + ' class="validate new-value-field blue-text">' +
                '</div>');

            $('#' + recieverElementId).children('.rows')
                .append(row)
                .append(newValueFieldHtml);
        } else {
            $('#' + recieverElementId).children('.rows')
                .append(row);
        }
    }

    addRow('type', [
        {
            'cardTitle': 'Wedding',
            'cardContent': 'Make your wedding unforgettable with us',
            'imgLocation': 'create-event/type/wedding.jpg'
        },
        {
            'cardTitle': 'Bachelor Party',
            'cardContent': 'Make your last party without your wife unforgettable',
            'imgLocation': 'create-event/type/bachelor-party.jpg'
        },
        {
            'cardTitle': 'Birthday Party',
            'cardContent': 'Lets make that birthday party the best',
            'imgLocation': 'create-event/type/birthday-party.jpg'
        }
    ]);

    addRow('type', [
        {
            'cardTitle': 'Business Meeting',
            'cardContent': '',
            'imgLocation': 'create-event/type/buisiness-meeting.jpg'
        },
        {
            'cardTitle': 'Camp',
            'cardContent': '',
            'imgLocation': 'create-event/type/camp.jpg'
        },
        {
            'cardTitle': 'Conference',
            'cardContent': '',
            'imgLocation': 'create-event/type/conference.jpg'
        }
    ],false, 'last');

    addRow('dress-code', [
        {
            'cardTitle': 'Street Wear',
            'cardContent': '',
            'imgLocation': 'create-event/dress-code/streetwear.jpg'
        },
        {
            'cardTitle': 'Casual',
            'cardContent': '',
            'imgLocation': 'create-event/dress-code/casual.jpg'
        },
        {
            'cardTitle': 'Business Casual',
            'cardContent': '',
            'imgLocation': 'create-event/dress-code/buisinesscasual.jpg'
        }
    ]);

    addRow('dress-code', [
        {
            'cardTitle': 'Smart Casual',
            'cardContent': '',
            'imgLocation': 'create-event/dress-code/smartcasual.jpg'
        },
        {
            'cardTitle': 'Formal',
            'cardContent': '',
            'imgLocation': 'create-event/dress-code/formal.jpg'
        },
        {
            'cardTitle': 'Other',
            'cardContent': '',
            'imgLocation': 'create-event/dress-code/other.png'
        }
    ], false, 'last');

    addRow('music', [
        {
            'cardTitle': 'Pop',
            'cardContent': '',
            'imgLocation': 'create-event/music/pop.jpg'
        },
        {
            'cardTitle': 'Electronic',
            'cardContent': '',
            'imgLocation': 'create-event/music/electronic.jpg'
        },
        {
            'cardTitle': 'Rock / Metal',
            'cardContent': '',
            'imgLocation': 'create-event/music/rock.jpg'
        }
    ], 'multiple');

    addRow('music', [
        {
            'cardTitle': 'Pop-Folk',
            'cardContent': '',
            'imgLocation': 'create-event/music/pop-folk.jpg'
        },
        {
            'cardTitle': 'Hip-Hop',
            'cardContent': '',
            'imgLocation': 'create-event/music/hiphop.png'
        },
        {
            'cardTitle': 'Srabsko',
            'cardContent': '',
            'imgLocation': 'create-event/music/royal.jpg'
        }
    ], 'multiple', 'last');

    addRow('drinks', [
        {
            'cardTitle': 'Water',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/water.jpg'
        },
        {
            'cardTitle': 'Coke',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/coke.jpg'
        },
        {
            'cardTitle': 'Coffee',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/coffee.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': 'Rakia',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/rakia.png'
        },
        {
            'cardTitle': 'Juice',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/juice.jpg'
        },
        {
            'cardTitle': 'Beer',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/beer.jpg'
        }
    ], 'multiple', 'last');

    addRow('food', [
        {
            'cardTitle': 'Chicken',
            'cardContent': '',
            'imgLocation': 'create-event/food/chicken.jpg'
        },
        {
            'cardTitle': 'Salad',
            'cardContent': '',
            'imgLocation': 'create-event/food/salad.jpg'
        },
        {
            'cardTitle': 'Fries',
            'cardContent': '',
            'imgLocation': 'create-event/food/fries.jpg'
        }
    ], 'multiple');

    addRow('food', [
        {
            'cardTitle': 'Sandwich',
            'cardContent': '',
            'imgLocation': 'create-event/food/sandwich.jpg'
        },
        {
            'cardTitle': 'Potatoes',
            'cardContent': '',
            'imgLocation': 'create-event/food/potatoes.jpg'
        },
        {
            'cardTitle': 'Rice',
            'cardContent': '',
            'imgLocation': 'create-event/food/rice.jpg'
        }
    ], 'multiple', 'last');

    let navigationDisabled = false; // this is set to true during the animations

    // extract the ids of the sections

    let slidesArr = [];
    let sliderContainer = $('#slider-container');
    sliderContainer.find('> div').each(function () {
        slidesArr.push(this.id);
    });

    if(currentItemIndex === undefined) {
        // set initial value to the index
        var currentItemIndex = 0;
    }
    showSliderItem(); // initial display of the slider item

    // event listeners for prev and next buttons:

    $('#slider-next-btn').on('click', function (event){
        currentItemIndex += 1;
        if (!navigationDisabled) {
            showSliderItem();
        }
    });

    $('#slider-prev-btn').on('click', function (event){
        currentItemIndex -= 1;
        if (!navigationDisabled) {
            showSliderItem();
        }
    });

    // event listener for clicking a link from the side menu:

    $('.slider-link-item').on('click', function (event){

        let itemId = $(this).attr('id').replace('slider-link-', '').toLowerCase();
        if (!navigationDisabled) {
            showSliderItem(itemId);
        }
    });

    // event listener for clicking on an option:

    $('.create-event-option').on('click', function (){
        let card = $(this);
        let field = card.closest('.slider-item').attr('id');
        let cardImageText = $.trim(card.find('.inner-title').text());       

        let value = cardImageText != '' ? cardImageText :
            $.trim(card.find('.card-content').text());
        let isMultiple = Boolean(card.closest('.row').attr('data-multiple'));

        if(value === undefined || field === undefined) {
            alert('data-value or slider-item\'s id attribute is undefined');
        } else {
            // put value in a hidden field in the form that is going to be
            // sent to the server upon clicking the submit button:

            if (!isMultiple) {
                card.closest('.slider-item')
                    .find('.card-active')
                    .removeClass('card-active'); // remove the highlight from all cards that are not multiple

                card.addClass('card-active'); // now only the selected option will be highlighted

                // check if value already exists in form:
                if ($('#create-event-form').children('input[name=' + field + ']').length != 0) {
                    // if the value to this field is already set
                    $('#create-event-form')
                        .children('input[name=' + field + ']')
                        .attr('value', value);
                } else {
                    // if the value to this field is still not set
                    let newInputField = $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', field)
                        .attr('value', value);
                    $('#create-event-form').append(newInputField);
                }

                // slide to the next parameter:
                currentItemIndex += 1;
                showSliderItem();
            } else {
                // if the row IS multiple:

                // toggle highlighting of the clicked card:
                if (card.hasClass('card-active')) {
                    // if the card has been ptrviously selected
                    $('#create-event-form')
                        .find('input[name=\'' + field + '[]\'][value=\'' + value + '\']')
                        .remove();

                    card.removeClass('card-active');
                } else {
                    // if the card has not been previously selected
                    $('#create-event-form').append($('<input>')
                        .attr('type', 'hidden')
                        .attr('name', field + '[]')
                        .attr('value', value));

                    card.addClass('card-active');
                }
            }
        }
    });

    // event listener for clicking enter in input field for making new parameter:

    $('#extra-params-field').keyup(function (event){
        if (event.keyCode === 13) {
            let param = $(this).val().trim();

            if (param.length !== 0) {
                // if the the input field is not empty

                let paramNameSpan = $('<span>')
                    .attr('class', 'param-name')
                    .append($('<strong>')
                        .text(param + ': '));

                let paramValuesSpan = $('<span>')
                    .attr('class', 'param-values');

                let paramNewValueField = $('<input>')
                    .attr('type', 'text')
                    .attr('placeholder', 'e.g. Yes')
                    .attr('class', 'param-new-value-field');

                $('#extra-params-container').append($('<li>')
                    .attr('class', 'collection-item')
                    .append(paramNameSpan)
                    .append(paramValuesSpan)
                    .append(paramNewValueField));

                // clear the input field for new param:

                $('#extra-params-field').val('');

                // put the focus on the newly created paramNewValueField
                // and add an event listener for clicking enter in a
                // param-new-value-field field:

                $('.param-new-value-field')
                    .last()
                    .focus()
                    .keyup(function (event){
                        if (event.keyCode === 13) {

                            // if enter is pressed:

                            let value = $(this).val().trim();
                            if (value.length !== 0) {

                                // append a chip with the new value

                                $(this)
                                    .siblings('.param-values')
                                    .append($('<div>')
                                        .addClass('chip')
                                        .text(value));

                                // clear the field:

                                $(this).val('');
                            }

                            // put the value if the form as a hidden field:

                            if ($('#create-event-form > input[name=\'extras\']').length === 0) {
                                // such input field doesn't exists so let's create it

                                $('#create-event-form').append($('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', 'extras')
                                    .attr('value', JSON.stringify({})));
                            }

                            let extrasField = $('#create-event-form > input[name=\'extras\']');
                            let extrasObj = JSON.parse(extrasField.val());
                            if (extrasObj[param] === undefined) {
                                extrasObj[param] = new Array();
                            }

                            extrasObj[param].push(value);
                            extrasField.val(JSON.stringify(extrasObj));
                        }
                    });
            }
        }
    });

    let modal = {
        'basics': 'Provide us with basic information about your event. In the description field you can type anything you think is important.',
        'type': 'Please choose one type. Or type a custom one at the bottom of the page',
        'dress-code': 'Please choose one or two as it is important for every guest to be aware of the dress code.',
        'food': 'Please choose food that you can provide. If you want to add a dish custom dish, add it at the bottom of the page',
        'drinks': 'Please choose drinks that you can provide. If you want to add a dish custom dish, add it at the bottom of the page',
        'music': 'Here you can choose music that you can offer or that you prefer. Your guests will later select what they want to listen among what you choose where (you can choose more than one)',
        'location': 'You can either enter a location\'s address or point it\s location on the map',
        'extras': 'If you want to ask your guests something additional: this is the place. Type your question and the provide sample answers, your guests can choose among'};

    // event listener for adding a new value to a parameter:

    $('.new-value-field').keyup(function (event){
        if (event.keyCode === 13) {
            // if enter is pressed:
            let inputField = $(this);
            let newValue = $.trim(inputField.val());
            let itemId = inputField.closest('.slider-item').attr('id');

            if (newValue !== '') {

                let nameAttr = itemId;
                if (inputField.attr('data-multiple') !== 'true') {
                    // if this is not clicked on in a screen with multiple choice

                    // next slide:
                    currentItemIndex += 1;
                    if (!navigationDisabled) {
                        showSliderItem();
                    }

                    // delete from form if exists:

                    if ($('#create-event-form input[name=\'' + nameAttr + '\']').length != 0) {
                        $('#create-event-form input[name=\'' + nameAttr + '\']').remove();
                    }

                    // remove class card-active:
                    console.log(inputField.val());
                    inputField.closest('.rows')
                        .find('.create-event-option')
                        .removeClass('card-active');

                } else {
                    nameAttr += '[]';
                }

                // put in the form:

                $('#create-event-form')
                    .append($('<input>')
                        .attr('type', 'hidden')
                        .attr('name', nameAttr)
                        .attr('value', newValue));

                inputField.siblings('.new-values')
                    .append($('<div>')
                        .attr('class', 'chip')
                        .text(newValue));

                inputField.val('');
            }
        }
    });

    function showSliderItem(itemId) {

        // if the current item's index get out of sliderArr's bounds

        if(currentItemIndex > slidesArr.length - 1) {
            currentItemIndex = 0;
        } else if (currentItemIndex < 0) {
            currentItemIndex = slidesArr.length - 1;
        }

        if (itemId === undefined) {
            itemId = slidesArr[currentItemIndex];
        } else {
            currentItemIndex = slidesArr.indexOf(itemId);
        }

        // add "active" class to the side menu, so the current section looks highlighted:

        $('#slider-links').children().removeClass('active');
        $('#slider-link-' + itemId).addClass('active');

        $('#modal1').children().removeClass('active');
        if(itemId == 'type'){
            $('#content').addClass('active').text(modal['type']);
        }
        else if(itemId == 'dress-code'){
            $('#content').addClass('active').text(modal['dress-code']);
        }

        else if(itemId == 'music'){
            $('#content').addClass('active').text(modal['music']);
        }
        else if(itemId == 'food'){
            $('#content').addClass('active').text(modal['food']);
        }
        else if(itemId == 'drinks'){
            $('#content').addClass('active').text(modal['drinks']);
        }
        else if(itemId == 'location'){
            $('#content').addClass('active').text(modal['location']);
        }
        else if(itemId == 'extras'){
            $('#content').addClass('active').text(modal['extras']);
        }
        else if(itemId == 'basics'){
            $('#content').addClass('active').text('Provide us with basic information about your event. In the description field you can type anything you think is important.');
        }

        /*
         Set this to true so that on mulptiple clicks, there won't be any anomalies
         */
        navigationDisabled = true;

        $('#slider-container').children().fadeOut('fast').delay(150);
        $('#' + itemId).fadeIn('fast', function () {
            navigationDisabled = false;
        });
    }
    $('#showhide').click(function(){
        $('#slider-links').slideToggle("slow");
    });
});