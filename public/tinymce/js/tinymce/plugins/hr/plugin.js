(function () {
var hr = (function () {
  'use strict';

  var global = tinymce.util.Tools.resolve('tinymce.PluginManager');

  var register = function (editor) {
    editor.addCommand('InsertHorizontalRule', function () {
      editor.execCommand('mceInsertContent', false, '<hr />');
    });
  };
  var $_2cz3zuc7jikke8j0 = { register: register };

  var register$1 = function (editor) {
    editor.addButton('hr', {
      icon: 'hr',
      tooltip: 'Horizontal line',
      cmd: 'InsertHorizontalRule'
    });
    editor.addMenuItem('hr', {
      icon: 'hr',
      text: 'Horizontal line',
      cmd: 'InsertHorizontalRule',
      context: 'insert'
    });
  };
  var $_cne4d2c8jikke8j1 = { register: register$1 };

  global.add('hr', function (editor) {
    $_2cz3zuc7jikke8j0.register(editor);
    $_cne4d2c8jikke8j1.register(editor);
  });
  function Plugin () {
  }

  return Plugin;

}());
})();
