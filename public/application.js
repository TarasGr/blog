angular.module('todoApp', []).controller('TodoListController', function ($http) {
    var todoList = this;

    todoList.todos = [];

//    todoList.page = 1;
//    todoList.MorePage = true;

    todoList.ListAction = function () {
        $http.get('/list', {
//            params: {
//                page: todoList.page
//            }
        }).then(function (response) {
//            if (response.data.data.length == 0) {
//                alert(response.data.data.length)
//                todoList.MorePage = false;
//            }
            todoList.todos = response.data;
//            todoList.page++;
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