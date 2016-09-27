angular.module('crust', ['ui.router', 'ui.bootstrap', 'ui.select','ngSanitize'])
.constant('base', {server: '/crust/', API: '/crust/api/v1/', partial: '/crust/partial/'});