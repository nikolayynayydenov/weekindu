$(document).ready(function(){

    // functions that generate the html for the slider

    function addRow(recieverElementId, cols, multiple) {
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
                '<p><strong class="orange-text">' + value.cardTitle + '</strong>' + '<br>'+ '<div class="divider"></div>' +
                '' + value.cardContent + '</p>' +
                '</div>' +
                '</div>' +
                '</div>');
        });

        $('#' + recieverElementId).append(row);
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
            'cardTitle': 'Buisiness Meeting',
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
    ]);

    addRow('type', [
        {
            'cardTitle': 'Other',
            'cardContent': 'Click here if your event is not of any of these types',
            'imgLocation': 'create-event/type/other.jpg'
        }
    ]);

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
            'cardTitle': 'Buisiness Casual',
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
    ]);

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
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': 'Water',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/water.jpg'
        },
        {
            'cardTitle': 'Milk',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/milk.jpg'
        },
        {
            'cardTitle': 'Tea',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/tea.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': 'Coke',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/coke.jpg'
        },
        {
            'cardTitle': 'Coffee',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/coffee.jpg'
        },
        {
            'cardTitle': 'Sprite',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/sprite.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': 'Fanta',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/fanta.jpg'
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
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': 'Cider',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/cider.jpg'
        },
        {
            'cardTitle': 'Wine',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/wine.jpg'
        },
        {
            'cardTitle': 'Whiskey',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/whiskey.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': 'Vodka',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/vodka.jpg'
        },
        {
            'cardTitle': 'Rakia',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/rakia.png'
        },
        {
            'cardTitle': 'Other',
            'cardContent': '',
            'imgLocation': 'create-event/drinks/other.jpg'
        }
    ], 'multiple');

    addRow('food', [
        {
            'cardTitle': 'Chicken',
            'cardContent': '',
            'imgLocation': 'create-event/food/chicken.jpg'
        },
        {
            'cardTitle': 'Beef',
            'cardContent': '',
            'imgLocation': 'create-event/food/beef.jpg'
        },
        {
            'cardTitle': 'Fries',
            'cardContent': '',
            'imgLocation': 'create-event/food/fries.jpg'
        }
    ], 'multiple');

    addRow('food', [
        {
            'cardTitle': 'Lamb',
            'cardContent': '',
            'imgLocation': 'create-event/food/lamb.jpg'
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
    ], 'multiple');

    addRow('food', [
        {
            'cardTitle': 'Salad',
            'cardContent': '',
            'imgLocation': 'create-event/food/salad.jpg'
        },
        {
            'cardTitle': 'Sandwich',
            'cardContent': '',
            'imgLocation': 'create-event/food/sandwich.jpg'
        },
        {
            'cardTitle': 'Asparagus',
            'cardContent': '',
            'imgLocation': 'create-event/food/аsparagus.jpg'
        }
    ], 'multiple');

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
        let cardImageText = $.trim(card.find('.card-image').text());
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
                    // if the card has not been ptrviously selected
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
            let param = $(this).val();

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
                    .attr('placeholder', 'Type possible values')
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

                            let value = $(this).val();
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

    let modal = {'basics': '',
        'type': 'Please choose one type.',
        'dress-code': 'Please choose one or two as it is important for every guest to be aware of the dress code.',
        'food': 'Choose wisely.Every food that you choose will be one of the foods availible for the guests later.Please choose only the ones you can provide.If you want to add a dish, go to the last page and enter it in the last card',
        'drinks': 'Choose wisely.Every food that you choose will be one of the foods availible for the guests later.Please choose only the onles you can provide.If you want to add a drink, go to the last page and enter it in the last card',
        'music': 'On this tab, you need to choose the music that you are fine with, so when you sent the invitations the users would be able to choose their favourites',
        'location': 'Below, you are seeing a text field in which you can add the adress of your event, but we reccomend you to use the map, this way the guest will see exactly where they need to go',
        'extras': 'If we have missed something you have now chance to add it.The extras tab work the same way as "food" and "drinks" tabs.An extra has a name and parameters.To add an extra, simply type its name in the text bar you see.When you do it, another text area will appear where you need to type the parameters.After you enter a parameter you need to click enter to add it. '};


    // event listener for adding a value to a parameter

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
            $('#content').addClass('active').text('Because, later, when we start sending the invitation, the date and the name of the event would be important.');
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