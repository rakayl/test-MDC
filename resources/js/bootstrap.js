import _ from 'lodash';
window._ = _;

import 'bootstrap';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

// optional untuk debug
window.Echo.connector.pusher.connection.bind('connected', () => {
    console.log('✅ Pusher connected');
});
