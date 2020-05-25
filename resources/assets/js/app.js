import $ from 'jquery';
import 'select2';
import 'bootstrap';
import _ from 'lodash';

$('.select2').select2();
$('.select2-tags').select2({tags: true});
$('#flash-overlay-modal').modal();

var laravel = {
   initialize: function() {
     this.methodLinks = $('a[data-method]');
     this.token = $('a[data-token]');
     this.registerEvents();
   },

   registerEvents: function() {
     this.methodLinks.on('click', this.handleMethod);
       $(window).scroll(_.debounce(this.checkScroll, 1000));
       $(document).ready(this.checkScroll);
   },
    checkScroll: function() {
        if ($('.j-panel-end').length) {
            var hT = $('.j-panel-end').offset().top,
                hH = $('.j-panel-end').outerHeight(),
                wH = $(window).height(),
                wS = $(this).scrollTop();
            if (wS > (hT+hH-wH)){
                $.ajax({
                    type: 'POST',
                    data: 'da',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function (data) {
                    console.log('suc');
                        console.log(data);
                    }).fail(function (data) {
                        console.log('fail');
                        console.log(data);
                    });
            }
        }
    },
    handleMethod: function(e) {
     var link = $(this);
     var httpMethod = link.data('method').toUpperCase();
     var form;

     // If the data-method attribute is not PUT or DELETE,
     // then we don't know what to do. Just ignore.
     if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
       return;
     }

     // Allow user to optionally provide data-confirm="Are you sure?"
     if ( link.data('confirm') ) {
       if ( ! laravel.verifyConfirm(link) ) {
         return false;
       }
     }

     form = laravel.createForm(link);
     form.submit();

     e.preventDefault();
   },

   verifyConfirm: function(link) {
     return confirm(link.data('confirm'));
   },

   createForm: function(link) {
     var form =
     $('<form>', {
       'method': 'POST',
       'action': link.attr('href')
     });

     var token =
     $('<input>', {
       'type': 'hidden',
       'name': '_token',
       'value': link.data('token')
       });

     var hiddenInput =
     $('<input>', {
       'name': '_method',
       'type': 'hidden',
       'value': link.data('method')
     });

     return form.append(token, hiddenInput)
                .appendTo('body');
   }
 };

 laravel.initialize();
