var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-partie' : 'editPartie',
        'click .delete-partie' : 'deletePartie',
    },

    initialize: function( ) {
        
    },

    editPartie: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-partie-window');

        windowBootstrap.find('input[name="partie_id"]').val(sender.attr('partie_id'));
        windowBootstrap.find('input[name="name"]').val(sender.attr('name'));

    },

    deletePartie: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-partie-window');

        windowBootstrap.find('input[name="partie_id"]').val(sender.attr('partie_id'));
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