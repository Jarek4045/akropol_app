var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-politician' : 'editPolitician',
        'click .delete-politician' : 'deletePolitician',
    },

    initialize: function( ) {
        
    },

    editPolitician: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-politician-window');

        windowBootstrap.find('input[name="politician_id"]').val(sender.attr('politician_id'));
        windowBootstrap.find('input[name="name"]').val(sender.attr('name'));

    },

    deletePolitician: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-politician-window');

        windowBootstrap.find('input[name="politician_id"]').val(sender.attr('politician_id'));
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