$(document).ready(function() {
    // Get all Todos
    $.get('/api/todos', function(data) {
      $.each(data, function(index, todo) {
        $('#todo-list').append('<li>' + todo.title + '</li>');
      });
    });
});
// Add a new Todo
$('#add-todo-form').submit(function(event) {
    event.preventDefault();
    var title = $('#todo-title').val();
    $.post('/api/todos', {title: title}, function(data) {
      $('#todo-list').append('<li>' + data.title + '</li>');
    });
  });

// Update a Todo
$('#todo-list').on('click', 'li', function() {
    var li = $(this);
    var description = li.hasClass('description');
    var id = li.data('id');
    $.ajax({
      method: 'PUT',
      url: '/api/todos/' + id,
      data: {description: !description},
      success: function(data) {
        li.toggleClass('description');
      }
    });
  });
// Delete a Todo
$('#todo-list').on('click', 'span', function(event) {
    event.stopPropagation();
    var li = $(this).parent();
    var id = li.data('id');
    $.ajax({
      method: 'DELETE',
      url: '/api/todos/' + id,
      success: function(data) {
        li.remove();
      }
    });
  });

