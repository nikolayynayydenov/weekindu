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
                '<span class="card-title">' + value.cardTitle + '</span>' +
                '</div>' +
                '<div class="card-content center-align">' +
                '<p><strong>' + value.cardContent + '</strong></p>' +
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
            'cardContent': 'Buisiness Meeting',
            'imgLocation': 'create-event/type/buisiness-meeting.jpg'
        },
        {
            'cardTitle': 'Camp',
            'cardContent': 'Camp',
            'imgLocation': 'create-event/type/camp.jpg'
        },
        {
            'cardTitle': 'Conference',
            'cardContent': 'Conference',
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
            'cardTitle': '',
            'cardContent': 'Street Wear',
            'imgLocation': 'create-event/dress-code/streetwear.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Casual',
            'imgLocation': 'create-event/dress-code/casual.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Buisiness Casual',
            'imgLocation': 'create-event/dress-code/buisinesscasual.jpg'
        }
    ]);

    addRow('dress-code', [
        {
            'cardTitle': '',
            'cardContent': 'Smart Casual',
            'imgLocation': 'create-event/dress-code/smartcasual.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Formal',
            'imgLocation': 'create-event/dress-code/formal.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Other',
            'imgLocation': 'create-event/dress-code/other.png'
        }
    ]);

    addRow('music', [
        {
            'cardTitle': '',
            'cardContent': 'Pop',
            'imgLocation': 'create-event/music/pop.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Electronic',
            'imgLocation': 'create-event/music/electronic.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Rock / Metal',
            'imgLocation': 'create-event/music/rock.jpg'
        }
    ], 'multiple');

    addRow('music', [
        {
            'cardTitle': '',
            'cardContent': 'Pop-Folk',
            'imgLocation': 'create-event/music/pop-folk.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Hip-Hop',
            'imgLocation': 'create-event/music/hiphop.png'
        },
        {
            'cardTitle': '',
            'cardContent': 'Srabsko',
            'imgLocation': 'create-event/music/royal.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': '',
            'cardContent': 'Water',
            'imgLocation': 'create-event/drinks/water.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Milk',
            'imgLocation': 'create-event/drinks/milk.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Tea',
            'imgLocation': 'create-event/drinks/tea.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': '',
            'cardContent': 'Coke',
            'imgLocation': 'create-event/drinks/coke.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Coffee',
            'imgLocation': 'create-event/drinks/coffee.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Sprite',
            'imgLocation': 'create-event/drinks/sprite.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': '',
            'cardContent': 'Fanta',
            'imgLocation': 'create-event/drinks/fanta.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Juice',
            'imgLocation': 'create-event/drinks/juice.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Beer',
            'imgLocation': 'create-event/drinks/beer.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': '',
            'cardContent': 'Cider',
            'imgLocation': 'create-event/drinks/cider.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Wine',
            'imgLocation': 'create-event/drinks/wine.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Whiskey',
            'imgLocation': 'create-event/drinks/whiskey.jpg'
        }
    ], 'multiple');

    addRow('drinks', [
        {
            'cardTitle': '',
            'cardContent': 'Vodka',
            'imgLocation': 'create-event/drinks/vodka.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Rakia',
            'imgLocation': 'create-event/drinks/rakia.png'
        },
        {
            'cardTitle': '',
            'cardContent': 'Other',
            'imgLocation': 'create-event/drinks/other.jpg'
        }
    ], 'multiple');

    addRow('food', [
        {
            'cardTitle': '',
            'cardContent': 'Chicken',
            'imgLocation': 'create-event/food/chicken.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Beef',
            'imgLocation': 'create-event/food/beef.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Fries',
            'imgLocation': 'create-event/food/fries.jpg'
        }
    ], 'multiple');

    addRow('food', [
        {
            'cardTitle': '',
            'cardContent': 'Lamb',
            'imgLocation': 'create-event/food/lamb.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Potatoes',
            'imgLocation': 'create-event/food/potatoes.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Rice',
            'imgLocation': 'create-event/food/rice.jpg'
        }
    ], 'multiple');

    addRow('food', [
        {
            'cardTitle': '',
            'cardContent': 'Salad',
            'imgLocation': 'create-event/food/salad.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Sandwich',
            'imgLocation': 'create-event/food/sandwich.jpg'
        },
        {
            'cardTitle': '',
            'cardContent': 'Asparagus',
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
        $('#slider-links').toggle("slow");
    });
});