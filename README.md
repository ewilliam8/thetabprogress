<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">The Tab Progress</h1>
    <br>
</p>

Track your progress professionally using tables and diagrams.

Preview on the main page with graphics. First you need to make a Direction.
Click the button "Add new Direction" on the main page. Choose the Title and write a description for your Progress direction.  
![alt text](https://github.com/ewilliam8/thetabprogress/blob/master/backend/web/img/preview.png?raw=true)

In the tab Directions you can Create Read Update and Delete directions.
![alt text](https://github.com/ewilliam8/thetabprogress/blob/master/backend/web/img/directions.png?raw=true)

The detailed view on Directions.
![alt text](https://github.com/ewilliam8/thetabprogress/blob/master/backend/web/img/detailed.png?raw=true)

In the tab Progress you can Create Read Update and Delete your progress.
![alt text](https://github.com/ewilliam8/thetabprogress/blob/master/backend/web/img/progress.png?raw=true)

You cannot to see other people progress or direction.
![alt text](https://github.com/ewilliam8/thetabprogress/blob/master/backend/web/img/denied.png?raw=true)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
