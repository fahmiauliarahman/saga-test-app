## Installing app

1. Clone the repository
2. Open project folder
3. run `composer install`
4. run `cp .env.example .env`
5. setup your environment
6. run `php artisan migrate:fresh --seed`
7. run `php artisan serve`

## Written Test

1. Im well as always, thank you.
2. Currently, I am exploring go-language, javascript frameworks, and Mobile development using react native in the
   following year.
3. Here is my preferred environment.
    - OS: Ubuntu 20 / MacOS Monterey
    - IDE: Visual Studio Code (In General) / PHPStorm (for PHP) / Webstorm (for Javascript)
    - Browsers: Chrome / Firefox
    - Tools: Git / Docker / Docker Compose / Postman / Jira / Discord / Trello
4. MVC Concept is stand for Model-View-Controller. It is a design pattern that separate and application to three parts.
   Model is data, View is UI and Controller is business logic.
5. The Result is `oidutS latigiD agaS`. The alternative approach is to use built-in function of PHP
    ```php
    strrev("Saga Digital studio")
    ```

6. The value is
    ```php
    $array = ['coffee','latte'];
   ```

7. The differences beetween public, private and protected in class definition are
    - public: can be accessed from anywhere
    - private: can be accessed only from within the class
    - protected: can be accessed only from within the class and its subclasses
8. To prevent SQL Injection, we purify the input data. If you are on PHP, you can use built-in function for example
    - `htmlspecialchars()`
    - `strip_tags()`
9. To prevent CSRF attack, we can use token on session, and when you want to submit the form, you have to pass the token
   with hidden value for example. or if you are using PHP framework like laravel, it is easier. just add
   directive `@csrf` in the `<form>` tag and done.
10. You cannot use `$_POST['id']` in mysql query because its a php variable.
11. Mysql:

    ```mysql
    SELECT COUNT(*)
    FROM comments
    WHERE user_id = 1234
    ```

12. PHP:

    ```php
     function fizzBuzz(int $num)
    {
        for ($i = 1; $i <= $num; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                echo "FizzBuzz";
            } elseif ($i % 3 === 0) {
                echo "Fizz";
            } elseif ($i % 5 === 0) {
                echo "Buzz";
            } else {
                echo $i;
            }
    
            if ($i < $num) {
                echo ", ";
            }
        }
    
        echo "\n";
    }
    
    echo fizzBuzz(100);
    
    
    // to run, type in terminal: php soal4.php
    ```

13. Git:

    ```
    init: start a new repository
    add: add file to staging area
    commit: add new file to version history
    push: push to remote repository
    
    config: set up git configuration
    pull: pull from remote repository
    clone: clone a repository / obtain a repository from url parameter
    diff: show difference between two files
    reset: reset file to previous version before commit
    status: show status of files whether is modified, deleted, not added to staging area, etc.
    log: show commit history
    tag: create a tag to specified commit id
    branch: show local branch
    branch [name]: create a new branch with name of parameter
    branch -d [name]: delete a branch
    checkout [name]: switch to a branch with name of parameter
    merge: merge two branches
    remote add origin: connect your local project to remote repository
    stash: save your modified changes
    stash pop: restore your changes from stash
    stash list: show all stash
    stash drop: remove a stash
    
    ```
