
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */


const Vue = require('vue');

const app = new Vue({
    el: '#app',
    data: {
        stockData: null
    },
    created() {
        this.setupStream();
    },
    methods: {
        setupStream() {
            // Not a real URL, just using for demo purposes
            let es = new EventSource('http://awesomestockdata.com/feed');

            es.addEventListener('message', event => {
                let data = JSON.parse(event.data);
                this.stockData = data.stockData;
            }, false);

            es.addEventListener('error', event => {
                if (event.readyState == EventSource.CLOSED) {
                    console.log('Event was closed');
                    console.log(EventSource);
                }
            }, false);
        }
    }
});

