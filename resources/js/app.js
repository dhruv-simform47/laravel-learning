import './bootstrap';

import '../css/app.css';

import { APP_NAME, API_URL } from './config';
import { getMessage } from './message';

console.log(APP_NAME);
console.log(API_URL);
console.log(getMessage());

document.addEventListener('DOMContentLoaded', () => {

    document.getElementById('app-name').innerText = APP_NAME;

    document.getElementById('api-url').innerText = API_URL;

    document.getElementById('message').innerText = getMessage();
    console.log('version1');

});