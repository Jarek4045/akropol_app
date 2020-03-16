var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-government-act' : 'editGovernmentAct',
        'click .delete-government-act' : 'deleteGovernmentAct',
    },

    initialize: function( ) {

    },

    editGovernmentAct: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-government-act-window');

        windowBootstrap.find('input[name="government_act_id"]').val(sender.attr('government_act_id'));
        windowBootstrap.find('input[name="name"]').val(sender.attr('name'));

    },

    deleteGovernmentAct: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-government-act-window');

        windowBootstrap.find('input[name="government_act_id"]').val(sender.attr('government_act_id'));
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