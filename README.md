# yii2-test-api
Test REST API project using Yii2 and Docker. The API performs various calculations for the frontend.


REQUIREMENTS
------------

- docker
- docker-compose

Visit the [download page](https://www.docker.com/products/container-runtime) to get the Docker tooling.

INSTALLATION
------------

### Install with Docker

Clone the project.

Copy .env.local to .env

    cp .env.local .env

(Debian) Find your user id via following command, then set the resulting value to PHP_USER_ID variable in .env.

    id -u



Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist

Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    

Start the container

    docker-compose up -d

You can then access the application through the following URL:

    http://localhost:8000

**NOTES:**
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


USAGE
-------------


Default entrypoint http://localhost:8000 provides some info on the API:

```json
{
   "available_endpoints":
   {
      "/api/sum-even":
      {
         "verb":"POST",
         "variables":
         {
            "numbers":"Array of integers"
         }
      }
   }
}
```

Use any HTTP client to send JSON requests to the API. For example:

```http request
POST http://localhost:8000/api/sum-even
Content-Type: application/json

{
  "numbers": [1, 2, 3, 4, 5, 6]
}

```

will return the following:

```json
{
  "sum": 12
}
```

TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](https://codeception.com/).
By default, there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser.


### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run --coverage --coverage-html --coverage-xml

#collect coverage only for unit tests
vendor/bin/codecept run unit --coverage --coverage-html --coverage-xml

#collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit --coverage --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.

DIRECTORY STRUCTURE
-------------------

      commands/           contains console commands (controllers)
      config/             contains application configurations
      components/         contains application components and services
      controllers/        contains Rest controller classes
      http_requests/      contains examples of http requests used to access the API
      models/             contains model classes and DTOs
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      validators/         contains custom validators
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources





