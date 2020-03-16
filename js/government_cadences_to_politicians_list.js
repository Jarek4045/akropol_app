var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-government-cadences-to-politicians' : 'editGovernmentCadencesToPoliticiansToPoliticians',
        'click .delete-government-cadences-to-politicians' : 'deleteGovernmentCadencesToPoliticiansToPoliticians',
    },

    initialize: function( ) {
 
    },

    editGovernmentCadencesToPoliticiansToPoliticians: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-government-cadences-to-politicians-window');

        windowBootstrap.find('input[name="government_cadence_to_politician_id"]').val(sender.attr('government_cadence_to_politician_id'));
        windowBootstrap.find('select[name="politician_id"]').val(sender.attr('politician_id'));
        windowBootstrap.find('select[name="government_cadence_id"]').val(sender.attr('government_cadence_id'));

    },

    deleteGovernmentCadencesToPoliticiansToPoliticians: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-government-cadences-to-politicians-window');

        windowBootstrap.find('input[name="government_cadence_to_politician_id"]').val(sender.attr('government_cadence_to_politician_id'));
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