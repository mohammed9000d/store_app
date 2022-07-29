window.Echo.private('orders')
    .listen('.order.created', async (e) => {
        toastr['success'](`New Order Created: ${e.order.number}` ?? '')
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
        console.log(e);
    });

const chat = window.Echo.join('chat')
    .here((users) => {
        console.log(users);
    }).joining((user) => {
    $('#messages').append(`<div class="shadow-sm my-5 sm:rounded-lg">
        User ${user.name} joined!
    </div>`);
    }).leaving((user) => {
    $('#messages').append(`<div class="shadow-sm my-5 sm:rounded-lg">
        User ${user.name} left!
    </div>`);
    })
    .listen('MessageSent', async (e) => {
        addMessage(e);
        console.log(e);
    })
    .listenForWhisper('typing', (e) => {
        $('#messages').append(`<div class="shadow-sm my-5 sm:rounded-lg">
            ${e.name}
        </div>`);
    });
(function($){
    $('#chat-form').on('submit', function(e){
       e.preventDefault();
       $.post($(this).attr('action'), $(this).serialize(), function(res){
            $('#chat-form input').val('');
       });
    });
})(jQuery)

function addMessage(e){
        $('#messages').append(`<div class="shadow-sm my-5 sm:rounded-lg">
    ${e.sender.name}: ${e.message}</div>`);
}

$('#chat-form input').on('keyup', function(e){
    chat.whisper('typing', {
        name: 'Somebody is typing...'
    });
})



import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
