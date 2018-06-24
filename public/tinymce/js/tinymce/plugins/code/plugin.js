(function () {
var code = (function () {
  'use strict';

  var global = tinymce.util.Tools.resolve('tinymce.PluginManager');

  var global$1 = tinymce.util.Tools.resolve('tinymce.dom.DOMUtils');

  var getMinWidth = function (editor) {
    return editor.getParam('code_dialog_width', 600);
  };
  var getMinHeight = function (editor) {
    return editor.getParam('code_dialog_height', Math.min(global$1.DOM.getViewPort().h - 200, 500));
  };
  var $_3gjdgm9ojikke87y = {
    getMinWidth: getMinWidth,
    getMinHeight: getMinHeight
  };

  var setContent = function (editor, html) {
    editor.focus();
    editor.undoManager.transact(function () {
      editor.setContent(html);
    });
    editor.selection.setCursorLocation();
    editor.nodeChanged();
  };
  var getContent = function (editor) {
    return editor.getContent({ source_view: true });
  };
  var $_ga9x4v9qjikke880 = {
    setContent: setContent,
    getContent: getContent
  };

  var open = function (editor) {
    var minWidth = $_3gjdgm9ojikke87y.getMinWidth(editor);
    var minHeight = $_3gjdgm9ojikke87y.getMinHeight(editor);
    var win = editor.windowManager.open({
      title: 'Source code',
      body: {
        type: 'textbox',
        name: 'code',
        multiline: true,
        minWidth: minWidth,
        minHeight: minHeight,
        spellcheck: false,
        style: 'direction: ltr; text-align: left'
      },
      onSubmit: function (e) {
        $_ga9x4v9qjikke880.setContent(editor, e.data.code);
      }
    });
    win.find('#code').value($_ga9x4v9qjikke880.getContent(editor));
  };
  var $_at66fk9njikke87x = { open: open };

  var register = function (editor) {
    editor.addCommand('mceCodeEditor', function () {
      $_at66fk9njikke87x.open(editor);
    });
  };
  var $_58rbj79mjikke87w = { register: register };

  var register$1 = function (editor) {
    editor.addButton('code', {
      icon: 'code',
      tooltip: 'Source code',
      onclick: function () {
        $_at66fk9njikke87x.open(editor);
      }
    });
    editor.addMenuItem('code', {
      icon: 'code',
      text: 'Source code',
      onclick: function () {
        $_at66fk9njikke87x.open(editor);
      }
    });
  };
  var $_e29fsd9rjikke880 = { register: register$1 };

  global.add('code', function (editor) {
    $_58rbj79mjikke87w.register(editor);
    $_e29fsd9rjikke880.register(editor);
    return {};
  });
  function Plugin () {
  }

  return Plugin;

}());
})();
