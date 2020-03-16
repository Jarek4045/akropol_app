var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-government-cadence' : 'editgovernmentCadence',
        'click .delete-government-cadence' : 'deletegovernmentCadence',
    },

    initialize: function( ) {

        $(".cadence-start-date").datetimepicker({
        format:'Y-m-d H:i:s',
        lang:'pl',
        //minDate: moment(new Date()).format('YYYY/MM/DD'),
        onChangeDateTime: function(dp, $input){

            

            var dt2 = $('.cadence-expiration-date');
            var minDate = $('.cadence-start-date').val();
            var currentDate = new Date();
            var targetDate = moment(minDate).toDate();
            var dateDifference = currentDate - targetDate;
            var minLimitDate = moment(dateDifference).format('YYYY/MM/DD');
            var endDate = moment(dt2.val()).toDate();
            if((currentDate - endDate) >= (currentDate - targetDate))
                dt2.datetimepicker({
                    'value': minDate
                });
                dt2.datetimepicker({
                    'minDate': '-'+minLimitDate
                });
            }
        });
        $(".cadence-expiration-date").datetimepicker({
            format:'Y-m-d H:i:s',
            lang:'pl'
        }); 
    },

    editgovernmentCadence: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-government-cadence-window');

        windowBootstrap.find('input[name="government_cadence_id"]').val(sender.attr('government_cadence_id'));
        windowBootstrap.find('input[name="name"]').val(sender.attr('name'));
        windowBootstrap.find('input[name="description"]').val(sender.attr('description'));
        windowBootstrap.find('input[name="start_date"]').val(sender.attr('start_date'));
        windowBootstrap.find('input[name="expiration_date"]').val(sender.attr('expiration_date'));

    },

    deletegovernmentCadence: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-government-cadence-window');

        windowBootstrap.find('input[name="government_cadence_id"]').val(sender.attr('government_cadence_id'));
    },

    render: function(){

    },

    serializeData: function(){
        return {};
    },

    afterRender: function(){
        
    },

});

var bodyView = new BodyView();