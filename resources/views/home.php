<!doctype html>
<html ng-app="todoApp">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script src="/application.js"></script>
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <h2>Post title</h2>
        <div>Post description</div>

        <hr>

        <div>Comments list:</div>

        <br>

        <div ng-controller="TodoListController as todoList">
            <div ng-repeat="todo in todoList.todos" ng-include="'template'" ng-if="todo.parent == null" class="margin"></div>

            <br>

            <form ng-submit="todoList.CreateAction()">
                <div>
                    <textarea ng-model="todoList.todoText"></textarea>
                </div>

                <div>
                    <input type="submit" value="Create">
                </div>
            </form>
        </div>
    </body>
</html>