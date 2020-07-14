# Simple LAMP stack To Do List
This repository contains a simple PHP TODO list application configured to be deployed to [AWS Elastic Beanstalk](https://aws.amazon.com/elasticbeanstalk/) and needs to be paired a MySQL 5.7 database [created as part of the Elastic Beanstalk environment](https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/create_deploy_PHP.rds.html#php-rds-create).


## How to deploy on AWS Elastic Beanstalk

- Clone this repository to your local workstation

- From inside this repository's root folder (the same level as this README), run `git archive -v -o ./todo-app.zip --format=zip HEAD` to create a zip file of this app suitable for uploading to Elastic Beanstalk. 

- In the [AWS Elastic Beanstalk management console](https://console.aws.amazon.com/elasticbeanstalk/home?region=us-east-1#/applications) click on 'Create a new application', give it a name, and click 'Create'.

- Click 'Create a new environment', select 'Web server environment', and click 'Create'.

- In the _Platform_ section, choose 'PHP' as the platform.

- In the _Application code_ section, select 'Upload your code', click the 'Choose file' button, and select the 'todo-app.zip' file you created above (it should have been created in the same folder as this README).

- Click the 'Configure more options' button, find the _Database_ section and click 'Edit'

- Ensure the database engine is `mysql` and the version is `5.7.x`. Enter a username and password for your new database and click 'Save'. Note: you don't need to remember these values, as Elastic Beanstalk will automatically expose them to your PHP application via appropriate `$_SERVER` variables.

- Click 'Create environment'

- Wait a few minutes for your environment to be created and your code to get automatically deployed. 

- When the deployment finishes, you'll see a panel showing your environment's status including a URL to your running application that looks something like your-env-name.eba-abcdefg-us-east-1.elasticbeanstalk.com. Click that URL to open your application in a new browser tab.

- You will see an error: "Unknown database 'tasks'." This is because we haven't yet created the database. Every app will have some way to conduct database migrations to create/update database tables appropriately for the app. In our case, we created a special `install.php` script meant to be run once to take care of this for us. Update the URL in your browser window, adding on `/install.php` to the path of your application (so it's something like `http://your-env-name.eba-abcdefg-us-east-1.elasticbeanstalk.com/install.php`)

- Once you've loaded the `install.php` script, your app is ready to go. Return to the root URL of the app to use the app to create/manage your TODOs.

## To clean up a deployed application

- Visit the Elastic Beanstalk management console in the AWS region you deployed your app to

- Click 'Applications' in the sidebar on the left.

- Select the application name you'd like to terminate, click the 'Actions' menu and select 'Delete application'

- Confirm the deletion by typing your application's name in the text field and click 'Delete'. Note: the application name is shown in **bold** at the top of the _Confirm Application Deletion_ modal dialog.