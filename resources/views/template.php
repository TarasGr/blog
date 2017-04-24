<div ng-init="parent = todo.id">
    <div>{{ todo.comment + ' - ' + todo.created_at}}</div>

    <div>
        <span ng-click="todo.reply = !todo.reply">Reply</span>
        <span ng-click="todo.edit = !todo.edit">Edit</span>
        <span ng-click="todoList.DeleteAction(todo.id)">Delete</span>
    </div>
</div>

<form ng-submit="todoList.EditAction(todo)" ng-if="todo.edit">
    <div>
        <textarea ng-model="todo.comment"></textarea>
    </div>

    <div>
        <input type="submit" value="Edit">
    </div>
</form>

<form ng-submit="todoList.ReplyAction(reply)" ng-if="todo.reply">
    <div>
        <input type="hidden" ng-init="reply.parent = todo.id" ng-value="{{ todo.id }}">
        <textarea ng-model="reply.comment"></textarea>
    </div>

    <div>
        <input type="submit" value="Reply">
    </div>
</form>

<div ng-repeat="todo in todoList.todos" ng-include="'template'" ng-if="todo.parent == parent" class="margin"></div>