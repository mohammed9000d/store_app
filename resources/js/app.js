import './bootstrap';

import Alpine from 'alpinejs';

window.Echo.private('orders')
    .listen('.order.created', (e) => {
       alert(`New Order Created: ${e.order.number}`);
       console.log(e);
    });

window.Alpine = Alpine;

Alpine.start();
