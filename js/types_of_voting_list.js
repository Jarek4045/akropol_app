var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-type-of-voting' : 'editTypeOfVoting',
        'click .delete-type-of-voting' : 'deleteTypeOfVoting',
    },

    initialize: function( ) {

    },

    editTypeOfVoting: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-type-of-voting-window');

        windowBootstrap.find('input[name="type_of_voting_id"]').val(sender.attr('type_of_voting_id'));
        windowBootstrap.find('input[name="name"]').val(sender.attr('name'));

    },

    deleteTypeOfVoting: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-type-of-voting-window');

        windowBootstrap.find('input[name="type_of_voting_id"]').val(sender.attr('type_of_voting_id'));
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