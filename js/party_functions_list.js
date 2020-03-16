var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-party-function' : 'editPartyFunction',
        'click .delete-party-function' : 'deletePartyFunction',
    },

    initialize: function( ) {

    },

    editPartyFunction: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-party-function-window');

        windowBootstrap.find('input[name="party_function_id"]').val(sender.attr('party_function_id'));
        windowBootstrap.find('input[name="name"]').val(sender.attr('name'));

    },

    deletePartyFunction: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-party-function-window');

        windowBootstrap.find('input[name="party_function_id"]').val(sender.attr('party_function_id'));
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