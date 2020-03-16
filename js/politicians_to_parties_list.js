var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-politician-to-partie' : 'editPoliticianToPartie',
        'click .delete-politician-to-partie' : 'deletePoliticianToPartie',
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

    editPoliticianToPartie: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-politician-to-partie-window');

        windowBootstrap.find('input[name="politician_to_partie_id"]').val(sender.attr('politician_to_partie_id'));
        windowBootstrap.find('select[name="politician_id"]').val(sender.attr('politician_id'));
        windowBootstrap.find('select[name="partie_id"]').val(sender.attr('partie_id'));
        windowBootstrap.find('input[name="start_date"]').val(sender.attr('start_date'));
        windowBootstrap.find('input[name="expiration_date"]').val(sender.attr('expiration_date'));

    },

    deletePoliticianToPartie: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-politician-to-partie-window');

        windowBootstrap.find('input[name="politician_to_partie_id"]').val(sender.attr('politician_to_partie_id'));
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