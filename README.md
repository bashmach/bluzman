  Bluzman - Simple workflow manager for Bluz Framework
======================================

Bluzman is a set of command-line tools which provides a simple workflow with an application based and mantained by Bluz framework.

Features
-------------------------
* Application scaffolding
* Code-generator of application components

Requirements
-------------------------
* OS: Linux
* PHP: 5.4 (or later)

Installation
-------------------------
It is recommended to add bluzman to your PATH variable, which specifies where executable files are located. This will provide an ability to use one bluzman installation with many applications.

##### Steps to install: #####
1. Clone from repository

    ```
    $ git clone git://github.com/bashmach/bluzman.git
    $ cd bluzman
    ```
2. Install dependencies with composer

    ```
    $ composer install
    ```
3. Finish install - add bluzman to PATH variable.

    You can skip this, however you will need to use a fullpath to bluzman script from bin directory.

    ```
    $ sh ./bin/install.sh
    ```
Start new session in your terminal or run this command in current session:

    ```
    $ export PATH=$PATH:/%path_to_bluzman_directory%/bin
    ```
Usage
-------------------------
List of available commands
```
    $ bluzman list
```
### Scaffold application

Create new project from bluzphp/skeleton by composer.
```
    $ bluzman init:all
```
### Model generator

Create new model or overwrite the old.
For create new model you must run the command in terminal:
```
    $ bluzman init:model --name model_name --table table_name
```

Or run command in interactively mode:
```
    $ bluzman init:model
    Enter the name of model: model_name
    Enter the name of table: table_name
```

 "model_name" - the name of model. With this name will be created folder module.

 "table_name" - the name of databases table for pattern formation properties object model.

After completion you will see a message::
```
    Model "model_name" has been successfully created in the model "model_name"
```

### Module generator

For create new module you must run the command in terminal
```
    $ bluzman init:module --name module_name
```
Or run command in interactively mode:
```
    $ bluzman init:module
    Enter the name of module: module_name
```

### Controller generator


Create new controller or overwrite the old.
For create new controller you must run the command in terminal:
```
    $ bluzman init:controller --module module_name --name controller_name
```
After completion you will see a message::
```
    Controller "controller_name" has been successfully created in the module "module_name".
```

### Start server

For start built-in PHP server you must run the command in terminal:
```
    $ bluzman server:start [--host[="..."]] [--port=["..."]]
```

### Stop server

For stop build-in PHP server you must run the command in terminal:
```
    $ bluzman server:stop
```
### Status server

If you want know the status of the server you must run the command in terminal:
```
    $ bluzman server:status
```

