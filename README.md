## About 

This framework uses Laravel 8 with authentification and has the Laravel Cashier Mollie package installed. 

You find more information about this repo at [https://github.com/laravel/cashier-mollie](https://github.com/laravel/cashier-mollie). The billable trait has been added to the user model as suggested by the author of the package.

## Installation
1. Clone this repo and migrate.
2. Setup a free account mollie account to enable payment at [https://www.mollie.com/](https://www.mollie.com/). You should enable at least one payment method, otherwise errors might occur.
3. Obtain your Test API key and add it to the `.env ` like this `MOLLIE_KEY="test_**************"`.
4. Schedule a periodic cronjob to execute your Kernel jobs `* * * * * cd ~/path/to/your/webapp php artisan schedule:run >> /dev/null 2>&1`. This is required to regularly run the cashier.
5. Register a user and test your payment at /pay.
6. Enhance the base functionality: [https://github.com/laravel/cashier-mollie].

## Error handling
#### [2020-10-10T10:06:13+0000] Error executing API call (422: Unprocessable Entity): The webhook URL is invalid because it is unreachable from Mollie's point of view.. Field: webhookUrl. Documentation: https://docs.mollie.com/guides/handling-errors

This error occurs because you need to call the /pay method from a publically available domain. While you are testing this domain on a localhost mollie can not find you. Use a service like [ngrok.io](ngrok.io) in order to forward your localhost to a temporarly publically available domain. I recommend using Laravel Valet for this because it comes with a default functionality for this use case. Just type `valet share` in your terminal and access your local site through the https-link you get back. 


## License

This webapp framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
