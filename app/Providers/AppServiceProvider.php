<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Faker\Calculator\Luhn;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('expiration_year', function ($attribute, $value, $parameters, $validator) {
            // Check if it's a numeric value with exactly four digits
            if (!is_numeric($value) || strlen($value) !== 4) {
                return false;
            } 
            // Check if it's a future year
            $currentYear = date('Y');
            $enteredYear = (int) $value;
    
            return $enteredYear >= $currentYear;
        });

        Validator::extend('expiration_month', function ($attribute, $value, $parameters, $validator) {
            // Check if it's a numeric value with exactly two digits
            if (!is_numeric($value) || strlen($value) !== 2) {
                return false;
            }

            // Check if it's a valid month (1 to 12)
            $currentMonth = date('n'); // 'n' gives the numeric representation of the current month (1 to 12)
            $enteredMonth = (int)$value;

            return $enteredMonth >= 1 && $enteredMonth <= 12;
        });

        Validator::extend('credit_card_number', function ($attribute, $value, $parameters, $validator) {
            // Remove spaces and non-digit characters
            $cleanedCardNumber = preg_replace('/\D/', '', $value);
    
            // Check if it's a numeric value with a valid length
            if (!is_numeric($cleanedCardNumber) || strlen($cleanedCardNumber) < 13 || strlen($cleanedCardNumber) > 19) {
                return false;
            }
    

            return true;
        });

        Validator::extend('cvc', function ($attribute, $value, $parameters, $validator) {
            // Remove spaces and non-digit characters
            $cleanedCVC = preg_replace('/\D/', '', $value);
    
            // Check if it's a numeric value with a valid length (typically 3 or 4 digits)
            if(is_numeric($cleanedCVC) && (strlen($cleanedCVC) === 3 || strlen($cleanedCVC) === 4)){
                return 'CVC is incorrect';
            }
        });
    }
}
