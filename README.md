
# E-Commerce Project
The project has backend development based on laravel. It includes a specific CMS based on JQUery and this CMS includes many portions; such as Banner, Category, Comment, FAQ, post, menu , ... .


## Appendix

It uses notification package to turn the sent messages to seen status.
It has a acceptable login-register system with strict filter; Also a private email template to send email while making request to register.It uses OTP method for reseting password; Also using MeliPayamak system for sending SMS to login or register. Another feature is having a dedicated service for uploading image that is following a smart configuration to crop image and save it in three different sizes. This service uses Image Intervention package to facilitate writing service.Also another service is considered to upload files like pdf. The user should complete his further information like national code and postal code because project has strict policy to get a complete information. The project follows Civil Registry Organization rules to register national code; so it has a laravel rule to check the user's inserted national code is valid or not.
## Authors

- [@mrezaaminii](https://github.com/mrezaaminii)


## Features

- notification package
- OTP reseting password
- sending email service
- sending SMS service
- uploading image service
- sweet alert
## Tech Stack

**Client:** JS, JQuery, BootStrap

**Server:** Laravel, PHP

