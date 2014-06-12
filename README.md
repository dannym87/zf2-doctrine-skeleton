zf2-doctrine-skeleton
=======================

Introduction
------------
This is a Zend Framework 2 skeleton (based on the official skeleton https://github.com/zendframework/ZendSkeletonApplication 2.2.6) with
integrated Doctrine, Doctrine Migrations, Doctrine Data Fixtures and PHPUnit. I've created an abstract PHPUnit test case for unit tests
that will use Doctrine Data Fixtures. An abstract PHPUnit controller test case class exists to run Doctrine Data Fixtures for testing the API.

Prerequisites
------------
The only dependency required is ant and Java. A build script exists under the build/ folder that will get the application off the ground.


Installation
------------
1. Copy build.properties.example from the build/ folder to build.properties
```
cd build/
cp build.properties.example build.properties
```

2. Edit the build.properties file and enter your database config
```
db.host=localhost
db.port=3306
db.user=root
db.password=password
db.name=test_db
db.test.name=testing_db
```

Note, the db.test.name should specify a separate database. This is so PHPUnit can apply all of the data fixtures to a separate database, leaving
your development database as is. I've opted to use Doctrine Data Fixtures so the exact state of the test database is known for every single
unit/integration test. Obviously, unit tests won't care about the state of the database, therefore, you can simply extend \PHPUnit_Framework_TestCase,
rather, than, AbstractPHPUnitTestCase.

3. Run rebuild to get the application up and running and apply the necessary config
```
ant rebuild
```

The build process will do a number of things
1. Run composer to install all of the necessary dependencies
2. Create development and testing config for environment specific configuration
3. Use vendor/bin/doctrine-module orm:schema-tool:drop to drop existing schema for the development database
4. Use vendor/bin/doctrine-module orm:schema-too:update to create schema for the development database
5. Use vendor/bin/doctrine-module orm:schema-tool:drop to drop existing schema for the testing database
6. Use vendor/bin/doctrine-module orm:schema-too:update to create schema for the testing database
7. Apply all migrations under build/migrations to pre-populate the development database