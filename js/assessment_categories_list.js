var BodyView = Backbone.View.extend({

    el: $('body'),

    events: {
        'click .edit-assessment-categorie' : 'editAssessmentCategorie',
        'click .delete-assessment-categorie' : 'deleteAssessmentCategorie',
    },

    initialize: function( ) {

    },

    editAssessmentCategorie: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#edit-assessment-categorie-window');

        windowBootstrap.find('input[name="assessment_categorie_id"]').val(sender.attr('assessment_categorie_id'));
        windowBootstrap.find('input[name="name"]').val(sender.attr('name'));

    },

    deleteAssessmentCategorie: function(e) {

        var sender = $(e.target);
        
        var windowBootstrap = $('#delete-assessment-categorie-window');

        windowBootstrap.find('input[name="assessment_categorie_id"]').val(sender.attr('assessment_categorie_id'));
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