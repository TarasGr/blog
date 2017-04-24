angular.module('todoApp', []).controller('TodoListController', function ($http) {
    var todoList = this;

    todoList.todos = [];

    todoList.ListAction = function () {
        $http.get('/list', {
        }).then(function (response) {
            todoList.todos = response.data;
        }, function (response) {
        });
    };

    todoList.CreateAction = function () {
        $http.post('/create', {
            comment: todoList.todoText
        }).then(function () {
            todoList.todoText = null;
            todoList.ListAction();
        }, function () {
        });
    };

    todoList.EditAction = function (object) {
        $http.post('/edit/' + object.id, object).then(function () {
            todoList.ListAction();
        }, function () {
        });
    };

    todoList.ReplyAction = function (object) {
        $http.post('/create', object).then(function () {
            todoList.ListAction();
        }, function () {
        });
    };

    todoList.DeleteAction = function (id) {
        $http.get('/delete/' + id, {
        }).then(function () {
            todoList.ListAction();
        }, function () {
        });
    };

    todoList.ListAction();
});