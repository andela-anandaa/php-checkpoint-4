$(function() {
    
    // $('.submit-ajax').each(function() {
    //     var form = $(this);

    //     form.on('submit', function(evt) {
    //         evt.preventDefault();

    //         var data = form.serializeArray();
    //         var method = form.attr('ajax-method');
    //         var url = form.attr('ajax-action');

    //         $.ajax({
    //             url: url,
    //             method: method,
    //             data: data,
    //             headers: {
    //                 'X-CSRF-TOKEN': form.attr('ajax-csrf')
    //             }
    //         })

    //         .done(function(response) {
    //             console.info(response);
    //         })

    //         .fail(function(response) {
    //             console.warn(response);
    //         });
    //     });
    // });

    // $("#dashboard").each(function() {
    //     var dash = $(this);

    //     var view = new Vue({
    //         el: '#dashboard',
    //         data: {
    //             resources : []
    //         },

    //         methods: {
    //             getResources: function() {
    //                 var view = this;

    //                 $.ajax({
    //                     url: '/resources'
    //                 })

    //                 .done(function(response) {
    //                     view.resources = response;
    //                     console.log(response);
    //                 })

    //                 .fail(function() {
    //                     console.error('fail');
    //                 });
    //             }
    //         }
    //     });

    //     view.getResources();
    // });
    // 
    // 
    
    $('#categoryModal').on('hidden.bs.modal', function (e) {
      window.location.reload();
    })
});