# Read Me - Level 7

## Note

I added the node_modules, to ensure that the project can be run with the `php artisan serve` command.
No need to have another step for `npm i`.

By default the .env is excluded in the project, I decided to keep the boilerplate in to make it easier to setup.

## Easy Question

Added migrations.

Used bootstrap as front end framework.

1. Run with `php artisan serve`

Please update the database credentials with your new database.
Please reference the [.env file](./easy/.env) - Line 11 - 16

| Key           | Value        |
| ------------- | ------------ |
| Host          | 127.0.0.1    |
| Port          | 3306         |
| Username      | root         |
| Database Name | easy         |
| Password      | Pr007/6&N,sd |

## Medium Question

Added pagination in the vuetify components, used axios to make the calls.
Implemented crud, did not make a specific commit.

Open two terminals

1. Navigate to [backend](./medium/backend/) Run `php artisan serve`
2. Navigate to [frontend](./medium/frontend/) In the second terminal run `npm run dev`

Please update the database credentials with your new database.
Please reference the [.env file](./medium/backend/.env) - Line 11 - 16

| Key           | Value        |
| ------------- | ------------ |
| Host          | 127.0.0.1    |
| Port          | 3306         |
| Username      | root         |
| Database Name | medium       |
| Password      | Pr007/6&N,sd |

### Sources

[Vue.js (Vue 3) Documentation]("https://v3.vuejs.org/guide/introduction.html")
[Vuetify Documentation (for Vue 3)]("https://next.vuetifyjs.com/en/")
[TypeScript Documentation]("https://www.typescriptlang.org/docs/")
[Laravel Documentation]("https://laravel.com/docs")
[Axios Documentation]("https://axios-http.com/docs/intro")
